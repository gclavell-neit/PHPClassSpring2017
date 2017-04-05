<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            
            include './models/TestClass.php';
            
            $test = new TestClass('testing');
            
           
            
            echo $test->getTest();
            //this will fail and show an error becuase it's passing a boolean, prohibited by the setTest method
            $test->setTest(true);
            
             echo $test->getTest();
             
            
            //$test->
        
        ?>
    </body>
</html>
