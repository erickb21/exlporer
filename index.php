<?php
$base_url = "./";
if (isset($_GET['dossier'])) {
    $base_url = $base_url.$_GET['dossier'];
}
$dirs = array_diff(scandir($base_url), array('.','.git','.explorateur_php','.index.php'));

?><!-- scandir — Liste les fichiers et dossiers dans un dossier // Ici on supprime le '.' qui représente le dossier présent -->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="explorateur.css" type="text/css" />
    <title>Explorateur</title>
</head>
<body>
    <div class="dispflex width100prc heigh100prc border2pxsolidblack">
        <!--style="background-color:#ff6a00;"-->
        <div class="heigh100prc width33prc border2pxsolidblack">
            <nav>
                <p class="">HTML/CSS</p>
                <ul>
                    <?php
                    $directory = '../../HTML-CSS/';
                    $it = new RecursiveDirectoryIterator($directory);
                    while($it->valid()) {
                        if (!$it->isDot()) {
                            if (is_dir($it->key())) {echo '<li data-parent="" data-path="'.$it ->key().'" onclick="exploreMyPath(this.dataset.path);">' . $it->getSubPathName() . "\n</li>";}
                        }
                        $it->next();
                    }
                    ?>
                </ul>

                <p class="">JAVASCRIPT</p>
                <ul>
                    <?php
                    $directory = '../../JAVASCRIPT/';
                    $it = new RecursiveDirectoryIterator($directory);
                    while($it->valid()) {
                        if (!$it->isDot()) {
                            if (is_dir($it->key())) {echo '<li data-path="'.$it ->key().'" onclick="exploreMyPath(this.dataset.path);">' . $it->getSubPathName() . "\n</li>";}
                        }
                        $it->next();
                    }
                    ?>
                </ul>
                <p class="">PHP</p>
                <ul>
                    <?php
                    $directory = '../../PHP/';
                    $it = new RecursiveDirectoryIterator($directory);
                    while($it->valid()) {
                        if (!$it->isDot()) {
                            if (is_dir($it->key())) {echo '<li data-path="'.$it ->key().'" onclick="exploreMyPath(this.dataset.path);">' . $it->getSubPathName() . "\n</li>";}
                        }
                        $it->next();
                    }
                    ?>
                </ul>
            </nav>
        </div>
        <div id="listDirectories" class="heigh100prc border2pxsolidblack width66prc">
            <?php
                    //header('Content-type: text/plain');

                    //$dir_iterator = new RecursiveDirectoryIterator(dirname(__FILE__));
                    //$iterator = new RecursiveIteratorIterator($dir_iterator);
                    //foreach ($iterator as $file) {
                    //    echo $file."\n";
                    //}
            ?>

            <?php
            //$directory = '../';

            //$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

            //while($it->valid()) {

            //    if (!$it->isDot()) {
            //        echo '<p>SubPathName: ' . $it->getSubPathName() . "\n</p>";
            //        echo '<p>SubPath:	 ' . $it->getSubPath() . "\n</p>";
            //        echo '<p>Key:		 ' . $it->key() . "\n\n</p>";
            //    }

            //    $it->next();
            //}
            //************
            //$directory = '../';

            //$it = new RecursiveDirectoryIterator($directory);

            //while($it->valid()) {

            //    if (!$it->isDot()) {

            //        //echo '<p>SubPathName: ' . $it->getSubPathName() . "\n</p>";
            //        if (is_dir($it->key())) {echo '<p>SubPathName: ' . $it->getSubPathName() . "\n</p>";}
            //        //echo '<p>SubPath:	 ' . $it->getSubPath() . "\n</p>";
            //        //echo '<p>Key:		 ' . $it->key() . "\n\n</p>";
            //    }

            //    $it->next();
            //}
            //***************
            ?>
            <!--if (is_dir($dir . $file) && $file != '.' && $file != '..' )-->
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

    <script type="text/javascript" src="js/script.js"></script>

</body>
</html>