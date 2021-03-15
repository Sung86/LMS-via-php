<?php
/**
* Model2 manages DB2 
* DB2 holds:
*   * the book published in years 1970 - 1990
*   * information of user login
*/
class Model2{
    public function __construct(){
        
    }
    /**
    * set user information based on $username, $password, and $emial given
    * @param string $username the username field
    * @param string $password the password field
    * @param string $email the email field
    * @return boolean true if user is set else false
    */
    public function setUserInfo($username, $password, $email){
        if(!$mysqli)
            require('db_conn.php');
        mysqli_select_db($mysqli,"DB2");
      
        $query = "INSERT INTO User (username, password, email)
                    VALUES ('$username','$password','$email');";
        $result = mysqli_query($mysqli, $query);
        
        if(mysqli_affected_rows($mysqli))
            $response = true;
        else
            $response = array(false, "Error: Contact administrator with the code M2");
        mysqli_free_result($result);
        mysqli_close($mysqli);
        return $response;
    }   
    /**
    * verify user informatin using $username, $password given
    * @param string $username the username field
    * @param string $password the password field
    * @return boolean true if user is selected else error message
    */
    public function verifyUserInfo($username, $password){
        if(!$mysqli)
            include('db_conn.php');
    
        mysqli_select_db($mysqli,"DB2");

        $query = "SELECT * FROM User
                    WHERE BINARY username='$username' AND
                            password='$password';";

        $result = mysqli_query($mysqli, $query);

        if(mysqli_num_rows($result) > 0)
            $response = true;
        else
            $response = array(false, "User account does not exist");

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
    * get the information of the book 
    * @param string $query the mysqli query 
    * @return array,string return array contains 
    * requested books detail or error message
    */
    public function getBookDetail($query){
        if(!$mysqli)
            include('db_conn.php');
        mysqli_select_db($mysqli,"DB2");
        $result = mysqli_query($mysqli, $query);

        if(mysqli_num_rows($result)>0){
            $response =  array('DB2');
            while($row = mysqli_fetch_assoc($result)){
                array_push($response, 
                            $row['imageLink'],
                            $row['bookName'],
                            $row['authorName'],
                            $row['publisherName'],
                            $row['bookGenre']
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
    * get book based on the given $author, $book, $publisher and $genre 
    * @param string $author the author name field
    * @param string $book the book name field
    * @param string $publisher the publisher name field
    * @param string $genre the book genre field
    * @return array,string return array contains 
    * books detail or error message based on 
    * given $author, $book, $publisher, and $genre
    */
    public function getBook($author, $book, $publisher, $genre){
        if(empty($author) && empty($book) && empty($publisher) && empty($genre))
            return $this->getAllBooks();
        else{
            $query ="SELECT * FROM Book
                    WHERE MATCH (authorName, bookName, publisherName, bookGenre)
                    AGAINST ('+{$author}' '+{$book}' '+{$publisher}' '+{$genre}'  WITH QUERY EXPANSION);";
            return $this->getBookDetail($query);
        }
    }
}
