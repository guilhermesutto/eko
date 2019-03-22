<?php
//INCLUDE DO HEAD
include("include/head.php");
include("include/db.php");

$id = $_GET['id'];
$Destino = dbQuerySingle("destinos", "id = $id");
$pais = dbQuerySingle("paises", "id =".$Destino->pais);
$taxas = dbQuery("taxas" , "id_destino = $id");

function getProjetos($projetos){
    $Ids = explode(",", $projetos);
    $retorno = "";
    foreach($Ids as $id){
        $projeto = dbQuerySingle("home_projetos","id = $id");
        $retorno .= utf8_encode($projeto->titulo)." ";
    }

    return $retorno;
}

?>
      <!-- Breadcrumbs -->
      <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(images/breadcrumbs-image-2.jpg);">
        <div class="breadcrumbs-custom-inner">
          <div class="container breadcrumbs-custom-container">
            <div class="breadcrumbs-custom-main">
              <h6 class="breadcrumbs-custom-subtitle title-decorated"><?php echo $pais->SL_NOME; ?></h6>
              <h1 class="breadcrumbs-custom-title"><?php echo $Destino->cidade; ?></h1>
            </div>
            <ul class="breadcrumbs-custom-path">
              <li><a href="index.php">Home</a></li>
              <li>Destinations</li>
              <li class="active"><?php echo $Destino->cidade; ?></li>
            </ul>
          </div>
        </div>
      </section>
      <!-- Section Products-->
      <section class="section section-lg section-wave-offset">
        <div class="container">
        <div class="row row-30 row-md-50">
            <div class="descicao">
                <?php echo getTermoById($Destino->descricao); ?>
            </div> 
            <div class="fees">
                <h5>Fees</h5><hr />
                <br>
                <div class="textoFee">
                    <?php echo getTermoById($Destino->descricaoTaxa); ?>
                </div>
                <br><br>
                <div class="ulFess">
                    <ul>
                        <?php foreach($taxas as $taxa){ ?>
                            <li><?php echo $taxa->tempo; ?> $ <?php echo $taxa->taxa; ?></li>
                        <?php } ?>
                    </ul>    
                </div>
            </div>          
          </div>
          <div class="row justify-content-center text-center row-offset-custom-1">
            <div class="col-12">
              <div class="wow-outer button-outer"><a id="btnApply" class="button button-lg button-primary button-winona wow slideInDown" data-wow-delay=".1s" href="#btnApply">Apply</a></div>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Footer-->
      <?php include('footer.php'); ?>
    </div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-double-torus"></div>
        </div>
      </div>
    </div>
    <div class="modal modal-custom fade" id="call-form">
      <div class="modal-dialog modal-dialog-custom" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Request a Callback</h3>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
          </div>
          <div class="modal-body">
            <p>Please leave your phone number in the field below and we will call you back soon.</p>
            <form class="rd-form rd-mailform form-inline form-inline-custom" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="bat/rd-mailform.php">
              <div class="form-wrap">
                <input class="form-input" id="header-phone" type="text" name="phone" data-constraints="@Numeric">
                <label class="form-label" for="header-phone">Phone</label>
              </div>
              <div class="form-button">
                <button class="button button-primary button-icon button-icon-only button-winona" type="button"><span class="icon mdi mdi-phone-in-talk"></span></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal modal-custom fade" id="applyModal">
      <div class="modal-dialog modal-dialog-custom" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Apply</h3>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
          </div>
          <div class="modal-body">
            <p>We need some informations before you can apply. After sends the formulary, one of our people will enter in contact with you.</p>
            <form class="rd-form rd-mailform form-inline form-inline-custom" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="">
              <input type="hidden" id="cidade" value="<?php echo $Destino->cidade; ?>" />
              <div class="form-wrap">
                <input class="form-input" id="nome" type="text" name="nome">
                <label class="form-label" for="header-phone">Name</label>
              </div>
              <div class="form-wrap">
                <input class="form-input" id="email" type="text" name="email">
                <label class="form-label" for="header-phone">Email</label>
              </div>
              <div class="form-wrap">                
                <select name="semanas" id="semanas" class="form-input">
                    <option>Weeks</option>
                    <option value="1">1 Week</option>
                    <option value="2">2 Weeks</option>
                    <option value="3">3 Weeks</option>
                    <option value="4">4 Weeks</option>
                    <option value="5">5 Weeks</option>
                    <option value="6">6 Weeks</option>
                    <option value="7">7 Weeks</option>
                    <option value="8">8 Weeks</option>
                </select>               
              </div>
              <div class="form-button">
                <button class="button button-primary" id="btnApplySubmit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>

    <script>
        $(document).ready(function(){
            $("#btnApply").on("click", function(){
                $("#applyModal").modal();
            });

            $("#btnApplySubmit").on("click", function(){
                var cidade = $("#cidade").val();
                var nome = $("#nome").val();
                var email = $("#email").val();
                var semanas = $("#semanas").val();

                $.post('send-email.php', { cidade: cidade, nome: nome, email: email, semanas: semanas}, function(data){
                    alert(data);
                });
                

            });
        });
    </script>
  </body>
</html>