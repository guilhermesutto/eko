<?php
//INCLUDE DO HEAD
include("include/head.php");
include("include/db.php");

$Projetos = dbQuery("home_projetos");


?>
<style>
#btnLeft{
  position: absolute;
    width: 100px;
    height: 100px;
    top: 250px;
    left: 386px;
    font-size: 30px;
}
#btnRight{
    position: absolute;
    width: 100px;
    height: 100px;
    top: 230px;
    right: 386px;
    font-size: 30px;
}

.slick-arrow{
  opacity: 0;
}
</style>

        <!-- Testimonials-->
        <section class="section section-lg bg-gray-100 section-first text-center">
        <div class="container">
          <h3>Projects</h3>
          <div class="slick-widget-testimonials wow fadeIn">
              <div id="btnLeft">
                <i class="fas fa-arrow-left"></i>
              </div>
              <div id="btnRight">
                <i class="fas fa-arrow-right"></i>
              </div>
            <div class="slick-slider carousel-child" id="child-carousel" data-for=".carousel-parent" data-arrows="true" data-loop="true" data-dots="false" data-swipe="true" data-items="1" data-sm-items="3" data-md-items="5" data-lg-items="5" data-xl-items="5" data-center-mode="true" data-slide-to-scroll="1">              
                <?php foreach( $Projetos as $proj){ ?>
                    <div class="item wow-outer"><div class="box-creative-icon"><?= $proj->icone; ?></div></div>
                <?php } ?>              
            </div>
            <!-- Slick Carousel-->
            <div class="slick-slider carousel-parent" data-arrows="false" data-loop="true" data-dots="false" data-swipe="false" data-items="1" data-fade="true" data-child="#child-carousel" data-for="#child-carousel">
                <?php foreach( $Projetos as $proj){ ?>
                    <div class="item">
                        <!-- Quote Light 1-->
                        <blockquote class="quote-light">
                        <cite class="quote-light-cite"><?= getTermoById($proj->titulo); ?></cite>                        
                        
                        <div class="quote-light-text">
                            <?= getTermoById($proj->descricao); ?>
                        </div>
                        </blockquote>
                    </div>
                <?php } ?>               
            </div>
          </div>
        </div>
      </section>
     
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>