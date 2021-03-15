<?php
/** 
* Functions for server side validation of users inputs
* Simple validations
* @author Sung
* @version 12August 2019
*/

class Validation
{
    /**
    * chekc the login form's inputs whether valid
    * @param string $username the username field
    * @param string $password the password field
    * @return boolean true if no errors else false with error messages
    */
    public static function checkLogin($username, $password){
        if(!empty($username && $password)){
            if(self::checkUserName($username) && self::checkPassword($password))
                return true;
            else{
                $errors = array();
                array_push($errors,false);
               if(!self::checkUserName($username))
                    array_push($errors,'Invalid username: only 2 to 30 alphabet characters allowed');
               if(!self::checkPassword($password))
                    array_push($errors,'Invalid password: 6-20 charcters and at least 1 lower and'.
                                        'uppercase letter and 1 number and 1 of ~ ! # $');
                return $errors;
            }
        }else
            return array(false,"Please Fill In All Fields");
    }
    /**
    * check the register form's inputs whether valid
    * @param string $name the name field
    * @param string $username the username field
    * @param int $age the age field 
    * @param string $address the address field
    * @param string $password the password field
    * @param string $email the email field
    * @return boolean true if no errors else false with error messages
    */
    public static function checkRegister($name, $username, $age, 
                                        $address, $password, $email){
        if(!empty($name && $username && $age && 
            $address && $password && $email)){

            if(self::checkName($name) && self::checkUserName($username) &&
                self::checkAge($age) && self::checkAddress($address)&&
                self::checkPassword($password) && self::checkEmail($email))
                return true;
            else{
                $errors = array();
                array_push($errors,false);
                if(!self::checkName($name))
                    array_push($errors,'Invalid name: only 2 to 30 alphabet characters allowed');
                if(!self::checkUserName($username))
                    array_push($errors,'Invalid username: only 2 to 30 alphabet characters allowed');
                if(!self::checkEmail($email))
                    array_push($errors,'Invalid email: please put in a valid email address
                                        (max 320 characters allowed); ie: abc@gmail.com');
                if(!self::checkAge($age))
                    array_push($errors,'Invalid age: give a valid age; 1 - 200');
                if(!self::checkAddress($address))
                    array_push($errors,'Invalid address: give a valid address; between 3 - 30 characters');
                if(!self::checkPassword($password))
                    array_push($errors,'Invalid password: 6-20 charcters and at least 1 lower and
                                        uppercase letter and 1 number and 1 of ~ ! # $');
                return $errors;
            }
        }else
            return array(false,"Please Fill In All Fields");
        
    }
    /**
    * check if name given is between 2 - 30 alphabet letters
    * @param string $name name that given
    * @return boolean true if matched, else false
    */
    public static function checkName($username){
        if(preg_match("#^[\ a-zA-Z]{2,30}#",$username, $matches))
            return true;
        return false;
    }
    /**
    * check if username given is between 2 - 30 alphabet letters
    * @param  string $name name that given
    * @return boolean true if matched, else false
    */
    public static function checkUserName($username){
       return self::checkName($username);
    }
    /**
    * check the email address
    * @param string $email email given 
    * @return boolean true if it matches; else false
    */
    public static function checkEmail($email){
        if(preg_match(
            "#^(?!.*\.{3})(((?!\.)(?!.*\.@)([a-zA-Z0-9!\#$%`*+\-=?^_'{|}~;,.]){1,64})".
			"@((?!\.)(?!.*\.$)([a-zA-Z0-9-.]){1,255}))$#",$email, $matches))
            return true;
        return false;
    }
    /**
    * Check wther the age given is between 1 to 200
    * @param int age the numerical age number
    * @return boolean true if age is not between the range;
    * otherwise return false
    */
    public static function checkAge($age){
        return (1 <= $age && $age <= 200);
    }
    /**
    * Check address given
    * @param {string} address the given address
    * @return {boolean}
    */
    public static function checkAddress($address){
        if(preg_match("#^[\ a-zA-Z0-9\s,.'-]{3,30}#",$address, $matches))
            return true;
        return false;
    }
    /**
    * check the password given
    * @param string $password the password given 
    * @return boolean true if it matches 6 to 20 alphabet charcters &
    * at least 1 lowercase and uppercase letter, 1 number and
    * 1 of ~ ! # $
    * otherwise, return false
    */
    public static function checkPassword($password){
        if(preg_match("#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!\#$])[A-Za-z\d~!\#$]{6,20}$#",$password, $matches))
            return true;
        return false;
    }
}
