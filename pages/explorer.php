
<?php
header('Content-type: text/html; charset=utf8');


if  (isset ($_POST['maselection'] ))
{
    $myPath = str_replace('\\','/',$_POST['maselection']).'/';

    echo 'PATH : '.$myPath;




    returnFiles($myPath);
}
else {echo 'Error';}

function returnFiles($pathFiles)
{
    //$pathFiles = '../';
    //$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($pathFiles));
    $it = new RecursiveDirectoryIterator($pathFiles);
    $toto=$it->key();
    echo '<p>chemin : '.strrpos($toto,"/").'<p>';
    echo '<p>parent v<7.0 : '.left($toto,strrpos($toto,"/")).'<p>';
    //echo '<p>parent v>7.0: ' .dirname($toto).'</p>';
    $toto2=left($toto,strrpos($toto,"/"));
    echo '<p onclick="exploreMyFolder(\'' .$toto2.'\');">retour</p>';

    while($it->valid()) {

        if (!$it->isDot()) {

            //echo '<p>SubPathName: ' . $it->getSubPathName() . "\n</p>";
            if (is_dir($it->key())) {echo '<p class="directp>ory" data-path="'.$it ->key().'" onclick="exploreMyFolder(this.dataset.path);">dossier : ' . $it->getSubPathName() . "\n</p>";}
            else {echo '<p class="file">fichier : ' . $it->getSubPathName() . "\n</p>";}

            //echo '<p>SubPath:	 ' . $it->getSubPath() . "\n</p>";
            //echo '<p>Key:		 ' . $it->key() . "\n\n</p>";
        }
        $it->next();
    }

}

function left($str, $length) {
    return substr($str, 0, $length);
}

function right($str, $length) {
    return substr($str, -$length);
}


?>
<!--if (is_dir($dir . $file) && $file != '.' && $file != '..' )-->