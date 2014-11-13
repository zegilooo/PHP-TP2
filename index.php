<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Mini-Projet Boutique en ligne</title>
<link href="supportPHP2.css" rel="stylesheet" type="text/css">
<script type="text/javascript" language="JavaScript">
	function transferRight(element){
        document.getElementById('galerie').appendChild(element);
	}
    function submitter(){
        var galerie = document.getElementById('galerie');
        for (var i=0; i<galerie.options.length; i++) {
            galerie.options[i].selected = true;
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
  <form id="form1" name="form1" action="#" method="post" onsubmit="submitter();">
    <br />
    <label for="nom_galerie"> Nom de la galerie </label><input type="text" name="nom_galerie" id="nom_galerie" style="width:400px" />
    <br /><br />
  	<select id="contenuDossier" style="width:300px;height: 600px" name="siteMembers-selection" multiple="multiple" size="10">
        <?php foreach ($fichiers as $fichier){?>
            <option value="<?php echo $fichier; ?>"
                    ondblclick="transferRight(this)"
                    style="
                        padding:50px 50px;
                        background-image:url(photos/<?php echo $fichier; ?>);
                        background-repeat: no-repeat;
                        background-size: 150px;
                        "><?php echo $fichier; ?></option>
        <?php }?>
	 </select>
	 <select id="galerie" style="width:300px;height: 600px" name="galerie[]" multiple="multiple" size="10">
	 </select>
     <br />
     <input name="submit" type="submit" value="Envoyer" id="submit">
     <input name="soumis" type="hidden" value="1">
    </form>
</div>
</body>
</html>
