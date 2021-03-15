<?php
/**
* Model3 manages DB3
* DB3 holds:
*   * the book published in years 1990 - 2019
*   * basic and not extremely sensitive information of user
*/
class Model3{
    public function __construct(){
        
    }
    /**
    * set user register information into database
    * @param string $username the username field
    * @param int $age the age field
    * @param string $address the address field
    * @return boolean true if user is set else false
    */
    public function setUserInfo($username, $age, $address){
        if(!$mysqli)
            require('db_conn.php');
        mysqli_select_db($mysqli,"DB3");
                
        $query = "INSERT INTO User (username, age, address)
                VALUES ('$username','$age', '$address');";

        $result = mysqli_query($mysqli, $query);
        if(mysqli_affected_rows($mysqli))
            $response = true;
        else
            $response = array(false, "Error: Contact administrator with the code M3");
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
    */
    public function getBookDetail($query){
        if(!$mysqli)
            include('db_conn.php');
        mysqli_select_db($mysqli,"DB3");

        $result = mysqli_query($mysqli, $query);
        if(mysqli_num_rows($result)>0){
            $response = array('DB3');
            while($row = mysqli_fetch_assoc($result)){
                array_push($response, 
                            $row['imageLink'],
                            $row['bookName'],
                            $row['authorName'],
                            $row['publisherName'],
                            $row['bookGenre'],
                            $row['onlineLink']
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
    * @return array,string return array contains book detail 
    * or error message based on given $author, $book, $publisher and $genre
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