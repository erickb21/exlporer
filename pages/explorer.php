
<?php
header('Content-type: text/html; charset=utf8');


if  (isset ($_POST['maselection'] ))
{
    $myPath = str_replace('\\','/',$_POST['maselection']).'/';

    echo '<div class="path">PATH : '.$myPath .'</div>';




    returnFiles($myPath);
}
else {echo 'Error';}

function returnFiles($pathFiles)
{
    //$pathFiles = '../';
    //$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($pathFiles));
    $it = new RecursiveDirectoryIterator($pathFiles);
    $toto=$it->key();
    //echo '<p>chemin : '.strrpos($toto,"/").'<p>';
    //echo '<p>parent v<7.0 : '.left($toto,strrpos($toto,"/")).'<p>';
    //echo '<p>parent v>7.0: ' .dirname($toto).'</p>';
    $toto2=left($toto,strrpos($toto,"/"));
    echo '<div class="back" onclick="exploreMyFolder(\'' .$toto2.'\');"></div>';

    while($it->valid()) {
        if (!$it->isDot()) {
            //echo '<p>SubPathName: ' . $it->getSubPathName() . "\n</p>";
            if (is_dir($it->key())) {echo '<div class="directory" data-path="'.$it ->key().'" onclick="exploreMyFolder(this.dataset.path);"></div><p>'. $it->getSubPathName().'</p>'  ;}
            else {

                $extention=right($it->getSubPathName(),strlen($it->getSubPathName()) - strrpos($it->getSubPathName(),"."));

                switch ($extention):
                    case '.html':
                        $maClass="htm";
                        break;
                    case '.htm':
                        $maClass="htm";
                        break;
                    case '.jpg':
                        $maClass="jpg";
                        break;
                    case '.png':
                        $maClass="png";
                        break;
                    case '.psd':
                        $maClass="psd";
                        break;
                    case '.mp3':
                        $maClass="mp3";
                        break;
                    case '.js':
                        $maClass="js";
                        break;
                    case '.css':
                        $maClass="css";
                        break;
                    case '.xml':
                        $maClass="xml";
                        break;
                    case '.php':
                        $maClass="php";
                        break;
                        default:
                            $maClass="other";
                     endswitch;

                echo '<div data-typefile=' .$extention .' class="file '. $maClass .'"></div><p>' . $it->getSubPathName() . '</p>';
            }
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
