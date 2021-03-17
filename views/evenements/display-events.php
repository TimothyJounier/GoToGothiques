<div class="container-user">
  <div class="row">
        <div class="col-12 col-lg-auto mb-3">
          <h1 class="text-center">Carte de l'évènement</h1>
            <div class="card" style="margin-top: 100px;width: 500px;">
            <div class="card-header text-center"><?=htmlentities($event->title)?></div>
            <div class="card-body text-center">
            <p class="card-text">
              <?=htmlentities($event->date)?>
            </p>
        </div>
        <div class="card-body text-center">
            <p class="card-text">
              <?=htmlentities($event->description)?>
            </p>
            <a href="/controllers/edit-eventsCtrl.php?id=<?=htmlentities($event->id)?>" class="btn btn-danger">Modifier</a>
        </div>
      </div>
    </div>
  </div>
</div>