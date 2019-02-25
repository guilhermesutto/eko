<?php include("include/head.php"); 
include("include/db.php");

//Querys
$data = dbQuerySingle("about_us", "id = 1");

?>
      <!-- Breadcrumbs -->
      <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(images/imgAboutUs.jpeg);">
        <div class="breadcrumbs-custom-inner">
          <div class="container breadcrumbs-custom-container">
            <div class="breadcrumbs-custom-main">
              <h6 class="breadcrumbs-custom-subtitle title-decorated">Pages</h6>
              <h1 class="breadcrumbs-custom-title">About Us</h1>
            </div>
            <ul class="breadcrumbs-custom-path">
              <li><a href="index.php">Home</a></li>
              <li><a href="#">Pages</a></li>
              <li class="active">About Us</li>
            </ul>
          </div>
        </div>
      </section>
      <!-- Overview-->
      <section class="section section-lg-custom">
        <div class="container">
          <div class="row row-50 justify-content-center justify-content-lg-between">
            <div class="col-md-10 col-lg-6 column-ethereal">
                <h3><?php echo $data->titulo; ?></h3>
              
                <?php echo $data->texto; ?>
              
            </div>
            <div class="col-md-10 col-lg-6 col-xl-5 align-self-end"><img class="img-responsive" src="images/about-01-510x482.png" alt="" width="510" height="482"/>
            </div>
          </div>
        </div>
      </section>
      <section class="section section-lg bg-gray-100 section-wave-offset" id="our-history">
        <div class="container">
          <!-- Timeline Classic-->
          <article class="timeline-classic">
            <div class="timeline-classic-item">
              <div class="timeline-classic-item-aside"><img class="timeline-classic-item-image" src="images/timeline-1-390x250.jpg" alt="" width="390" height="250"/>
              </div>
              <div class="timeline-classic-item-divider"></div>
              <div class="timeline-classic-item-main">
                <p class="timeline-classic-item-title">Vision</p>                
                <?php echo $data->visao; ?>
            </div>
            </div>
            <div class="timeline-classic-item">
              <div class="timeline-classic-item-aside"><img class="timeline-classic-item-image" src="images/timeline-2-390x250.jpg" alt="" width="390" height="250"/>
              </div>
              <div class="timeline-classic-item-divider"></div>
              <div class="timeline-classic-item-main">
                <p class="timeline-classic-item-title">Mission</p>                
                <?php echo $data->missao; ?>
              </div>
            </div>
            <div class="timeline-classic-item">
              <div class="timeline-classic-item-aside"><img class="timeline-classic-item-image" src="images/timeline-3-390x250.jpg" alt="" width="390" height="250"/>
              </div>
              <div class="timeline-classic-item-divider"></div>
              <div class="timeline-classic-item-main">
                <p class="timeline-classic-item-title">Values</p>
                <<?php echo $data->valores; ?>
              </div>
            </div>            
          </article>
        </div>
      </section>
      <!-- Page Footer-->
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