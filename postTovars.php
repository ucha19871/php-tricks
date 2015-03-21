<?php

/*
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * This snippet is very helpful for every POST processing. All you need is an array with expected keys in the POST array.
 * This snippet automatically creates variables with the same name as the key in the POST array. If the key is not found in the POST array the variable is set to NULL.
 * Basically you don't need to write:
 * -----------
 * $username=$_POST["username"];
 * $age=$_POST["age"];
 * etc.
 * -----------
 * This snippet will do this boring part of every PHP code with POST handling so you can fully focus on a validation of the input,
 * because that is much more important.
 * * */
$_POST["username"] = 'ucha';
$_POST["age"] = 27;

//$expected = array('username','age','city','street');
function post2vars(array $expected){
    foreach ($expected as $key => $v) {
        //die(var_dump($expected));
        if(!empty($_POST[$key])){
            ${$key} = $_POST[$key];
        }else{
            ${$key} = NULL;
        }
    }
    return true;
}


post2vars($_POST);

if(isset($username)){
    echo "Variable exists!";
}else{
    echo "Variable does not exists!";
}















