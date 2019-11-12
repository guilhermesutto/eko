<?php
//INCLUDE DO HEAD
include("include/head.php");
include("include/db.php");

$Footer = dbQuerySingle("footer", "id = 1");
$Banner = dbQuerySingle("banners", "id = 3");


?>
      <!-- Breadcrumbs -->
      <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(painel/public/uploads/about-us/<?php echo $Banner->banner; ?>);">
        <div class="breadcrumbs-custom-inner">
          <div class="container breadcrumbs-custom-container">
            <div class="breadcrumbs-custom-main">
              <h6 class="breadcrumbs-custom-subtitle title-decorated">Contacts</h6>
              <h1 class="breadcrumbs-custom-title">Contacts</h1>
            </div>
            <ul class="breadcrumbs-custom-path">
              <li><a href="index.html">Home</a></li>
              <li class="active">Contacts</li>
            </ul>
          </div>
        </div>
      </section>
      <section class="section section-sm">
        <div class="container">
          <div class="layout-bordered">
            <div class="layout-bordered-item wow-outer">
              <div class="layout-bordered-item-inner wow slideInUp">
                <div class="icon icon-lg mdi mdi-phone text-primary"></div>
                <ul class="list-0">
                  <li><a class="link-default" href="tel:#"><?php echo $Footer->telefone; ?></a></li>                  
                </ul>
              </div>
            </div>
            <div class="layout-bordered-item wow-outer">
              <div class="layout-bordered-item-inner wow slideInUp">
                <div class="icon icon-lg mdi mdi-email text-primary"></div><a class="link-default" href="mailto:#"><?php echo $Footer->email; ?></a>
              </div>
            </div>
            <div class="layout-bordered-item wow-outer">
              <div class="layout-bordered-item-inner wow slideInUp">
                <div class="icon icon-lg mdi mdi-map-marker text-primary"></div><a class="link-default" href="#"><?php echo $Footer->endereco; ?></a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section bg-gray-100">
        <div class="range justify-content-xl-between">
          <div class="cell-xl-6 align-self-center container">
            <div class="row">
              <div class="col-lg-9 cell-inner" style="margin-left: 55%;">
                <div class="section-lg">
                  <h3 class="wow-outer"><span class="wow slideInDown" style="text-align: center;">Contact Us</span></h3>
                  <!-- RD Mailform-->
                  <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                    <div class="row row-10">
                      <div class="col-md-6 wow-outer">
                        <div class="form-wrap wow fadeSlideInUp">
                          <label class="form-label-outside" for="contact-first-name">First Name</label>
                          <input class="form-input" id="contact-first-name" type="text" name="name" id="name" data-constraints="@Required">
                        </div>
                      </div>
                      <div class="col-md-6 wow-outer">
                        <div class="form-wrap wow fadeSlideInUp">
                          <label class="form-label-outside" for="contact-last-name">Last Name</label>
                          <input class="form-input" id="contact-last-name" type="text" name="lastname" id="lastname" data-constraints="@Required">
                        </div>
                      </div>
                      <div class="col-md-6 wow-outer">
                        <div class="form-wrap wow fadeSlideInUp">
                          <label class="form-label-outside" for="contact-email">E-mail</label>
                          <input class="form-input" id="contact-email" type="email" name="email" id="email" data-constraints="@Email @Required">
                        </div>
                      </div>
                      <div class="col-md-6 wow-outer">
                        <div class="form-wrap wow fadeSlideInUp">
                          <label class="form-label-outside" for="contact-phone">Phone</label>
                          <input class="form-input" id="contact-phone" type="text" name="phone" id="phone" data-constraints="@PhoneNumber">
                        </div>
                      </div>
                      <div class="col-12 wow-outer">
                        <div class="form-wrap wow fadeSlideInUp">
                          <label class="form-label-outside" for="contact-message">Your Message</label>
                          <textarea class="form-input" id="contact-message" name="message" id="text" data-constraints="@Required"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="group group-middle">
                      <div class="wow-outer"> 
                        <button class="button button-primary button-winona wow slideInRight" type="button" id="sendForm">Send Message</button>
                      </div>                      
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          
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
    <script>
    
      $(document).ready(function(){
        $("#sendForm").on("click", function(){
          var name      = $("#name").val();
          var lastname  = $("#lastname").val();
          var email = $("#email").val();
          var phone = $("#phone").val();
          var text = $("#text").val();
          
          if(email != ""){
            $.ajax({
                method: "POST",
                url: "painel/public/api/add-news",
                data: {email: email, name: name, lastname: lastname, phone: phone, text: text},
                async: false
            }).done(function (data) {
                alert("Seu contato foi enviado com sucesso.");                
            });
          }
        });
      });

    </script>
  </body>
</html>