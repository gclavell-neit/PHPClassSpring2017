<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author 001378362
 */
interface ISchool {
   function color();
   function size($sqFootage);
}

class NewSchool implements ISchool {
    
    public function color(){
        return "The color is: Blue";
    }
    
    public function size($footage){
        return "The size is: "+$footage;
    }
}

$newSchool = new NewSchool();
echo $newSchool->color();
echo $newSchool->size(65);
