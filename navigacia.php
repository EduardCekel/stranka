<?php
session_start();
include("uvod.php");
include ("auth/Auth.php");
include("auth/DB.php");

$db = new DB();
$aut = new Auth();


?>
    <div class="navbar navbar-expand-sm" style = "background-color: rgb(10, 149, 95);">
        <div  class="navbar-nav" style = "position: right;">
            <div >
                <ul class="navbar-nav">
                    <?php 
                    if ($aut->isLogged)
                    { 
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?odhlas=ma" style = "color: white;">Odhlasit</a>
                    </li>
                    <?php } else { ?>
                      <li class="nav-item">
                        <a class="nav-link" href="registracia.php" style = "color: white;">Registrácia</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="prihlasovanie.php" style = "color: white;">Prihlásiť</a>
                      </li>
                    <?php } ?>
                </ul>
            </div> 
        </div>
    </div>

 <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
    <img src="img/zdruzena-logo.png" style = "height: 50px; width: auto;" title="zdruzena"
                 title="zdruzena">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item me-4">
          <a class="nav-link" href="#">Kartonáž</a>
        </li>
        <li class="nav-item me-4">
          <a class="nav-link" href="#">Prenájom</a>
        </li>
        <li class="nav-item me-4">
          <a class="nav-link" href="#">Zamestnávanie občanov so ZP</a>
        </li>
        <li class="nav-item me-4">
          <a class="nav-link" href="kontakt.php">Kontakt</a>
        </li>
        <?php
        if ($aut->isLogged)
        { ?>
        <li class="nav-item me-4">
          <a class="nav-link" href="uzivAdmin.php">Pouzivatelia</a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>   

