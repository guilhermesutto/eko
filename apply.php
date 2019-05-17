<?php
//INCLUDE DO HEAD
include("include/head.php");
include("include/db.php");

if(isset($_POST['genre'])){

}

$Destinos = dbQuery("destinos");
$Projetos = dbQuery("home_projetos");
$terms = dbQuerySingle("terms", "id = 3");

$Banner = dbQuerySingle("banners", "id = 8");

?>
<style>
    body{
        overflow-x: hidden;
    }
</style>
      <!-- Breadcrumbs -->
      <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(painel/public/uploads/about-us/<?php echo $Banner->banner; ?>);">
        <div class="breadcrumbs-custom-inner">
          <div class="container breadcrumbs-custom-container">
            <div class="breadcrumbs-custom-main">
              <h6 class="breadcrumbs-custom-subtitle title-decorated"></h6>
              <h1 class="breadcrumbs-custom-title">Apply</h1>
            </div>
            <ul class="breadcrumbs-custom-path">
              <li><a href="index.php">Home</a></li>             
              <li class="active">Apply</li>
            </ul>
          </div>
        </div>
      </section>
      <!-- Section Products-->
      <section class="section section-lg section-wave-offset">
        <div class="container">            
            <form method="post" name="form" id="form">
                <div class="row" style="margin-bottom: 50px;">
                    <div class="col-md-6">
                        <label>Project</label>
                        <select name="project" id="project" class="form-control" />
                            <option value="all"> All projects </option>
                            <option value="notSure"> Not Sure </option>
                            <?php foreach($Projetos as $p){ ?>
                                <option value="<?php echo $p->titulo; ?>"><?php echo getTermobyId($p->titulo); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Destination</label>
                        <select name="destination" id="destination" class="form-control" />
                            <option value="all"> All destinations </option>
                            <option value="notSure"> Not Sure </option>
                            <?php foreach($Destinos as $p){ ?>
                                <option value="<?php echo $p->cidade; ?>"><?php echo $p->cidade; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <hr />           
                <h5>About yourself</h5>  
                <hr />   
                <div class="row">
                    <div class="col-md-6">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" />                            
                    </div>
                    <div class="col-md-6">
                        <label>Lastname</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" />                            
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>How do you prefer to be called?</label>
                        <input type="text" name="nickname" id="nickname" class="form-control" />                            
                    </div>
                    <div class="col-md-6">
                        <label>Genre</label>
                        <select name="genre" id="genre" class="form-control" />
                            <option value=""> Select </option>
                            <option value="Male"> Male </option>
                            <option value="Female"> Female </option>
                            <option value="Undefined"> Prefer dont specify </option>
                        </select>                            
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-6">
                        <label>Nationality</label>
                        <input type="text" name="nationality" id="nationality" class="form-control" />                            
                    </div>
                    <div class="col-md-6">
                        <label>Date of birth</label>
                        <input type="text" name="date" id="date" class="form-control" />                                                   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Email</label>
                        <input type="text" name="email" id="email" class="form-control" />                            
                    </div>
                    <div class="col-md-6">
                        <label>Confirm email</label>
                        <input type="text" id="confirm" class="form-control" />                                                   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>How did you know about Eko volunteers?</label>
                        <input type="text" name="how" id="how" class="form-control" />                            
                    </div>                    
                </div> 
                <div class="row">
                    <div class="col-md-1">
                        <input type="checkbox" name="terms" id="terms" class="form-control" style="width: 45px; height: 45px;" />  
                    </div>
                    <div class="col-md-11" style="margin-left: -50px;">
                        <label>I have read and agree to the Eko Volunteers <a href="#terms" id="termA">terms and conditions</a>. 
                        I understand that this is a paid program that requires a fee to participate.</label>                                                  
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <input type="checkbox" name="info" id="info" class="form-control" style="width: 45px; height: 45px;" />
                    </div>
                    <div class="col-md-6" style="margin-left: -50px;">
                        <label style="line-height: 48px;">All information provided is correct and true.</label>                                                    
                    </div>                    
                </div>
                <div class="row">
                    <input type="button" name="submit" id="btnSubmit" value="Submit" class="btn btn-primary" />
                </div>                            
            </form>
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

    <div class="modal modal-custom fade" id="TermsModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Terms and Conditions</h3>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
          </div>
          <div class="modal-body">
            <p>
                <?php echo $terms->termo; ?>
            </p>            
          </div>
        </div>
      </div>
    </div>
    

    

    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>

    <script>
        $(document).ready(function(){
            $("#date").mask("99/99/9999");

            $("#termA").on("click", function(){
                $("#TermsModal").modal();
            });

            $("#btnSubmit").on("click", function(){
                erro = 1;

                if($("#email").val() != $("#confirm").val()){
                    alert("The email confirmation doesn't match the email field");
                    return false;
                }                

                if(!$("#terms").is(":checked")){
                    alert("Please accept our terms and conditions");
                    return false;
                }

                if(!$("#info").is(":checked")){
                    alert("Please confirm that all your provided information are true.");
                    return false;
                }

                $(".form-control").each(function(){
                    if($(this).val() == ""){
                        erro = 2;
                    }
                });

                if(erro != 1){
                    alert("Please fill all the fields of the form!");
                    return false;
                }else{
                    sendForm();
                }
                
            });
        });

        function sendForm(){
            
            var project = $("#project").val();
            var destination = $("#destination").val();
            var name = $("#name").val();
            var lastname = $("#lastname").val();
            var nickname = $("#nickname").val();
            var genre = $("#genre").val();
            var nationality = $("#nationality").val();
            var date = $("#date").val();
            var email = $("#email").val();
            var how = $("#how").val();

            $.ajax({
                method: "POST",
                url: "send-email.php",
                data: {project: project, destination: destination, name: name, lastname: lastname, nickname: nickname, genre: genre, nationality: nationality, date: date, email: email, how: how},
                async: false
            })
                .done(function (data) {
                if(data == 1) alert("Sua inscrição foi enviada com sucesso, logo entraremos em contato!");
                else alert("Ocorreu um erro ao enviar sua solicitação, por favor tente novamente mais tarde!");
            });

            //location.reload();

            return false;
            
        }
    </script>
  </body>
</html>