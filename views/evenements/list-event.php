<!-- Affichage d'un message d'erreur personnalisé -->
<?php 
if(!empty($msgCode) || $msgCode = trim(filter_input(INPUT_GET, 'msgCode', FILTER_SANITIZE_STRING))) {
    if(!array_key_exists($msgCode, $displayMsg)){
        $msgCode = 0;
    }
    echo '<div class="alert '.$displayMsg[$msgCode]['type'].'">'.$displayMsg[$msgCode]['msg'].'</div>';
} ?>
<!-- -------------------------------------------- -->
<div class="container-event">
        <div class="col-12 col-lg-auto mb-3">
<form action="" method="GET">
  <h2>Recherche d'events</h2>
  <input type="text" style="width:200px;" name="s" id="s" value="<?=$s?>">
  <input type="submit" value="Rechercher" class="btn btn-danger" style="width: 300px;">

</form>

<h3 class="text-center" style="margin-top: 50px;">Liste d'events</h3>
<table class="table text-center">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">Date</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $i=0;
    foreach($allEvent as $event) {
      if($event)
        $i++;
        ?>
        <tr class="<?= $backgroundUser ?>">
        <th scope="row"><?=htmlentities($event->id)?></th>
        <td><?=htmlentities($event->title)?></td>
        <td><?=htmlentities($event->date)?></td>
        <td><?=htmlentities($event->description)?></td>
        <td>
          <a href="/controllers/display-eventsCtrl.php?id=<?=htmlentities($event->id)?>"><i class="far fa-edit"></i></a>
          <a href="/controllers/delete-eventsCtrl.php?id=<?=htmlentities($event->id)?>"><i class="fas fa-trash-alt"></i></a>
        </td>
        </tr>
    <?php } ?>
    
  </tbody>
</table>

<nav class="text-center" aria-label="...">
  <ul class="pagination pagination-sm">
    

      <?php
      for($i=1;$i<=$nbPages;$i++){
        if($i==$currentPage){ ?>    
          <li class="page-item active" aria-current="page">
            <span class="page-link">
              <?=$i?> 
              <span class="visually-hidden "></span>
            </span>
          </li>
    <?php } else { ?>
      <li class="page-item"><a class="page-link" href="?currentPage=<?=$i?>&s=<?=$s?>"><?=$i?></a></li>
    <?php } 
    }?>
  </ul>
</nav>
    </div>
</div>