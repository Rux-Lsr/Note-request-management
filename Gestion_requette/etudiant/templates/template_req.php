<form enctype="multipart/form-data" id="query_template">
<h4 id="titleUe">Choix de l'UE</h4><br>
    <div class="form-check d-flex col-md-12">
        <select class="form-select form-control-lg" id="selectlevel"  name="ue" required>
            <option selected disabled value="">UE</option>
            <option value='7'>ENG203</option>
            <option value='8'>FRAN203</option>
            <option value='1'>ICT201</option>
            <option value='2'>ICT203</option>
            <option value='3'>ICT205</option>
            <option value='4'>ICT207</option>
            <option value='5'>ICT213</option>
            <option value='9'>ICT215</option>
            <option value='6'>ICT217</option>                                    
        </select>
    </div>
        <div class="col-md-4"></div>
            
        <div class="col-md-4"></div>
    <hr>
    <h4>Template de la requette</h4>
    <div class="form-check">
        <label for="objet" class="text-secondary font-weight-bold col-form-label">Objet</label>
        <input type="text" class="form-control form-control-lg" id="objet" name="objet" value="" placeholder="Veuillez saisir votre Objet"  required>
            
    </div>
    <div class="form-check">
        <label for="libelle" class="text-secondary font-weight-bold col-form-label">Corps</label>
        <textarea class="form-control form-control-lg" id="req" name="libelle" rows="20" placeholder="Corps de la requête" required>
            Monsieur (ou Madame),



        J'ai l'honneur de venir très respectueusement auprès de votre haute bienveillance solliciter ...(à completer)



        En effet, je suis étudiant(e) en ICT4D Niveau 2, ...(à completer)





        Dans l'attente d'une suite favorable, veuillez agréer Monsieur(ou Madame), mes expressions les plus chaleureuses !                                
        </textarea>
            <div class="text-danger font-weight-bold"></div>
    </div>
    <div class="form-check">
        <label for="piece" class="text-secondary font-weight-bold col-form-label">Pièce Jointe</label>
        <input type="file" name="piece" class="file-upload-default" id="fichier" required style="display: none;">
        <div class="invalid-feedback">Choisir votre pièce jointe </div><br>
        <div class="input-group col-xs-12">
        <input type="text" class="form-control file-upload-info" name="piece" disabled placeholder="Choisissez votre pièce jointe en format PDF, DOC, DOCX, TXT, PNG ou JPG" id="fileName">
        <span class="input-group-append">
            <button class="btn btn-primary " id="parcourir">Parcourir...</button>
        </span>
        <script>
            let browseBtn = document.getElementById("parcourir");
            let file = document.querySelector("#fichier");
            

            browseBtn.addEventListener("click", function (){
                file.click();
                
            });
            file.addEventListener("change", function(e){
                document.getElementById("fileName").value = e.target.files[0].name;
                
            });
        </script>
        </div>
    </div>
    <br>
    <div class="col-md-12 d-flex">
        <div class="col-md-3"></div>
        <button type="submit" class="btn btn-primary col-md-6 " id ="query_submit" name="submit1">Envoyer</button>
    <div class="col-md-3"></div>  
</form>                           