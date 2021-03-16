<div class="container-user">
        <div class="col-12 col-lg-auto mb-3">
<form action="" method="GET">
  <h2>Recherche d'utilisateurs</h2>
  <input type="text" style="width:200px;" name="s" id="s" value="<?=$s?>">
  <input type="submit" value="Rechercher" class="btn btn-danger" style="width: 300px;">

</form>

<h3 class="text-center" style="margin-top: 50px;">Liste d'utilisateurs</h3>
<table class="table text-center">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Pseudo</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

    <?php 
    $i=0;
    foreach($allUsers as $user) {
        $i++;
        ?>
        <tr>
        <th scope="row"><?=htmlentities($user->id)?></th>
        <td><?=htmlentities($user->pseudo)?></td>
        <td><?=htmlentities($user->email)?></td>
        <td>
          <a href="/controllers/display-usersCtrl.php?id=<?=htmlentities($user->id)?>"><i class="far fa-edit"></i></a>
          <a href="/controllers/delete-usersCtrl.php?id=<?=htmlentities($user->id)?>"><i class="fas fa-folder-minus"></i></a>
          <a href="/controllers/delete-usersCtrl.php?id=<?=htmlentities($user->id)?>"><i class="fas fa-trash-alt"></i></a>
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
