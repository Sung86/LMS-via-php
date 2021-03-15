<?php
session_start();
/* control the interaction of users in Login View  */

class ControlLogin{
    private $username, $password;
    private $errorMsg;
    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
    }
    // process user login
    public function processLogin(){
        $username = $this->username;
        $password = $this->password;
        $response = $this->validateLogin($username, $password);
        if(gettype($response) == 'boolean' && $response === true){
            $response = $this->verifyUser($username, $password);
            if($response === true)
                $_SESSION['login'] = true;
        }
        return $response;
    }
    //verify user login identity 
    private function verifyUser($username, $password){
        require_once(dirname(__DIR__).'/Model/Model2.php');
        $model2 = new Model2();
        return $response = $model2->verifyUserInfo($username, $password);
    }
    //validate user login inputs
    private function validateLogin($username, $password){
        require_once(dirname(__DIR__).'/Shared/Validation.php');
        $validate = new Validation;
        return $validate->checkLogin($username, $password);
    }

}