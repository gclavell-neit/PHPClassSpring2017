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
                    <span><?php echo $fileInfo->getFilename(); ?></span> <a href='./readOne.php?file=<?php echo $fileInfo->getFilename()?>'>View</a> <a href='./delete.php?file=<?php echo $fileInfo->getFilename()?>'>Delete</a>
                </li>
                </h2>
            <?php endif; ?>
        <?php endforeach; ?>
        </ol>
        </form>
        <a href="index.php">Upload Page</a>
        

    </body>
</html>
