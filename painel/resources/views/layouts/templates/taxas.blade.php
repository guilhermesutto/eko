<?php
    if(isset($Model->taxas)) $taxas = $Model->taxas;  
?>
<style type="text/css">
  .divFees{
      margin-top: 15px;
  }

  .fa{
      cursor: pointer;
  }
</style>

<div class="row">
  <div class="col-sm-12">
    <div class="card bg-white">
        <div class="card-header bg-primary"></div>
        <div class="card-block">
          <div class="row ImagensRow">
            <div class="col-sm-12" id="divHoldFee">
                <?php if(!isset($taxas)){ ?>
                    <div style="width:100%;" class="row divFees" >
                        <div class="col-xs-5">
                            <label for="tempo"> Tempo </label>
                            <input type="text" name="tempo[]" class="form-control">
                        </div>

                        <div class="col-xs-5">
                            <label for="tempo"> Taxa </label>
                            <input type="text" name="taxa[]" class="form-control">                    
                        </div>

                        <div class="col-xs-1">                    
                            <i id="btnAddFee" class="fa fa-fw fa-plus-circle" style="margin-top: 27px; font-size: 30px;"></i>
                        </div>
                    </div>
                <?php }else{
                        $ct = 1;
                        foreach($taxas as $taxa){ ?>
                            <div style="width:100%;" class="row divFees" >
                                <div class="col-xs-5">
                                    <label for="tempo"> Tempo </label>
                                    <input type="text" name="tempo[]" class="form-control" value="{{$taxa['tempo']}}">
                                </div>

                                <div class="col-xs-5">
                                    <label for="tempo"> Taxa </label>
                                    <input type="text" name="taxa[]" class="form-control" value="{{$taxa['taxa']}}">                    
                                </div>

                                <div class="col-xs-1">
                                    <?php if($ct == 1){ ?>                    
                                        <i id="btnAddFee" class="fa fa-fw fa-plus-circle" style="margin-top: 27px; font-size: 30px;"></i>
                                        <?php $ct++; ?>
                                    <?php }else{ ?>
                                        <i class="fa fa-fw fa-times removeFee" style="margin-top: 27px; font-size: 30px;"></i>
                                    <?php } ?>    
                                </div>
                            </div>
                        <?php } 
                } ?>
            </div>
          </div>
          <div class="row" style="margin-top: 25px">
            <?php if(isset($arrayModel[$nomeCampo])){ ?>
                <div style="position: relative; width: 25%; float: left; margin-right: 20px;" >
                  <img class="imgProd" src="<?php echo URL::to('/'); ?>/uploads/about-us/<?php echo $arrayModel[$nomeCampo] ?>" style="width:100%; max-height: 150px;"/>                  
                </div>
            <?php } ?>
          </div>          
        </div>
    </div>
  </div>
</div>

<script>

    $(document).ready(function(){        

        $("#btnAddFee").on("click", function(){            

            var retorno =  '<div style="width:100%;" id="divFee" class="row divFees">';
            retorno    +=      '<div class="col-xs-5">';
            retorno    +=          '<label for="tempo"> Tempo </label>';
            retorno    +=          '<input type="text" name="tempo[]" class="form-control">';
            retorno    +=      '</div>';
            retorno    +=      '<div class="col-xs-5">';
            retorno    +=          '<label for="tempo"> Taxa </label>';
            retorno    +=          '<input type="text" name="taxa[]" class="form-control">';
            retorno    +=      '</div>';
            retorno    +=      '<div class="col-xs-1">';
            retorno    +=          '<i class="fa fa-fw fa-times removeFee" style="margin-top: 27px; font-size: 30px;"></i>';
            retorno    +=      '</div>';
            retorno    += '</div>';

            $("#divHoldFee").append(retorno);
        });

        $(document).on("click", ".removeFee", function(){
            $(this).parent().parent().remove();
        });

        <?php if(isset($Model->projetos)){ ?>
            var projetos = "{{$Model->projetos}}";
            $.each(projetos.split(","), function(i,e){
                $("#projetos option[value='" + e + "']").prop("selected", true);
            });
        <?php } ?>    
    });

</script>

