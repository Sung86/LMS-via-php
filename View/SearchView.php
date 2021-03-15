<?php
class SearchView{
    private $view;
    private $registerForm;

    public function __construct(){
        $this->registerForm = $this->searchForm();
        $this->view = $this->view();
    }
    //get the view that has been set
    public function getView(){
        return $this->view;
    }
    //the view in the SearchView
    private function view(){
        return  '<section>'
                    .$this->registerForm.
                '</section>';
    }
    /**
    * generate search form input fields
    * @param string $inputs the array of input fields of search form
    * @return string the structured input fields
    */
    private function generateInputs(){
        $string = '';
        $searchType = array('Publisher Name','Author Name', 
                            'Book Name', 'Genre', 'Year Published');
        
        foreach($searchType as $type){
            $attrName= 'search-'.strtolower(str_replace(' ','-',$type));
            $string .= '
                <tr><td>
                    <label for="'.$attrName.'">'.$type.': </label>
                </td></tr>
                ';
            if($type != 'Year Published')
                $string .= '
                    <tr><td>
                        <input
                            type="input"
                            name="'.$attrName.'"/>
                    </td></tr>
                    ';
            else
                $string .='
                    <tr><td>
                        <select 
                            name = '.$attrName.'
                            style="width:160%; 
                            text-align-last:center;
                            font-size:20px;
                            outline:none" required>

                            <option value="" selected>Select Year</option>
                            <option value="1950 - 1970">1950 - 1970</option>
                            <option value="1970 - 1990">1970 - 1990</option>
                            <option value="1990 - 2019">1990 - 2019</option>
                        </select>
                    <td><tr>
                    ';
        }
        return $string;
    }
    //the search form in the SearchView
    private function searchForm(){
        return '
        <form id="search-form" method="post">
        <table>
            <thead>
                <tr>
                    <th colspan="2"><h1>Search a Book</h1><th>
                <tr>
            </head>
            <tbody>
            '.$this->generateInputs().'
    
            <tr><td colspan="2">
            <input
                class="form-button"
                type="submit" 
                name="submit-search"
                value="Click to Search"/>
            </td></tr>
            </tbody>
            </table>
        </form>
        '.$this->scriptCode().
        $this->styleCode();
    }
    //the javascript code for the SearchView
    private function scriptCode(){
        return "
        <script>
        // On submit, wrap user data into serialise array 
        // and then send to controller to process
        $('#search-form').on('submit',function(e){
            e.preventDefault();
            $('#search-result').remove(); //remove result for each search
            var values  = $(this).serializeArray();
            $.post('Controller/Controller.php', { description: 'searchForm', data :JSON.stringify(values) },function(response){
                var data = JSON.parse(response);
                $('#search-form').append(data);
            });
        });
        </script>";
    }
    //the css code for styling the SearchView
    private function styleCode(){
        return '
        <style>
        .bookTable{
            float: right; 
            margin: 5% 10% 0 0;
            overflow: auto;
            max-height: 100vh;
            width:50%;
        }
        #search-form{
            float:left;
            margin-left:18%;
            margin-top:3%;
            width:90%;
        }
        #search-form table{
            float:left;
        }
        #search-form label{
            text-align: left;
            font-size:15pt;
        }
        #search-form input{
            text-align:center;
            border: 1px solid black;
            font-size:15pt;
            padding:10px;
            width:150%;
        }   
        .form-button{
            background-color:lightgreen;
            border-radius:20px;
            cursor:pointer;
            outline:none;
        }
        .form-button:hover{
            box-shadow: 0 2px black;
        }
        .form-button:active{
            background-color:#ccffcc;
            box-shadow: 2px 2px gray;
        }
    </style>';
    }
}