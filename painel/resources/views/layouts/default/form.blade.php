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

							@foreach($ConfigFile['fields'] AS $field)
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
					</div>
			  </div>
			</div>
	    </div>
	  </div>
	</div>
</div>
@endsection