
<!--Navbar -->
<nav class="nav navbar navbar-expand-lg navbar-dark black lighten-1">
    <a class="navbar-brand" href="/controllers/homeCtrl.php"><img class="img-fluid" width="160" src="/assets/img/logo/gtg.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
      aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="bloc-nav collapse navbar-collapse" id="navbarSupportedContent-555">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/controllers/homeCtrl.php">Accueil
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/controllers/userContactCtrl.php">Contact</a>
        </li>
        <li class="nav-item">
          <?php 
          if(isset($_SESSION['id']) && $_SESSION['id_roles'] == 2){
            echo '<a class="nav-link" href="/controllers/adminsCtrl.php">Admins</a>';
          }
        ?>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item avatar">
          <?php 
          if(!empty($_SESSION['id'])){
            echo '<a class="nav-link" href="/controllers/settingsCtrl.php">Mon compte</a>';
          } else {
            echo '<a class="navbar-brand ml-auto" href="/controllers/userConnexionRegistrerCtrl.php">Connexion / Inscription</a>';
          }

        ?>
      <li class="nav-item">
        <?php
          if(!empty($_SESSION['id'])){
            echo '<a class="nav-link" href="/controllers/signoutCtrl.php">Deconnexion</a>';
          } 
          
      
        ?>
        </li>
        
          <!-- // <a class="nav-link p-0" href="/controllers/settingsCtrl.php">
          //   <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle z-depth-0"
          //     alt="avatar image" height="35"> -->
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!--/.Navbar -->