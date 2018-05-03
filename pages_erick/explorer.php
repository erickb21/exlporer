
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
    echo 'parent : ' .dirname($toto);
    echo '<p onclick="exploreMyFolder(\'' .dirname($toto,2).'\');">retour</p>';

    while($it->valid()) {

        if (!$it->isDot()) {

            //echo '<p>SubPathName: ' . $it->getSubPathName() . "\n</p>";
            if (is_dir($it->key())) {echo '<p class="directory" data-path="'.$it ->key().'" onclick="exploreMyFolder(this.dataset.path);">dossier : ' . $it->getSubPathName() . "\n</p>";}
            else {echo '<p class="file">fichier : ' . $it->getSubPathName() . "\n</p>";}

            //echo '<p>SubPath:	 ' . $it->getSubPath() . "\n</p>";
            //echo '<p>Key:		 ' . $it->key() . "\n\n</p>";
        }
        $it->next();
    }

}

?>
<!--if (is_dir($dir . $file) && $file != '.' && $file != '..' )-->
