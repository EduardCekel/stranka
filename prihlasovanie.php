<?php
session_start();
include("uvod.php");
include "auth/Uzivatel.php";
include "auth/DB.php";
include "auth/Auth.php";

$aut = new Auth();
$db = new DB();

?>
    <a href="index.php">späť</a>
    <section class="vh-100" style="background-color: #eee;">
    <form method="post">
    <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Prihlasenie</p>

                <form class="mx-1 mx-md-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="pEmail" class="form-control" />
                      <label class="form-label" for="form3Example1c">Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" name="pHeslo" class="form-control" />
                      <label class="form-label" for="form3Example4c">Heslo</label>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                  <input class="btn btn-primary btn-lg" type="submit" value="Prihlasiť"> 
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    </form>
  
</section>
<?php
    include("koniec.php");
?>