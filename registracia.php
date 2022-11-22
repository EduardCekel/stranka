<?php
session_start();
include("uvod.php");
include "auth/Uzivatel.php";
include "auth/DB.php";

$db = new DB();

if (isset($_POST['rMeno']) && isset($_POST['rPriezvisko']) && isset($_POST['rEmail']) && isset($_POST['rHeslo'])) 
{
  if ($_POST['rHeslo'] == $_POST['rHesloZnovu'])
  {
    $neexistuje = true;
    foreach($db->getAllUsers() as $user)
    {
      if($user->email == $_POST['rEmail'])
      {
        $neexistuje = false;
        ?> <div style = "color: white; background-color: rgb(189, 21, 21); font-size: 13px; padding-left: 3%;">Zadaný email pouíva iný používateľ!</div> <?php
      }
    }
    if ($neexistuje)
    {
      $newUser = new Uzivatel();
      $newUser->meno = $_POST['rMeno'];
      $newUser->priezvisko = $_POST['rPriezvisko'];
      $newUser->email = $_POST['rEmail'];
      $newUser->heslo = $_POST['rHeslo'];
      $db->storeUser($newUser);
      ?> <div style = "color: white; background-color: rgb(59, 193, 79); font-size: 13px; padding-left: 3%;">Registrácia prebehla úspešne.</div> <?php
    }
    
  }
  
}

?>
    <a href="index.php">späť</a>
    <section class="vh-100" style="background-color: #eee;">
    <form id="fRegistracia" method="post">
    <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registrácia</p>

                <form class="mx-1 mx-md-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <div id="drM"></div>
                      <input id="rM" type="text" name="rMeno" class="form-control" />
                      <label class="form-label" for="form3Example1c">Meno</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <div id="drP"></div>
                      <input id="rP" type="text" name="rPriezvisko" class="form-control" />
                      <label class="form-label" for="form3Example1c">Priezvisko</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <div id="drE"></div>
                      <input id="rE" type="email" name="rEmail" class="form-control" />
                      <label class="form-label" for="form3Example3c">Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <div id="drH"></div>
                      <input id="rH" type="password" name="rHeslo" class="form-control" />
                      <label class="form-label" for="form3Example4c">Heslo</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <div id="drHZ"></div>
                      <input id="rHZ" type="password" name="rHesloZnovu" class="form-control" />
                      <label class="form-label" for="form3Example4cd">Heslo znovu</label>
                    </div>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                  <input type="submit" class="btn btn-primary btn-lg"  value="Registrovať" />
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