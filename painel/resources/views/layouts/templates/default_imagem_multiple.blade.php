<?php

 $Imagens = json_decode($Model->conteudo, true);
 $Imagens = $Imagens['imgBanner'];
//print_r($Imagens); exit;
  $ct = 0;
?>
<style type="text/css">
  .col-xs-2{ width: 800px; }
</style>

<div class="row">
  <div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h3 style="background-color: #FFF; text-align: center; margin-bottom: 40px; -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,0.14), 0 2px 1px -1px rgba(0,0,0,0.12), 0 1px 3px 0 rgba(0,0,0,0.2); height: 50px; line-height: 2;">Upload de imagens</h3>            
        </div>
        <div class="card-block">
          <div class="row ImagensRow">
            <div class="col-sm-12">             
                <input type="file" name="Imagens[{{ $ct }}][imagem][]" class="form-control" multiple>
            </div>
          </div>
          <div class="row" style="margin-top: 25px">            
              <?php foreach($Imagens as $key => $imagem){ ?>
                <div class="col-sm-3" style="margin-bottom: 30px">
                    <img data-ct="<?php echo $ct; ?>" data-id="<?php echo $key; ?>" class="imgProd" src="<?php echo URL::to('/'); ?>/<?php echo $imagem; ?>" style="cursor: pointer; width:100%; max-height: 200px;"/>
                    <div class="excluirImg" id="<?php echo $key; ?>" style="cursor: pointer; color: red; font-size: 15px; font-weight: bold; position: absolute; left: 20px; top: 4px;"> X </div>
                </div>
              <?php $ct++;} ?>              
          </div>
          <input type="hidden" id="ctImg" />
        </div>
    </div>
  </div>
</div>
<div class="modal bs-modal-sm fade" id="ModalImg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h4 class="modal-title">Imagens</h4>
      </div>
      <div id="ModalImgCont"></div>
      <div class="divSeta" data-dir="e" style="position: absolute; left: 1%; top: 50%; width: 4%; font-size: 60px; color: red; cursor: pointer;"> < </div>
      <div class="divSeta" data-dir="d" style="position: absolute; left: 95%; top: 50%; width: 4%; font-size: 60px; color: red; cursor: pointer;"> > </div>
    </div>
  </div>
</div>
