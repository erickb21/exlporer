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
                <a href="index_explo.php?dossier=balise" class="balises" name="baliz" value="balise" id="balise">BALISE</a><br>     
                <a href="index_explo.php?dossier=bootstrap" value="bootstrap" value="bootstrap" id="bootstrap">BOOTSRAP</a><br>
                <a href="index_explo.php?dossier=template" value="template" value="template" id="template">TEMPLATE</a><br>    
                       
            </ul>
        <p class="d-flex justify-content-center w100ps">JAVASCRIPT</p>
            
            <ul>
                <a href="index_explo.php?dossier=plusoumoins" value="plusoumoins" id="plusoumoins">PLUS OU MOINS</a><br>
                <a href="index_explo.php?dossier=spaceinvaders" value="spaceinvaders" id="spaceinvaders">SPACE INVADERS</a><br>                                                            

            </ul> 
        <p class="d-flex justify-content-center w100ps">PHP</p>            
            <ul>
            <a href="index_explo.php?dossier=formulaire" value="formulaire" id="formulaire">FORMULAIRE</a><br>
            <a href="index_explo.php?dossier=table" value="table" id="table">TABLE</a><br>            
                  
            </ul>    
            
        </nav>
    </div>
    
    <div class="d-flex flex-wrap pb w100ps droit">
        <?php

        $dir = "./";

        if(isset($_GET['dossier'])){
            $dir = htmlspecialchars($_GET['dossier']);
        }

        //  si le dossier pointe existe
        if (is_dir($dir)) {
            
        // si il contient quelque chose
        if ($verif_folder = opendir($dir)) {
            echo $dir;
            // boucler tant que quelque chose est trouve
            while (($folder = readdir($verif_folder)) !== false) 
            {
                
                    $domaine = strstr($folder, '.');

                    $file2 = '.html';
                    $file3 = '.jpg';
                    $file4 = '.mp3';
                    $file5 = '.css';
                    $file6 = '.php';
                    $file7 = '.zip';
                    $file8 = '.js';
                    

                        if($file2 == $domaine)
                        {
                            
                        echo  '<img src="img2/html.jpg" style="height:50px;" border="0" />';
                        echo 'fichier html<br>'.$folder;
                        }

                        if($file3 == $domaine)
                        {
                        echo  '<img src="img2/jpg.jpg" style="height:50px;" border="0" />';
                        echo 'fichier jpg<br>'.$folder;
                        }

                        if($file4 == $domaine)
                        {
                        echo  '<img src="img2/mp3.jpg" style="height:50px;" border="0" />';
                        echo 'fichier mp3<br>'.$folder;
                        }

                        if($file5 == $domaine)
                        {
                        echo  '<img src="img2/css.png" style="height:50px;" border="0" />';
                        echo 'fichier css<br>'.$folder;
                        }

                        if($file6 == $domaine)
                        {
                        echo  '<img src="img2/php.jpg" style="height:50px;" border="0" />';
                        echo 'fichier php<br>'.$folder;
                        }
                        if($file7 == $domaine)
                        {                        
                        echo  '<img src="img2/zip.png" style="height:50px;" border="0" />';
                        echo 'fichier zip<br>'.$folder;
                        }
                        if($file8 == $domaine)
                        {                        
                        echo  '<img src="img2/js.png" style="height:50px;" border="0" />';
                        echo 'fichier js<br>'.$folder;
                        }

                        if(is_dir($folder))
                        {
                        echo  '<img src="img2/i.png" style="height:50px;" border="0" />';
                        echo 'dossier<br>'.$folder.'<br>';

                        if($folder == "..")
                            {
                            echo '<a href="index_explo.php?dossier=./" style="color: chartreuse; font-size: 50px;" name="baliz" value="balise" id="balise"></a><br>';
                            }
                        if($folder == is_dir($folder) )
                            {
                            echo '<a href="index_explo.php?dossier='.$folder.'" style="color: chartreuse; font-size: 50px;" name="baliz" value="balise" id="balise">'.$folder.'</a><br>';
                            }
                  
                        }
            }
                        closedir($verif_folder);
        }
    }
        ?>
        <div id="test"></div>
        <div id="test2"></div>
        
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    

</body>
</html>