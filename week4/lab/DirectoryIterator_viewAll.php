<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // http://php.net/manual/en/class.directoryiterator.php
        //DIRECTORY_SEPARATOR 

        $folder = './uploads';
        if ( !is_dir($folder) ) {
            die('Folder <strong>' . $folder . '</strong> does not exist' );
        }
        $directory = new DirectoryIterator($folder);
           
        ?>
        <form>
        <ol>
        <?php foreach ($directory as $fileInfo) : ?>        
            <?php if ( $fileInfo->isFile() ) : ?>
                <li>
                    <span><h2><?php echo $fileInfo->getFilename(); ?></h2></span> <input type="button" value = "View" onclick = "window.location.href='http://localhost/PHPClassSpring2017/week4/lab/readOne.php?file=<?php echo $fileInfo->getFilename()?>'"/><input type="button" value = "Delete" onclick = <?php echo unlink('uploads/'.$fileInfo->getFilename())?>"/>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
        </ol>
        </form>

    </body>
</html>
