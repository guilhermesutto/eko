<?php
// Inicia o cURL acessando uma URL
$cURL = curl_init('http://ekovolunteers.com/painel/public/api/home-banner');
// Define a opÁ„o que diz que vocÍ quer receber o resultado encontrado
curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
// Executa a consulta, conectando-se ao site e salvando o resultado na vari·vel $resultado
$resultado = curl_exec($cURL);
// Encerra a conex„o com o site
curl_close($cURL);

$Banner = json_decode($resultado, true);
$Banner = json_decode($Banner['conteudo'], true);
$Banner = $Banner['imgBanner'];


//INCLUDE DO HEAD
include("include/head.php");
?>

      <!-- Slider-->
      <section class="section swiper-container swiper-slider swiper-slider-business bg-gray-700" data-loop="true" data-slide-effect="fade" data-autoplay="5000" data-simulate-touch="false" data-custom-slide-effect="inter-leave-effect">
        <div class="swiper-wrapper context-dark">
          <?php foreach($Banner as $banner){ ?>
            <div class="swiper-slide" data-slide-bg="painel/public/<?php echo $banner; ?>">
              <div class="slide-inner">
                <div class="swiper-slide-caption">
                  <div class="container">                  
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>             
        </div>
        <div class="swiper-slider-nav container">
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      </section>
      <!-- A Few Words About Us-->
      <section class="section section-md">
        <div class="section-wave section-wave-white">
          <svg x="0px" y="0px" viewBox="0 0 1920 45" width="1920" height="45px" preserveAspectRatio="none">
            <style type="text/css"></style>
            <path d="M1920,0c-82.8,0-108.8,44.4-192,44.4c-78.8,0-116.5-43.7-192-43.7c-77.1,0-115.9,44.4-192,44.4c-78.2,0-114.6-44.4-192-44.4c-78.4,0-115.3,44.4-192,44.4C883.1,45,841,0.6,768,0.6C691,0.6,652.8,45,576,45C502.4,45,461.9,0.6,385,0.6C306.5,0.6,267.9,45,191,45C115.1,45,78,0.6,0,0.6V45h1920V0z"></path>
          </svg>
        </div>
        <div class="container">
          <div class="row row-50 justify-content-center justify-content-xl-between flex-xl-row-reverse text-center text-xl-left">
            <div class="col-lg-6 col-xl-5">
              <div class="inset-right-3">
                <h3 class="wow-outer"><span class="wow slideInDown">Water Purified by Nature	and Delivered with Love</span></h3>
                <p class="text-op-amaranthine wow-outer"><span class="wow slideInDown" data-wow-delay=".05s">Our pristine water flows from the Penobscot Ridge Mountains. The bountiful ‚Äústream‚Äù is the wellspring that constantly provides fresh, clean water to our well located just a few steps away from our plant.</span></p>
                <div class="wow-outer button-outer"><a class="button button-lg button-primary button-winona wow slideInDown" data-wow-delay=".1s" href="about-us.html">Learn more</a></div>
              </div>
            </div>
            <div class="col-lg-7"><img src="images/index-01-711x429.png" alt="" width="711" height="429"/>
            </div>
          </div>
        </div>
      </section>
      <!-- Small Features-->
      <section class="section section-lg bg-gray-100">
        <div class="container">
          <div class="row row-30">
            <div class="col-sm-6 col-lg-4 wow-outer">
              <!-- Box Minimal-->
              <article class="box-minimal">
                <div class="box-minimal-icon mdi mdi-shield wow fadeIn"></div>
                <div class="box-minimal-main wow-outer">
                  <h4 class="box-minimal-title wow slideInDown">Protection from Bacteria</h4>
                  <p class="wow fadeInUpSmall">Though spring water is naturally clean, we try our best to make sure that our water is bacteria-free at all production stages.</p>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4 wow-outer">
              <!-- Box Minimal-->
              <article class="box-minimal">
                <div class="box-minimal-icon mdi mdi-leaf wow fadeIn" data-wow-delay=".1s"></div>
                <div class="box-minimal-main wow-outer">
                  <h4 class="box-minimal-title wow slideInDown" data-wow-delay=".1s">No Contaminants</h4>
                  <p class="wow fadeInUpSmall" data-wow-delay=".1s">We control the production process of our water to make sure you receive the best product from the company, which you can trust.</p>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4 wow-outer">
              <!-- Box Minimal-->
              <article class="box-minimal">
                <div class="box-minimal-icon mdi mdi-water wow fadeIn" data-wow-delay=".2s"></div>
                <div class="box-minimal-main wow-outer">
                  <h4 class="box-minimal-title wow slideInDown" data-wow-delay=".2s">Automated Bottling Lines</h4>
                  <p class="wow fadeInUpSmall" data-wow-delay=".2s">The process of bottling the spring water at our plant is fully automatized. However, we always control it to ensure the high quality.</p>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>
      <!-- Woman CTA-->
      <section class="section section-xl bg-gray-700 bg-image bg-image-1" style="background-image: url(images/call-to-action-1-1920x584.jpg);">
        <div class="container">
          <div class="row justify-content-sm-end">
            <div class="col-sm-9 col-md-7 col-lg-6">
              <div class="box-6">
                <div class="wow-outer">
                  <div class="wow slideInUp">
                    <h3 class="font-weight-semibold">From an Artesian Well to Home and Office</h3>
                  </div>
                </div>
                <div class="wow-outer offset-top-4">
                  <div class="wow slideInDown">
                    <p>For more than 60 years, we have been supplying the American homes and offices with high-quality spring water from a pristine stream near our plant.</p><a class="button button-primary button-winona" href="#">Read More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Section Products-->
      <section class="section section-lg section-wave-offset">
        <div class="container">
          <h3 class="text-center">Our Products</h3>
          <div class="row row-30 row-md-50">
            <div class="col-md-6">
                    <article class="card-modern wow fadeInUp" data-wow-delay=".05s">
                      <div class="card-modern-left"><img src="images/water-01-138x197.png" alt="" width="138" height="197"/>
                      </div>
                      <div class="card-modern-body">
                        <h4><a class="card-modern-title" href="#">1 L Spring Water in Glass</a></h4>
                        <div class="card-modern-price"><span>$10</span></div>
                        <div class="card-modern-info"><span class="icon icon-sm mdi mdi-information-outline"></span><span class="card-modern-info-text">for daily use</span></div>
                        <div class="card-modern-text">
                          <p>Enjoy your favorite spring water in the most popular shape! This water is great to share and drink at any weather and is a reasonable offer for any budget.</p>
                        </div>
                      </div>
                    </article>
            </div>
            <div class="col-md-6">
                    <article class="card-modern wow fadeInUp second" data-wow-delay=".05s">
                      <div class="card-modern-left"><img src="images/water-02-138x197.png" alt="" width="138" height="197"/>
                      </div>
                      <div class="card-modern-body">
                        <h4><a class="card-modern-title" href="#">750 ml Sparkling Water</a></h4>
                        <div class="card-modern-price"><span>$9</span></div>
                        <div class="card-modern-info"><span class="icon icon-sm mdi mdi-information-outline"></span><span class="card-modern-info-text">for daily use</span></div>
                        <div class="card-modern-text">
                          <p>Perfect sparkling water for single- or multi-serve convenience for home, restaurant or upscale retail stores. We are sure you will love its energizing effect.</p>
                        </div>
                      </div>
                    </article>
            </div>
            <div class="col-md-6">
                    <article class="card-modern wow fadeInUp third" data-wow-delay=".05s">
                      <div class="card-modern-left"><img src="images/water-03-138x197.png" alt="" width="138" height="197"/>
                      </div>
                      <div class="card-modern-body">
                        <h4><a class="card-modern-title" href="#">500 ml Spring Water</a></h4>
                        <div class="card-modern-price"><span>$7</span></div>
                        <div class="card-modern-info"><span class="icon icon-sm mdi mdi-information-outline"></span><span class="card-modern-info-text">for daily use</span></div>
                        <div class="card-modern-text">
                          <p>Need a greater amount of our spring water at an affordable price? Then Water‚Äôs 500 ml spring water is your #1 fit. Available at all major department stores and online.</p>
                        </div>
                      </div>
                    </article>
            </div>
            <div class="col-md-6">
                    <article class="card-modern wow fadeInUp fourth" data-wow-delay=".05s">
                      <div class="card-modern-left"><img src="images/water-04-138x197.png" alt="" width="138" height="197"/>
                      </div>
                      <div class="card-modern-body">
                        <h4><a class="card-modern-title" href="#">333 ml Spring Water</a></h4>
                        <div class="card-modern-price"><span>$10</span></div>
                        <div class="card-modern-info"><span class="icon icon-sm mdi mdi-information-outline"></span><span class="card-modern-info-text">for daily use</span></div>
                        <div class="card-modern-text">
                          <p>Wherever it is served, our Spring Water is the finest pairing for any dish. Our spring‚Äôs unique blend of minerals provides a remarkably refreshing taste.</p>
                        </div>
                      </div>
                    </article>
            </div>
          </div>
          <div class="row justify-content-center text-center row-offset-custom-1">
            <div class="col-12">
              <div class="wow-outer button-outer"><a class="button button-lg button-primary button-winona wow slideInDown" data-wow-delay=".1s" href="about-us.html">View more</a></div>
            </div>
          </div>
        </div>
      </section>
      <!-- Services-->
      <section class="section section-lg bg-gray-100 text-center">
        <div class="container">
          <div class="box-4">
            <h3 class="wow-outer"><span class="wow slideInUp">We Work to Offer the Best Customer Service</span></h3>
          </div>
          <div class="row row-30">
            <div class="col-sm-6 col-lg-4 wow-outer">
              <!-- Box Creative-->
              <article class="box-creative wow slideInLeft">
                <div class="box-creative-icon mdi mdi-cellphone-android"></div>
                <h4 class="box-creative-title"><a href="#">Online Ordering</a></h4>
                <p>Our online store is always open to customers who prefer to drink quality spring water. You can also order Water products via our partners‚Äô websites.</p>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4 wow-outer">
              <!-- Box Creative-->
              <article class="box-creative wow slideInLeft" data-wow-delay=".1s">
                <div class="box-creative-icon fl-bigmug-line-graphical8"></div>
                <h4 class="box-creative-title"><a href="#">Free Delivery</a></h4>
                <p>If your order more than 6 bottles of our water we will deliver it to your home or office for free. This offer applies only to online orders placed till 8 PM.</p>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4 wow-outer">
              <!-- Box Creative-->
              <article class="box-creative wow slideInLeft" data-wow-delay=".2s">
                <div class="box-creative-icon mdi mdi mdi-heart-outline"></div>
                <h4 class="box-creative-title"><a href="#">Friendly Managers</a></h4>
                <p>Our team of friendly managers is always ready to help you choose and order the best sparkling or spring water. Feel free to contact us for more information.</p>
              </article>
            </div>
          </div>
        </div>
      </section>
      <!-- Testimonials-->
      <section class="section section-lg text-center">
        <div class="container">
          <h3>Testimonials</h3>
          <div class="owl-carousel" data-items="1" data-md-items="2" data-dots="true" data-nav="false" data-loop="true" data-margin="30" data-stage-padding="0" data-mouse-drag="false">
            <div class="wow-outer">
              <blockquote class="quote-modern quote-modern-big wow slideInLeft">
                <svg class="quote-modern-mark" x="0px" y="0px" width="35px" height="25px" viewbox="0 0 35 25">
                  <path d="M27.461,10.206h7.5v15h-15v-15L25,0.127h7.5L27.461,10.206z M7.539,10.206h7.5v15h-15v-15L4.961,0.127h7.5                L7.539,10.206z"></path>
                </svg>
                <div class="quote-modern-text">
                  <p>I am so grateful for this water delivery to our home! We‚Äôve got our energy back after just a short time and we feel vibrant again! I especially like sparkling water.</p>
                </div>
                <div class="quote-modern-meta">
                  <div class="quote-modern-avatar"><img src="images/testimonials-person-1-96x96.jpg" alt="" width="96" height="96"/>
                  </div>
                  <div class="quote-modern-info">
                    <cite class="quote-modern-cite">Kelly McMillan</cite>
                    <p class="quote-modern-caption">Regular Client</p>
                  </div>
                </div>
              </blockquote>
            </div>
            <div class="wow-outer">
              <blockquote class="quote-modern quote-modern-big wow slideInLeft">
                <svg class="quote-modern-mark" x="0px" y="0px" width="35px" height="25px" viewbox="0 0 35 25">
                  <path d="M27.461,10.206h7.5v15h-15v-15L25,0.127h7.5L27.461,10.206z M7.539,10.206h7.5v15h-15v-15L4.961,0.127h7.5                L7.539,10.206z"></path>
                </svg>
                <div class="quote-modern-text">
                  <p>I have looked far and wide in Los Angeles County for the purest water, and Water is without a doubt the cleanest, freshest, most vital water available and it is also affordable.</p>
                </div>
                <div class="quote-modern-meta">
                  <div class="quote-modern-avatar"><img src="images/testimonials-person-2-96x96.jpg" alt="" width="96" height="96"/>
                  </div>
                  <div class="quote-modern-info">
                    <cite class="quote-modern-cite">Harold Barnett</cite>
                    <p class="quote-modern-caption">Regular Client</p>
                  </div>
                </div>
              </blockquote>
            </div>
            <div class="wow-outer">
              <blockquote class="quote-modern quote-modern-big wow slideInLeft">
                <svg class="quote-modern-mark" x="0px" y="0px" width="35px" height="25px" viewbox="0 0 35 25">
                  <path d="M27.461,10.206h7.5v15h-15v-15L25,0.127h7.5L27.461,10.206z M7.539,10.206h7.5v15h-15v-15L4.961,0.127h7.5                L7.539,10.206z"></path>
                </svg>
                <div class="quote-modern-text">
                  <p>I have been drinking your spring water since November and I love it! The water is so delicious and the Water team is so wonderful and helpful.</p>
                </div>
                <div class="quote-modern-meta">
                  <div class="quote-modern-avatar"><img src="images/testimonials-person-3-96x96.jpg" alt="" width="96" height="96"/>
                  </div>
                  <div class="quote-modern-info">
                    <cite class="quote-modern-cite">Albert Webb</cite>
                    <p class="quote-modern-caption">Regular Client</p>
                  </div>
                </div>
              </blockquote>
            </div>
            <div class="wow-outer">
              <blockquote class="quote-modern quote-modern-big wow slideInLeft">
                <svg class="quote-modern-mark" x="0px" y="0px" width="35px" height="25px" viewbox="0 0 35 25">
                  <path d="M27.461,10.206h7.5v15h-15v-15L25,0.127h7.5L27.461,10.206z M7.539,10.206h7.5v15h-15v-15L4.961,0.127h7.5                L7.539,10.206z"></path>
                </svg>
                <div class="quote-modern-text">
                  <p>Could not be happier with this service, the water, and the people involved. I have been using them for almost a year. The water tastes incredible and I like it!</p>
                </div>
                <div class="quote-modern-meta">
                  <div class="quote-modern-avatar"><img src="images/testimonials-person-4-96x96.jpg" alt="" width="96" height="96"/>
                  </div>
                  <div class="quote-modern-info">
                    <cite class="quote-modern-cite">Samantha Lee</cite>
                    <p class="quote-modern-caption">Regular Client</p>
                  </div>
                </div>
              </blockquote>
            </div>
          </div>
        </div>
      </section>
      <!-- Latest Blog Posts-->
      <section class="section section-lg bg-gray-100 section-wave-offset">
        <div class="container">
          <h3 class="wow-outer text-center"><span class="wow slideInDown">Latest Blog Posts</span></h3>
          <div class="row row-50 justify-content-center justify-content-lg-start">
            <div class="col-md-10 col-lg-7 wow-outer">
              <!-- Post Block-->
              <article class="post-block bg-gray-700"><img class="post-block-image" src="images/blog-layouts-5-637x456.jpg" alt="" width="637" height="456"/>
                <div class="post-block-caption">
                  <ul class="post-block-meta">
                    <li class="wow-outer"><span class="wow slideInLeft">by Theresa Barnes</span></li>
                    <li class="wow-outer"><a class="button-winona wow slideInLeft" href="#">News</a></li>
                    <li class="wow-outer">
                      <time class="wow slideInLeft" datetime="2018">April 2, 2018</time>
                    </li>
                  </ul>
                  <h4 class="post-block-title"><a href="single-blog-post.html">The Health Benefits of Drinking Spring Water</a></h4>
                </div>
                <div class="post-block-dummy"></div>
              </article>
            </div>
            <div class="col-md-10 col-lg-5">
              <div class="post-light-group wow-outer">
                <!-- Post Light-->
                <article class="post-light wow slideInLeft">
                  <time class="post-light-time" datetime="2018"><span class="post-light-time-big">29</span><span class="post-light-time-small">April</span></time>
                  <div class="post-light-main">
                    <h4 class="post-light-title"><a href="single-blog-post.html">The Secrets of Modern	Spring Water</a></h4>
                    <ul class="post-light-meta">
                      <li>by Theresa Barnes</li>
                      <li><a class="button-winona" href="#">News</a></li>
                    </ul>
                  </div>
                </article>
                <!-- Post Light-->
                <article class="post-light wow slideInLeft">
                  <time class="post-light-time" datetime="2018"><span class="post-light-time-big">30</span><span class="post-light-time-small">April</span></time>
                  <div class="post-light-main">
                    <h4 class="post-light-title"><a href="single-blog-post.html">Top 10 Facts About Our Bottled Water</a></h4>
                    <ul class="post-light-meta">
                      <li>by Theresa Barnes</li>
                      <li><a class="button-winona" href="#">News</a></li>
                    </ul>
                  </div>
                </article>
                <!-- Post Light-->
                <article class="post-light wow slideInLeft">
                  <time class="post-light-time" datetime="2018"><span class="post-light-time-big">2</span><span class="post-light-time-small">May</span></time>
                  <div class="post-light-main">
                    <h4 class="post-light-title"><a href="single-blog-post.html">Spring Water vs. Sparkling 	Water: What to Choose?</a></h4>
                    <ul class="post-light-meta">
                      <li>by Theresa Barnes</li>
                      <li><a class="button-winona" href="#">News</a></li>
                    </ul>
                  </div>
                </article>
              </div>
              <div class="wow-outer button-outer"><a class="button button-primary button-winona wow slideInDown" href="blog.html">View all posts</a></div>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Footer-->
            <footer class="section footer-standard bg-gray-modern">
              <div class="section-wave">
                <svg x="0px" y="0px" viewBox="0 0 1920 45" width="1920" height="45px" preserveAspectRatio="none">
                  <style type="text/css"></style>
                  <path d="M1920,0c-82.8,0-108.8,44.4-192,44.4c-78.8,0-116.5-43.7-192-43.7c-77.1,0-115.9,44.4-192,44.4c-78.2,0-114.6-44.4-192-44.4c-78.4,0-115.3,44.4-192,44.4C883.1,45,841,0.6,768,0.6C691,0.6,652.8,45,576,45C502.4,45,461.9,0.6,385,0.6C306.5,0.6,267.9,45,191,45C115.1,45,78,0.6,0,0.6V45h1920V0z"></path>
                </svg>
              </div>
              <div class="footer-standard-main">
                <div class="container">
                  <div class="row row-50">
                    <div class="col-lg-4">
                      <div class="inset-right-1">
                        <h4>About Us</h4>
                        <p>Water is one of the leading spring water providers in the USA. We bottle and deliver bacteria-free spring water throughout the country covering all water needs and tastes. We are proud to be the nation‚Äôs #1 water provider!</p>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4">
                      <div class="box-1">
                        <h4>Contact Information</h4>
                        <ul class="list-sm list-footer">
                          <li class="object-inline"><span class="icon icon-sm mdi mdi-map-marker text-gray-700"></span><a class="link-default" href="#">2130 Fulton Street <br> San Diego, CA 94117-1080 USA</a></li>
                          <li class="object-inline"><span class="icon icon-sm mdi mdi-phone text-gray-700"></span><a class="link-default" href="tel:#">1-800-1234-678</a></li>
                          <li class="object-inline"><span class="icon icon-sm mdi mdi-email text-gray-700"></span><a class="link-default" href="mailto:#">info@demolink.org</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-7 col-lg-4">
                      <h4>Newsletter</h4>
                      <p>Sign up to our newsletter and be the first to know about latest news, special offers, events, and discounts.</p>
                      <!-- RD Mailform-->
                      <form class="rd-form rd-mailform form-inline" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="bat/rd-mailform.php">
                        <div class="form-wrap">
                          <input class="form-input" id="subscribe-form-2-email" type="email" name="email" data-constraints="@Email @Required">
                          <label class="form-label" for="subscribe-form-2-email">E-mail</label>
                        </div>
                        <div class="form-button">
                          <button class="button button-primary button-icon button-icon-only button-winona" type="submit" aria-label="submit"><span class="icon mdi mdi-email-outline"></span></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="footer-standard-aside justify-content-center">
                  <!-- Rights-->
                  <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>All Rights Reserved.</span><span>&nbsp;</span><br class="d-sm-none"/><a href="#">Terms of Use</a><span> and</span><span>&nbsp;</span><a href="terms-of-use.html">Privacy Policy</a></p>
                </div>
              </div>
            </footer>
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