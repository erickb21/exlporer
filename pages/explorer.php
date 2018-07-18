
<?php
header('Content-type: text/html; charset=utf8');


if  (isset ($_POST['maselection'] ))
{
    $myPath = str_replace('\\','/',$_POST['maselection']).'/';
sleep(3);
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
        echo '<div class="adressbar"><div class="back" onclick="exploreMyFolder(\'' .$toto2.'\');"></div><div class="path">PATH:=>'.realpath($pathFiles) .'\\</div></div>';

echo '<div class="repandfile">';
    while($it->valid()) {
        if (!$it->isDot()) {
            //echo '<p>SubPathName: ' . $it->getSubPathName() . "\n</p>";
            if (is_dir($it->key())) {echo '<div class="txtaligncenter marginall"><div class="directory" data-path="'.$it ->key().'" onclick="exploreMyFolder(this.dataset.path);"></div><p>'. $it->getSubPathName().'</p></div>'  ;}
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
                    
                     $classFilename = "txtaligncenter marginall";
                     $exindex = explode(".",$it->getSubPathName());
                     $indexlink = array("","");

                     if ($exindex[0]=="index") {
                        $maClass .= ' execindex ';
                        $classFilename .=  ' txtbold ';
                        $indexlink = array('<a href="/mesprojets/'. $pathFiles .$it->getSubPathName().'" target="_blank">','</a>');
                        //$indexlink = array('<a href="'. $it->getSubPath() .'" target="_blank">','</a>');
                        }
                     



                echo '<div class="'.$classFilename .'">'.$indexlink[0].'<div data-typefile=' .$extention .' class="file '. $maClass .'"></div><p>' . $it->getSubPathName() .'</p>'.$indexlink[1];'</div>';
            }
            //echo '<p>SubPath:	 ' . $it->getSubPath() . "\n</p>";
            //echo '<p>Key:		 ' . $it->key() . "\n\n</p>";
        }
        $it->next();
    }
    echo '</div>';
}

function left($str, $length) {
    return substr($str, 0, $length);
}

function right($str, $length) {
    return substr($str, -$length);
}


?>
<!--if (is_dir($dir . $file) && $file != '.' && $file != '..' )-->
