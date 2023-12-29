<form enctype="multipart/form-data" action=""  method="post">
        <div class="col-md-4"></div>
    <hr>
    <h4>Template de la requette</h4>
    <div class="form-check">
        <label for="objet" class="text-secondary font-weight-bold col-form-label">Objet</label>
        <input type="text" class="form-control form-control-lg" id="objet" name="objet" value="<?=$rq['objet_Requette']?>" placeholder="objet de la requette"  disabled>
            
    </div>
    <div class="form-check">
        <label for="libelle" class="text-secondary font-weight-bold col-form-label">Corps</label>
        <textarea class="form-control form-control-lg" id="req" name="libelle" rows="10" placeholder="Corps de la requête" required disabled>
           <?=$rq['corps_Requette']?>                          
        </textarea>
            <div class="text-danger font-weight-bold"></div>
    </div>
    <div class="form-check">
        <label for="piece" class="text-secondary font-weight-bold col-form-label">Pièce Jointe</label>
        <div class="input-group col-xs-12">
        <span class="input-group-append">
            <a class="btn btn-primary " id="parcourir" href="<?=$rq['justificatif_Requette']?>" target="_blank">Visualiser la piece jointe</a>
        </span>
       </div>
    </div>
    <hr>
    <div class="form-check">
        <label for="piece" class="text-secondary font-weight-bold col-form-label">Decision</label>
        <br>
        <span class="input-group-append">
            <button type="submit" class="btn btn-success" name="submit1">Valider</button>
            <button  type = "button"class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#myModal">Rejeter</button>
        </span>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <label for="myTextarea">Justification du rejet :</label>
                <textarea id="myTextarea" class="form-control" rows="3" name="jtf" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-danger" name="rejetter">Rejetter</button>
            </div>
            </div>
        </div>
    </div>
</form>                           

