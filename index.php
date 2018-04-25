<?php
    $base_url = "./";
	if (isset($_GET['dossier'])) {
		$base_url = $base_url.$_GET['dossier'];
	}
    $dirs = array_diff(scandir($base_url), array('.','.git','.explorateur_php','.index.php')); 
    
    ?> <!-- scandir — Liste les fichiers et dossiers dans un dossier // Ici on supprime le '.' qui représente le dossier présent -->




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">    
    <link rel="stylesheet" href="explorateur.css">
    <title>Explorateur</title>
</head>
<body>
<div class="d-flex w100ps h100vh box">
    <div class=" h100p gauche">
        <nav>
        <p class="d-flex justify-content-center w100ps">HTML/CSS</p>            
            <ul>
                <li><a href="balise/index.html">BALISE</a></li>                    
                <li>BOOTSRAP</li>
                <li>TEMPLATE</li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <p class="d-flex justify-content-center w100ps">JAVASCRIPT</p>
            
            <ul>

                <li>PLUS OU MOINS</li>
                <li>SPACE INVADERS</li>                
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul> 
            <p class="d-flex justify-content-center w100ps">PHP</p>            
            <ul>
                <li>FORMULAIRE</li>
                <li>TABLE</li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>    
        </nav>
    </div>
    


   


    <div id="listDirectories">
       

        <?php foreach($dirs as $dir):?>
            <?php if (is_dir($base_url.$dir)){?> <!-- is_dir — Indique si le fichier est un dossier -->
                <?php if ($dir == "..") {?>
                    <div>
                        <a href="index.php?dossier=<?= htmlentities ($_GET['dossier'])?><?=$dir?>/"><?=$dir?></a><br>
                
                    </div>
                <?php } else {?>
                    <div>
                        <?php if (isset($_GET['dossier'])) {?>

                            <a href="index.php?dossier=<?=$_GET['dossier']?><?=$dir?>/"><?=$dir?></a><br>
                            
                        <?php } else {?>
                            <a href="index.php?dossier=<?=$dir?>/"><?=$dir?></a><br>
                        <?php }?>
                    </div>
                <?php }?>
            <?php } else {?>
                <div>
                    <p><?=$dir;?></p>
                </div>
            <?php }?>
        <?php endforeach;?>


         <?php 



?>
    </div>
</div>
 
<!-- <script>
    function ajax_get(url, callback) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            console.log('responseText:' + xmlhttp.responseText);
            try {
                var data = JSON.parse(xmlhttp.responseText);
            } catch (err) {
                console.log(err.message + " in " + xmlhttp.responseText);
                return;
            }
            callback(data);
        }
    };

    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

//on demande Ã  ajax d'aller chercher notre json
//on crÃ©er une fonction (data c'est notre tableau json)


var nbClic = 0;


function result(data) {

    console.log(path);
    //on crÃ©er une varable vide auquelle on ajoutera ce qu'on veut dans notre boucle
    var html = "";

    //on lance notre boucle de la longueur de notre tableau json
    for (var i = 0; i < data.length; i++) {
        //on crÃ©er une variable de fichier qui contient la valeur de notre data sur le moment "t"
        var file = data[i];
        //si ma valeur rÃ©cupÃ©rÃ©e juste au dessus est bien un dossier
        if (file.isDirectory) {
            //j'affiche le lien de mon dossier
            html += '<li class="li-explore"><a class="folder" data-path="' + file.name + '" href="#"><span class="img-folder"></span> ' + file.name + "/</a></li>";
            //sinon
        } else {
            //j'affiche le lien de mon fichier
            html += '<li class="li-explore"><a class="file" href="#" name="' + file.name + '"><span class="img-file"></span> ' + file.name + "</a></li>";
        }
    }

    //j'injecte mes "li" et mes "a" dans mon "ul" dÃ©jÃ  prÃ©sent dans mon html
    document.getElementById("listDirectories").innerHTML = html;

}


//je crÃ©er un tableau vide
var path = [];

//je crÃ©er un Ã©vÃ©nement au clic
document.querySelector('body').addEventListener('click', function (event) {

    //on dÃ©sactive les clics
    event.preventDefault();

    //je choppe les a
    if (event.target.tagName.toLowerCase() === 'a') {

        //on cible le a
        element = event.target;

        //sinon on choppe les img     
    } else {

        //on cible le img en ciblant l'Ã©lÃ©ment parent
        element = event.target.parentNode;
    }
    //je crÃ©er une variable qui stocke la classe de chacun de mes a
    var linkType = element.className;

    // si mon a est un dossier 
    if (linkType == "folder") {

        // alors je push le chemin du dossier dans mon tableau vide
        path.push(element.dataset.path);
        
        if (element.dataset.path == '..') {
            nbClic--;
        } else {
            nbClic++;
        }
        
        // je joins les diffÃ©rents Ã©lÃ©ments de mon tableau path
        // sÃ©parÃ©s par un / pour que le chemin fonctionne

        if (nbClic > 0) {

            ajax_get('"index.php?dossier=' + path.join('/'), result);

        } else {

            path = [];
            ajax_get('"index.php?dossier=', result);

        }

    }

});

//je lance la fonction
ajax_get('index.php', result);
</script> -->

</body>
</html>