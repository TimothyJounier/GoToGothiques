<div class="ctn-event container contact">
    <div class="row">
      <div class="col-md-3">
        <div class="contact-info">
          <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image-enveloppe"/>
          <h2>Création d'évènements</h2>
          <h4>Ajoutez un nom d'organisme, deux équipes, une adresse et une description de l'évènement</h4>
        </div>
      </div>
      <div class="col-md-9">
        <div class="contact-form">
          <div class="form-group">
            <label class="control-label col-sm-2" for="title">Titre</label>
            <div class="col-sm-10">   
            <form action="" method="POST">       
            <input type="text" class="form-control"  id="title" name="title" class="field <?= isset($errorsArray['name_error']) ? 'is-invalid' : ''?>" 
                pattern="[A-Za-z-éèêëàâäôöûüç' ]+" 
                title="Lettres majuscules et minuscules" 
                value="<?= $title ?? ''?>" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="date">Date & Heure</label>
            <div class="col-sm-10">
            <input type="datetime-local" class="form-control" id="date"  name="date" class="field <?= isset($errorsArray['mail_error']) ? 'is-invalid' : ''?> "
                title="Votre date n'est pas valide" 
                value="<?= $date ?? ''?>" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="description">Description</label>
            <div class="col-sm-10">
            <textarea class="form-control" rows="4" id="description" name="description"
                class="field"
                required 
                ><?= $description ?? ''?></textarea>
            </div>
          </div>
          <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-danger">Envoyer</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  