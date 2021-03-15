<?php
/* control the interaction of users in register View  */
session_start();
class ControlRegister{
    private $name, $username, $age,
            $address, $password, $email;
    private $errorMsg;
    public function __construct($name, $username, $age,
                                $address, $password, $email){
        $this->name = $name;                    
        $this->username = $username;
        $this->age = $age;
        $this->address = $address;
        $this->password = $password;
        $this->email = $email;
    }
    //process user register
    public function processRegister(){
        $name = $this->name;
        $username = $this->username;
        $age = $this->age;
        $address = $this->address;
        $password =$this->password;
        $email = $this->email;
        $response = $this->validateRegister($name, $username, $age, 
                                            $address, $password, $email);
        // If user data is valid then register the user  
        if(gettype($response) === 'boolean' && $response){
            $response = $this->registerUser($name, $username, $age, 
                                    $address, $password, $email);
            return $response;
        }
        return $response;
    }
    //register the user by sending to Models
    private function registerUser($name, $username, $age, 
                                $address, $password, $email){

        require_once(dirname(__DIR__).'/Model/Model1.php');
        $model1 = new Model1();
        $response = $model1->setUserInfo($name, $username, $age, 
                                $address, $password, $email);
        //Once user gets registered then insert into other DBs
        if($response === true){
            
            include_once(dirname(__DIR__).'/Model/Model2.php');
            $model2 = new Model2();
            $response = $model2->setUserInfo($username, $password, $email);

            if($response === true){
                include_once(dirname(__DIR__).'/Model/Model3.php');
                $model3 = new Model3();
                $response = $model3->setUserInfo($username, $age, $address);

                if($response === true){
                    $_SESSION['registered'] = true;
                    return $response;
                    
                }else
                    return $response;
            }else
                return $response;
        }else
            return $response;

    }
    //validate user register inputs
    private function validateRegister($name, $username, $age, 
                                    $address, $password, $email){
        require_once(dirname(__DIR__).'/Shared/Validation.php');
        $validate = new Validation;
        return $validate->checkRegister($name, $username, $age, 
                                    $address, $password, $email);
    }
}