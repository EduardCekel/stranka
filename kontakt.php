<?php
include("navigacia.php");
include "auth/Formular.php";
include "auth/Uzivatel.php";

if ($aut->isLogged)
{
    if (isset($_GET['delete']))
    {
      $db->remove($_GET['delete']);
    }
}

if ($aut->isLogged)
{
    if (isset($_POST['uprav']))
    {
      $db->update($_GET['upravit'], $_POST['namePost']);
    }
}

?>
  <main>
    <div >

    </div>
    <div class = "uvodKontakt mb-5">
      <h1 class = "container">Kontakt</h1>
      <hr>
    </div>
    <!--
    <div class = "container">
      <p><b>Adresa:</b> Zimná 94, 052 01 Spišská Nová Ves</p>
          <p><b>Informácie:</b> (+421)53/44 240 71</p>
          <p><b>Obchodný úsek:</b> (+421)905 928 337</p>
          <p><b>Výrobný úsek:</b> (+421)915 965 709</p>
          <p><b>Fax:</b> (+421)53/44 652 45</p>
          <p><b>E-mail:</b> zdruzena@zdruzena.sk</p>
    </div>-->
    

    <?php
    foreach ($db->getAllPosts() as $post) { ?>
     <div class="offset-2 col-7 mt-3">
      <div class="card">
        <div class="card-body post">
          <h5 class="card-title"><?php
            foreach ($db->getAllUsers() as $user)
            {
              if ($user->id == $post->id_user)
              {
                echo $user->meno," ",$user->priezvisko;
              }
            }
          ?></h5>
          <p class="card-text"><?php echo $post->post; ?></p>
          <?php if ($aut->isLogged) { ?>
            <a href="?odpoved=ano" class="btn btn-light">Odpovedať</a>
            <?php
              foreach ($db->getAllUsers() as $user)
              {
                if ($user->id == $post->id_user && 'admin' == $user->meno)
                {
                  ?> <a href="?upravit=<?php echo $post->id ?>" class="btn btn-info">Upravit</a>
              <?php  }
              }
            ?>
            <a href="?delete=<?php echo $post->id ?>" class="btn btn-danger">Vymaz</a>
          <?php } ?>
        </div>
      </div>
    </div>
    <?php if (isset($_GET['upravit']) && $_GET['upravit'] == $post->id && !(isset($_POST['uprav'])))
                        { ?>
                          <div style="margin-top: 4px;">
                          <form method="post">
                                    <div class="form-group col-7 offset-3">
                                        <textarea class="form-control" name="namePost" id="exampleFormControlTextarea1" rows="4"><?php echo $post->post; ?></textarea>
                                      </div>
                                      <input class="btn btn-light offset-3" type="submit" name="uprav" value="Odoslať"/>
                                    </form>
                              </div>
                     <?php   }
                  ?>
    <?php  } 
    if ($aut->isLogged) {
    ?>
    <div style="margin-top: 5%">
          <div class="form-group col-8 offset-1">
              <label for="exampleFormControlTextarea1">Zadajte text správy</label>
              <textarea class="form-control" name="post" id="exampleFormControlTextarea1" rows="4"></textarea>
            </div>
            <a href="#"></a>
            <input class="offset-1 mt-1 btn btn-light" type="submit" value="Odoslať">
           </form>
    </div>
      
  </main>

<?php
  }
  ?> 
  <div style = "margin-bottom: 5%;"></div>
  <?php
  include("footer.php");
?>