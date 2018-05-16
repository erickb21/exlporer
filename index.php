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
    <div class="dispflex width100prc heigh100vh border2pxsolidblack">
        <!--style="background-color:#ff6a00;"-->
        <div class="heigh100vh width33prc padding_10pxall">
            <nav>
                <p class="categorie">HTML/CSS</p>
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

                <p class="categorie">JAVASCRIPT</p>
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
                <p class="categorie">PHP</p>
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
        <div id="listDirectories" class="heigh100vh dispflex dispflexdirection width67prc">
        
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

    <script type="text/javascript" src="js/script.js"></script>

</body>
</html>