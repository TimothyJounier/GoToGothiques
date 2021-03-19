<div id="h">
    <div class="container">
      <div class="row">
        <div class="text-img col-md-8 col-md-offset-2">
        </div>
      </div>
      <!--/row-->
    </div>
    <!--/container-->
  </div>
  <!--/H-->

  <div class="container ptb">
    <div class="row">
      <div class="col-md-6">
        <h2>Bienvenue sur le site des rendez-vous de Fan des Gothiques D'Amiens</h2>
        <BR/>
        <h4>LOREM IPSUM IS SIMPLY DUMMY TEXT.</h4>

        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content
          here, content here', making it look like readable English.</p>
        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
      </div>
      <!--/col-md-6-->
      <div class="col-md-6">
        <div class="card cardHome">
          <img class="card-img-top" src="/assets/img/background/steak-easy.jpg" alt="Card image cap">
          <div class="card-body">
  
            <h3 hidden><?=htmlentities($eventHome->id)?></h3>
            <h3><?=htmlentities($eventHome->title)?></h3>
            <h5 class="card-title"><?=htmlentities($eventHome->date)?></h5>
            <p class="card-text"><?=htmlentities($eventHome->description)?></p>
            <a href="/controllers/homeCtrl.php?id=<?=($eventHome->id)?>" class="btn btn-danger">Inscription</a>
          </div>
        </div>
      </div>
      <!--/col-md-6 -->
    </div>
    
    <!--/row-->
  </div>