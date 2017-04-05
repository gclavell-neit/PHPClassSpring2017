<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once './autoload.php';
            
            $testErrorMessage = new ErrorMessage();
            $testErrorMessage->addMessage("test1","Testing error message 1");
            $testErrorMessage->addMessage("test2","Testing error message 2");
            $testErrorMessage->addMessage("test3","Testing error message 3");
            
            $testErrorMessage->removeMessages('test2');
            
            var_dump('</br>Testing Error Messages: ',$testErrorMessage->getAllMessages());
            
            $testMessage = new Message();
            $testMessage->addMessage("test1","Testing error message 1");
            $testMessage->addMessage("test2","Testing error message 2");
            $testMessage->addMessage("test3","Testing error message 3");
            
            $testMessage->removeMessages('test3');
            
            var_dump('</br>Testing Messages: ',$testErrorMessage->getAllMessages());
            
            $testSuccessMessage = new Message();
            $testSuccessMessage->addMessage("test1","Testing error message 1");
            $testSuccessMessage->addMessage("test2","Testing error message 2");
            $testSuccessMessage->addMessage("test3","Testing error message 3");
            
            $testSuccessMessage->removeMessages('test1');
            
            var_dump('</br>Testing Success Messages: ',$testErrorMessage->getAllMessages());
        ?>
    </body>
</html>
