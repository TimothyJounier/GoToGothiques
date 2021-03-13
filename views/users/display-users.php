<div class="container-user">
  <div class="row">
        <div class="col-12 col-lg-auto mb-3">
          <h1 class="text-center">Carte de l'utilisateur</h1>
            <div class="card" style="margin-top: 100px;width: 500px;">
            <div class="card-header text-center"><?=htmlentities($user->pseudo)?></div>
            <div class="card-body text-center">
            <p class="card-text">
              <?=htmlentities($user->email)?>
            </p>
        </div>
      </div>
    </div>
  </div>
</div>