<?php
/**
* Model1 manages DB1
* DB1 holds:
*   * the book published in years 1950 - 1970
*   * information of user registration
*/
class Model1{
    public function __construct(){

    }
    /**
    * check whether user exists in database
    * @param string $query mysqli query 
    * @return boolean false if user exists in database
    * else return true
    */ 
    public function verifyUserAcc($query){
        if(!$mysqli)
            include('db_conn.php');
        mysqli_select_db($mysqli,"DB1");
        $result = mysqli_query($mysqli, $query);
        if(mysqli_num_rows($result) >0)
            $response = false;
        else
            $response = true;
        mysqli_free_result($result);
        mysqli_close($mysqli);

        return $response;
    }
    /**
    * set user register information into database
    * @param string $name the name field 
    * @param string $username the username field
    * @param int $age the age field
    * @param string $address the address field
    * @param string $password the password field
    * @param string $email the email field
    * @return boolean true if user is inserted else false, 
    * else if user is exists then return message.
    */
    public function setUserInfo($name, $username, $age, 
                                    $address, $password, $email){
        if(!$mysqli)
            require_once('db_conn.php');
        mysqli_select_db($mysqli,"DB1");
        
        //before inserting, check whether user exists
        $query = "SELECT UserID, email FROM User WHERE BINARY email = '$email';";
        if($this->verifyUserAcc($query) === true){
            $query = "INSERT INTO User (name, username, age, 
                                        address, password, email)
                        VALUES ('$name','$username','$age',
                                '$address','$password','$email');";

            $result = mysqli_query($mysqli, $query);

            if(mysqli_affected_rows($mysqli))
                $response =  true;
            else
                $response = array(false, "Error: Contact administrator with the code M1");
        }
        else
            $response = array(false, "Account exists, go login.");
        
        mysqli_free_result($result);
        mysqli_close($mysqli);

        return $response;
    }
    /**
    * get all the books in the database
    * @return array,string return array contains
    * all books detail or error message
    */
    public function getAllBooks(){
        $query = "SELECT * FROM Book;";
        return $this->getBookDetail($query);
    }

    /**
    * get the information of the book queried 
    * @param string $query the mysqli query 
    * @return array,string return array contains 
    * books detail queried or error message
    */
    public function getBookDetail($query){
        if(!$mysqli)
            include('db_conn.php');
        mysqli_select_db($mysqli,"DB1");

        $result = mysqli_query($mysqli, $query);
        if(mysqli_num_rows($result)>0){
            $response = array('DB1');
            while($row = mysqli_fetch_assoc($result)){
                array_push($response, 
                            $row['imageLink'],
                            $row['bookName'],
                            $row['authorName']
                        );
            }
        }
        else
            $response = 'Result Not Found';
        
        mysqli_free_result($result);
        mysqli_close($mysqli);
        
        return $response;
    }
    /**
    * get book based on the $author and $book given
    * @param string $author the author name field
    * @param string $book the book name field
    * @return array,string return array contains 
    * books detail or error message based on 
    * given $author and $book
    */
    public function getBook($author, $book){
        if(empty($author) && empty($book))
            return $this->getAllBooks();
        else{
            $query ="SELECT * FROM Book
                WHERE MATCH (authorName, bookName)
                AGAINST ('+{$author}' '+{$book}'  WITH QUERY EXPANSION);";
            return $this->getBookDetail($query);
        }
    }
}