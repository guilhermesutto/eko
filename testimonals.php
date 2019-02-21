<?php
//INCLUDE DO HEAD
include("include/head.php");
include("include/db.php");

$Depoimentos = dbQuery("home_depoimentos");


?>
      <!-- Breadcrumbs -->
      <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(images/breadcrumbs-image-1.jpg);">
        <div class="breadcrumbs-custom-inner">
          <div class="container breadcrumbs-custom-container">
            <div class="breadcrumbs-custom-main">
              <h6 class="breadcrumbs-custom-subtitle title-decorated">Pages</h6>
              <h1 class="breadcrumbs-custom-title">Testimonials</h1>
            </div>
            <ul class="breadcrumbs-custom-path">
              <li><a href="index.html">Home</a></li>
              <li><a href="#">Pages</a></li>
              <li class="active">Testimonials</li>
            </ul>
          </div>
        </div>
      </section>
      <!-- Testimonials-->
      <section class="section section-lg bg-gray-100 section-first text-center">
        <div class="container">
          <h3>Testimonials</h3>
          
      <!-- 3 Column Layout-->
      <section class="section section-lg text-center">
        <div class="container">          
          <!-- Owl Carousel-->
          <div class="owl-carousel owl-carousel-3-column wow fadeIn" data-items="1" data-md-items="2" data-lg-items="3" data-dots="true" data-nav="false" data-loop="true" data-margin="30" data-stage-padding="0" data-mouse-drag="false">
                <?php foreach($Depoimentos as $dep){ ?>         
                    <blockquote class="quote-classic">
                    <div class="quote-classic-meta">
                        <div class="quote-classic-avatar"><img src="painel/public/uploads/depoimentos/<?php echo $dep->img; ?>" alt="" width="96" height="96"/>
                        </div>
                        <div class="quote-classic-info">
                        <cite class="quote-classic-cite"><?php echo $dep->nome; ?></cite>
                        <p class="quote-classic-caption"><?php echo $dep->descricao; ?></p>
                        </div>
                    </div>
                    <div class="quote-classic-text">
                        <p><?php echo $dep->depoimento; ?></p>
                    </div>
                    </blockquote>
                <?php } ?>            
          </div>
        </div>
      </section>
      
     <?php include("footer.php"); ?>
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