<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Mini-Projet Boutique en ligne</title>
        <link href="supportPHP2.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            .imagettes{
                padding:50px 50px;
                background-repeat: no-repeat;
                background-size: 200px;
                color:white;
                text-shadow: 2px 2px 1px black;
            }
            .galeries{
                width:300px;
                height:600px;
                float:left;
            }
        </style>
        <script type="text/javascript" language="JavaScript">
            function transferRight(element){
                   document.getElementById('galerie').appendChild(element);
            }
            function submitter(){
                var okSubmit = true;
                var galerie = document.getElementById('galerie');
                for (var i=0; i<galerie.options.length; i++) {
                   galerie.options[i].selected = true;
                }
                if(document.getElementById('nom_galerie').value==''){
                    alert('Veuillez saisir un nom de galerie.');
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <div id="tout">
            <?php
                $fichiers= array();
                if($dossier = opendir("photos")){
                    while(false !== ($fichier = readdir($dossier))){
                        if($fichier != '.' && $fichier != '..' && $fichier != 'index.php'){
                            array_push($fichiers,$fichier);
                        }
                    }
                }
                //print_r($fichiers);
                if(isset($_POST['soumis']) && $_POST['soumis'])
                {
                    print_r($_POST["galerie"]);
                    print_r($_POST["nom_galerie"]);
                }
                ?> 
            <div class="enveloppe">
                <h1>Mini-projet Galerie</h1>
                <H2 align="center">Projet pour la remise à niveau, sans SQL</H2>
                <p>Les photos sont rangés dans un seul dossier appelées &quot;photos&quot;.</p>
                <p>Il s'agit de construire une application &quot;galeries&quot; permettant de parcourir ces photos par thèmes (une même photo pouvant appartenir à différents parcours ou galerie).</p>
                <p>Vous devez créer un outil sans sql, la liste des photos d'un thème ou d'une galerie sera stockée dans un tableau. Ce tableau pourra par exemple être  sérialisé pour être écrit dans un fichier (un fichier = une galerie ?)</p>
                <p>Dans ce  tableau on fera figurer aussi  un titre de galerie, une date de création, une date de mise à jour.</p>
                <p>Pour rassembler les noms des photos on pourra utiliser par exemple l'interface ci-dessous, mais tout autre solution (photos dragables) sera la bienvenue. </p>
                <p>Les galeries seront visitable par un carousel comme celui de Bootstrap, ou un full CSS comme dans le cours CSS.</p>
                <p>Un menu adapté permettra de choisir un thème puis une galerie.</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>
            <br /> 
            <form id="form1" name="form1" action="" method="post" onsubmit="submitter();">
                <label for="nom_galerie"> Nom de la galerie </label><input type="text" name="nom_galerie" id="nom_galerie" style="width:400px" />
                <br /><br />
                <select id="galerieList" class="galeries" size="5">
                    <option selected disabled>Liste des galeries</option>
                    <option value="newGallery">Nouvelle galerie</option>
                </select>
                <select id="contenuDossier" class="galeries" name="siteMembers-selection" multiple="multiple" size="10">
                    <option selected disabled>Liste des images</option>
                    <?php foreach ($fichiers as $fichier){?>
                    <option value="<?php echo $fichier; ?>"
                        ondblclick="transferRight(this)"
                        class="imagettes" style="background-image:url(photos/<?php echo $fichier; ?>);" selected><?php echo $fichier; ?></option>
                    <?php }?>
                </select>
                <select id="galerie" class="galeries" name="galerie[]" multiple="multiple" size="10">
                    <option selected disabled>Votre galerie</option>
                </select>
                <br /> 
                <div class="clearBoth"></div>
                <br />
                <input name="submit" type="submit" value="Envoyer" id="submit">
                <input name="soumis" type="hidden" value="1">
            </form>
        </div>
    </body>
</html>