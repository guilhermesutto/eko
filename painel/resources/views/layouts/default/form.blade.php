@extends('layouts.master')

<?php

$pk = $Model->pk;

?>

@section('main')

<div class="main-content">
	<div class="page-title" style="position:fixed; width:100%; z-index:10;">
	  <div class="title"></div>
	  <div class="sub-title"></div>
	  <div id="id_area" data-id="{{ $Area->id }}"></div>
	</div>
	<div class="" style="margin-top:65px;">
	  <div class="row">
	    <div class="col-sm-12">
	      <div class="card bg-white">
			  <div class="card-header">
			  	
			  	<div style="float: right;">			  		
					@if(isset($ConfigFile['langs']))
						@foreach($ConfigFile['langs'] AS $lang )
						<a href="#" class="btnLang" id="{{ $lang }}"> {{ $lang }} </a>
						@endforeach
					@endif					
			  	</div>
			  </div>
			  <div class="card-block">			    
					<div class="col-lg-12">
						<form id="FormContent" class="form-horizontal" role="form" method="POST" action="{{ url($Area->url.'/form') }}" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">

							@if(isset($Model->$pk))
							<input type="hidden" name="{{ $pk }}" id="{{ $pk }}" value="{{ $Model->$pk }}" />
							@endif
							<?php $termos = []; $nomesTextArea = [];?>
							@foreach($ConfigFile['fields'] AS $field)
									@if($field['type'] == 'text' || $field['type'] == 'textarea')
										<?php 
											$name = $field["name"];
											$termos[$field["id"]] = $Model->$name; ?>
									@endif

									@if($field['type'] == 'textarea')
										<?php $nomesTextArea[$field["name"]] = $field["name"]; ?>	
									@endif	
									<div class="form-group" style="padding: 25px;"> 
									<?php 
										$ModelId = isset($Model)?$Model->$pk:null;
										$col_sm  = isset($field['col-sm'])?$field['col-sm']:0;
									?>
									{{ FormHelper::getInput($field, $ModelId, $col_sm) }}
									</div>
									@endforeach

									@if( !isset($Model) || $Model->send_form_button)
									<div class="form-group">
										<input type="submit" data-lang="PT" value="Enviar" id="enviarForm" class="btn btn-primary" style="float:right; margin-right: 50px; width: 120px; height: 50px;" />
									</div>
									@endif
						</form>
						<!-- Modal Traduções -->
						<div class="modal fade" id="modalTraducoes" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								
								<div class="modal-content">
									
									<div id="mdlCnt">			
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Traduções</h4>
										</div>
										<div class="modal-body">
											<form role="form">
												<input type="hidden" id="traducIdPai" />
												<div class="form-group">
													<label for="lingua">Lingua</label>
													<select name="traducLingua" id="traducLingua" class="form-control">
														<option value="1">Portugues</option>
														<option value="2" selected>Ingles</option>
														<option value="3">Espanhol</option>
													</select>
												</div>
												<div class="form-group">
													<label for="traducTexto">Texto</label>
													<textarea name="traducTexto" id="traducTexto" rows=10 class="form-control"></textarea>
												</div>

												<button class="btn btn-default btn-success btn-block" id="traducBtnEnvia">Enviar</button>
											</form>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>          
										</div>
									</div>	
								</div>
							</div>
						</div> 
						<script>
							$(document).ready(function(){
									var campos = '<?php echo json_encode($termos); ?>';
									
									$.post("<?php echo url("getTermoById"); ?>", {campos: campos}, function(data){
										data = jQuery.parseJSON(data);
										$.each(data,function(index, value){
												$("#"+index).val(value);												
										});
									});

									var nomes  = '<?php echo json_encode($nomesTextArea); ?>';
									nomes = jQuery.parseJSON(nomes);

									$.each(nomes,function(index, value){
										setTimeout(function(){									
											CKEDITOR.replace(value);
										}, 2500);	
									})

									$(document).on("click",".linkTraduz", function(){
										loader();								
										var id = $(this).attr('data-value');
										$("#traducIdPai").val(id);

										$.post("<?php echo url("getTermo"); ?>", {id: id}, function(data){											
											$("#traducTexto").val(data);
											loader('stop');	
										});
										
										$("#modalTraducoes").modal();
									});

									$(document).on("change", "#traducLingua", function(){
										loader();	
										var lang = $(this).val();
										var id = $("#traducIdPai").val();

										$.post("<?php echo url("getTermoByLang"); ?>", {lang: lang, id: id}, function(data){											
											$("#traducTexto").val(data);
											loader('stop');	
										});

									});

									$(document).on("click", "#traducBtnEnvia", function(){
										var texto = $("#traducTexto").val();

										if(texto == ""){
											alert("Favor insira o texto");
										}else{

											var lang = $("#traducLingua").val();
											var id = $("#traducIdPai").val();

											$.post("<?php echo url("saveTermoByLang"); ?>", {lang: lang, id: id, texto: texto}, function(data){											
												alert("Tradução salva com sucesso!");
											});

										}

										return false;
									});

									function loader(action = "show"){
										if(action == "show"){
											$("#modalTraducoes").modal('hide');
											$("body").loading();											
										}else{
											$("#modalTraducoes").modal();
											$("body").loading('stop');	
										}
									}
							});
						</script>
					</div>
			  </div>
			</div>
	    </div>
	  </div>
	</div>
	
</div>
@endsection