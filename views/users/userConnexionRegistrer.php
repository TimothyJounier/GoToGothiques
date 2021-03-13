<!-- Affichage d'un message d'erreur personnalisé -->
<?php 
if(!empty($msgCode) || $msgCode = trim(filter_input(INPUT_GET, 'msgCode', FILTER_SANITIZE_STRING))) {
    if(!array_key_exists($msgCode, $displayMsg)){
        $msgCode = 0;
    }
    echo '<div class="alert '.$displayMsg[$msgCode]['type'].'">'.$displayMsg[$msgCode]['msg'].'</div>';
} ?>
<!-- -------------------------------------------- -->
<!-- Formulare Inscription et Connexion -->

<!-- Formulare Inscription -->
<div class="container-registrer">
    <div class="message signup">
      <div class="btn-wrapper">
        <button class="button" id="signup">S'enregistrer</button>
        <button class="button" id="login"> Connexion</button>
      </div>
    </div>
    <div class="form form--signup">
      <div class="form--heading">Bienvenue! S'enregistrer</div>


      <form method="POST">
      <!-- Pseudo -->
        <input type="text" value="<?= $pseudo?? '' ?>" placeholder="Pseudo" id="pseudo" required name="pseudo" pattern="[A-Za-z-éèêëàâäôöûüç' ]+">
        <div class="valid-feedback">Parfait!</div>
        <div class="invalid-feedback">Merci de choisir un nom valide.</div>

      <!-- Email -->
        <input type="email" placeholder="Email" value="<?= $email ?? '' ?>" id="email" name="email">
        <div class="valid-feedback">Parfait!</div>
        <div class="invalid-feedback">Merci de choisir un email valide.</div>

      <!-- Password -->
        <input type="password" value="<?= $password ?? '' ?>" id="password" name="password" placeholder="Password">
        <input type="password" value="<?= $password ?? '' ?>" id="confirm_password" name="confirm_password" placeholder="Confirmation Password">
        <div class="valid-feedback">Parfait!</div>
        <div class="invalid-feedback">Merci de choisir un password valide.</div>

      <!-- Bouton -->
        <button class="button" type="submit">S'enregistrer</button>
      </form>
    </div>

    <!-- Formulare de Connexion -->
    <div class="form form--login">
      <div class="form--heading">De retour! </div>
        <div class="error big">
          <?=$errorsArray['login_error'] ?? ''; ?>
        </div>
      <form method="POST">
        <input type="email" required placeholder="Email" name="email">
        <input type="password" id="password" required placeholder="Password" name="password">
        <button class="button" type="submit">Connexion</button>
      </form>
    </div>
  </div>