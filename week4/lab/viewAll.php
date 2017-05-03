<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
        <h1>All files</h1>
        
        <form>
        <ol>
        <?php foreach ($directory as $fileInfo) : ?>        
            <?php if ( $fileInfo->isFile() ) : ?>
                <h2>
                <li>
                    <span><h3><?php echo $fileInfo->getFilename(); ?></h3><h4></span> <input type="button" value = "View" onclick = "window.location.href='http://localhost/PHPClassSpring2017/week4/lab/readOne.php?file=<?php echo $fileInfo->getFilename()?>'"/><input type="button" value = "Delete" onclick = "window.location.href='http://localhost/PHPClassSpring2017/week4/lab/delete.php?file=<?php echo $fileInfo->getFilename()?>'"/></h4>
                </li>
                </h2>
            <?php endif; ?>
        <?php endforeach; ?>
        </ol>
        </form>
        <a href="index.php">Upload Page</a>
        

    </body>
</html>
