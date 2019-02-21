<?php
//INCLUDE DO HEAD
include("include/head.php");
include("include/db.php");

$Destinos = dbQuery("destinos");

function getProjetos($projetos){
    $Ids = explode(",", $projetos);
    $retorno = "";
    foreach($Ids as $id){
        $projeto = dbQuerySingle("home_projetos","id = $id");
        $retorno .= $projeto->titulo." ";
    }

    return $retorno;
}

?>
      <!-- Breadcrumbs -->
      <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(images/breadcrumbs-image-2.jpg);">
        <div class="breadcrumbs-custom-inner">
          <div class="container breadcrumbs-custom-container">
            <div class="breadcrumbs-custom-main">
              <h6 class="breadcrumbs-custom-subtitle title-decorated">Discover our destinations</h6>
              <h1 class="breadcrumbs-custom-title">Destinatons</h1>
            </div>
            <ul class="breadcrumbs-custom-path">
              <li><a href="index.php">Home</a></li>
              <li class="active">Destinations</li>
            </ul>
          </div>
        </div>
      </section>
      <!-- Section Products-->
      <section class="section section-lg section-wave-offset">
        <div class="container">
          <h3 class="text-center">Our Destinations</h3>
          <div class="row row-30 row-md-50">
            <?php foreach($Destinos as $destino){ ?>
                <?php $projetos = getProjetos($destino->projetos); ?>
                
                <div class="col-md-6">
                    <article class="card-modern wow fadeInUp" data-wow-delay=".05s">
                    <div class="card-modern-left"><img src="painel/public/uploads/destinos/<?php echo $destino->bandeiraPais; ?>" alt="" width="138" height="197"/>
                    </div>
                    <div class="card-modern-body">
                        <h4><a class="card-modern-title" href="#"><?php echo $destino->cidade; ?></a></h4>                        
                        <div class="card-modern-info"><span class="icon icon-sm mdi mdi-information-outline"></span><span class="card-modern-info-text"><?php echo $projetos; ?></span></div>
                        <div class="card-modern-text">
                        <p><?php echo substr(strip_tags($destino->descricao), 0, 50); ?></p>
                        <p><a href="destination.php?id=<?php echo $destino->id; ?>"><b>See more</b></a></p>
                        </div>
                    </div>
                    </article>
                </div>
            <?php } ?>            
          </div>
          <div class="row justify-content-center text-center row-offset-custom-1">
            <div class="col-12">
              <div class="wow-outer button-outer"><a class="button button-lg button-primary button-winona wow slideInDown" data-wow-delay=".1s" href="about-us.html">View more</a></div>
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
                <button class="button button-primary button-icon button-icon-only button-winona" type="submit" aria-label="submit"><span class="icon mdi mdi-phone-in-talk"></span></button>
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
  </body>
</html>