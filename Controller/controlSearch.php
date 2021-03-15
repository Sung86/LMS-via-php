<?php

session_start();
/* control the interaction of users in search View  */

class ControlSearch{

    private $publisher, $author, $book,
            $genre, $year; 

    public function __construct($publisher, $author, $book,
                                $genre, $year){
        $this->publisher = $publisher;                    
        $this->author = $author;
        $this->book = $book;
        $this->genre = $genre;
        $this->year = $year;
    }
    //process the user search
    public function processSearch(){
        $publisher = $this->publisher;
        $author = $this->author;             
        $book = $this->book;
        $genre = $this->genre;
        $year = $this->year;
       
        if(!empty($year)){
            switch ($year) {
                case "1950 - 1970":
                    include_once(dirname(__DIR__).'/Model/Model1.php');
                    $model1 = new Model1();
                    $response = $model1->getBook($author, $book);
                    break;
                case "1970 - 1990":
                    include_once(dirname(__DIR__).'/Model/Model2.php');
                    $model2 = new Model2();
                    $response = $model2->getBook($author, $book, $publisher, $genre);
                    break;
                case "1990 - 2019":
                    include_once(dirname(__DIR__).'/Model/Model3.php');
                    $model3 = new Model3();
                    $response = $model3->getBook($author, $book, $publisher, $genre);
                    break;
            }
        }
        return $this->processSearchResult($response);
    }

    /**
    * process the result of search
    * @param string,array $data the detail of book searched, or error message
    * @return string list of books or error message in html tag
    */
    private function processSearchResult($data){
        if(is_array($data))
            return $this->processBook($data, $data[0]);
        else
            return  '<div id ="search-result">
                        <font color="red" size="20pt">
                            <b>'.$data .'</b>
                        </font>
                    </div>';
    }
    /**
    * To process the book searched into vertical layout 
    * @param array $data the detail of book searched
    * @param string $db the datebase user selected or searched
    * @return string list books in html tag 
    */
    private function processBook($data, $db){
        $keys = array('Image Link', 'Book Name', 'Author','Publisher','Genre', 'Online Link');
        if($db === 'DB1')
            $step = 3;
        else if($db === 'DB2')
            $step = 5;
        else if($db === 'DB3')
            $step = 6; 
        $string = '<div id = "search-result" class="bookTable">';
        for ($i = 1; $i < sizeof($data); $i+= $step) {
            $attrName = 'Image-'.str_replace(' ','-',$data[$i + 1]);
                $string .= '<img src="'.$data[$i].'" alt="'.$attrName.
                                        '" style="border: 1px solid black"/><br>
                        <b>'.$keys[1].': </b>'.$data[$i+1].'<br>
                        <b>'.$keys[2].': </b>'.$data[$i + 2].'<br>';
            if($db === 'DB1')
                $string .= '<br>';

            else if($db === 'DB2' || $db === 'DB3'){
                $string .= '<b>'.$keys[3].': </b>'.$data[$i + 3].'<br>
                            <b>'.$keys[4].': </b>'.$data[$i+4].'<br>';
                if($db === 'DB2')
                    $string .= '<br>';
                else if($db === 'DB3')
                        $string .= '<b>'.$keys[5].': </b>'.
                                    '<a href="'.$data[$i + 5].'" target="_blank">
                                        '.$data[$i + 5].
                                    '</a><br><br>';
            }
        }
        $string .= '</div>';
        return $string;
    }
}