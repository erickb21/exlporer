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
    


    <div class="w100ps droit">

<?php
    $base_url = "./";
	if (isset($_GET['dossier'])) {
		$base_url = $base_url.$_GET['dossier'];
	}
	$dirs = array_diff(scandir($base_url), array('.')); ?> <!-- scandir — Liste les fichiers et dossiers dans un dossier // Ici on supprime le '.' qui représente le dossier présent -->


<?php foreach($dirs as $dir):?>
    <?php if (is_dir($base_url.$dir)){?> <!-- is_dir — Indique si le fichier est un dossier -->
        <?php if ($dir == "..") {?>
            <div>
                <a href="index.php"><?=$dir?></a><br>
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


</div>

</div>
    <script type="text/javascript" src="main.js"> </script>
</body>
</html>