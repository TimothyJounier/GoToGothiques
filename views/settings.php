<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <div class="container">
    <div><h1 class="mt-1 text-center">Votre Compte</h1></div>
  <div class="row flex-lg-nowrap">
    <div class="col-12 col-lg-auto mb-3"></div>
    <div class="col">
      <div class="row">
        <div class="col mb-3">
          <div class="card" style="background-color:#F8F9FA;">
            <div class="card-body">
              <div class="e-profile">
                <div class="row">
                  <div class="col-12 col-sm-auto mb-3">
                    <div class="mx-auto" style="width: 140px;">
                      <!-- <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);"> -->
                        <!-- <span style="color: rgb(166, 168, 170); font: Playfair Display, serif;">140x140</span> -->
                      </div>
                    </div>
                  </div>
                  <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                      <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">Bienvenue, <?=htmlentities($userSettings->pseudo)?></h4>
                      <div class="mt-2">
                        <!-- <button class="btn btn-danger" type="button">
                          <i class="fa fa-fw fa-camera"></i>
                          <span>Changer Photo</span> -->
                        </button>
                      </div>
                    </div>
                    <div class="text-center text-sm-right">
                    <span class="badge badge-danger">
                      <?php
                      if($userSettings->id_roles == 2){
                        echo 'Admin';
                      } else {
                        echo 'Membre';
                      }
                      
                      ?>
                    </span>
                      <div class="text-muted"><small>Inscription faite le <?=htmlentities($userSettings->created_at)?></small></div>
                    </div>
                  </div>
                </div>
                <div class="tab-content pt-3">
                  <div class="tab-pane active">
                    <form class="form" novalidate="">
                      <div class="row">
                        <div class="col">
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>Pseudo</label>
                                <input class="form-control" type="text" name="username" placeholder="<?=htmlentities($userSettings->pseudo)?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" placeholder="<?=htmlentities($userSettings->email)?>">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="mb-2"><b>Changement de Password</b></div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>Password Actuel</label>
                                <input class="form-control" type="password" placeholder="••••••">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                <label>Nouveau Password</label>
                                <input class="form-control" type="password" placeholder="••••••">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>Confirmation <span class="d-none d-xl-inline">Password</span></label>
                                <input class="form-control" type="password" placeholder="••••••"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col d-flex justify-content-end">
                          <button class="btn btn-danger" type="submit">Valider </button>
                        </div>
                        <div class="col d-flex justify-content-end">
                          <button class="btn btn-danger" type="submit">Supprimer</button>
                        </div>
                      </div>
                    </form>
  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>