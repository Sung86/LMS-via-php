<?php
/* The Main Controller */
include_once(dirname(__DIR__).'/View/LoginView.php');
include_once(dirname(__DIR__).'/View/RegisterView.php');
include_once(dirname(__DIR__).'/View/SearchView.php');

if(isset($_POST['description']) && isset($_POST['data'])){
    $description = $_POST['description'];
    $data = json_decode($_POST['data'],true);
    $controller = new Controller();
    $response = $controller->processData($description, $data);
    echo json_encode($response);
}
class Controller{
    private $loginView, $registerView, $searchView;
    private $view;
    public function __construct(){
        $this->loginView= new LoginView();
        $this->registerView= new RegisterView();
        $this->searchView= new SearchView();
        $this->view = $this->renderView();
    }
    //run the program
    public function execute(){
        return $this->view;
    }
    //provide the view by conditions
    private function renderView(){
        $switchView  = strtolower($_POST['switch-tab']);

        if($switchView !== 'logout' && $_SESSION['login'])
            $switchView = 'search';
        elseif($switchView  === 'register' && $_SESSION['registered']){
            $switchView = 'login';
            unset($_SESSION['registered']);
        }
        elseif(isset($switchView) && !empty($switchView)){
            $switchView =  $switchView;
            unset($_POST['switch-tab']);
        }
        else
            $switchView = 'login';
        return $this->switchView($switchView);
    }
    /**
     * switch to difference view based on the given $view
     * @param string $view the given view
     * @return string the requesteed view
     */
    public function switchView($view){
        switch ($view) {
            case 'login':
                $view = $this->loginView->getView();
                break;
            case 'register':
                $view = $this->registerView->getView();
                break;
            case 'search':
                $view =  $this->searchView->getView();
                break;
            case 'logout':
                $view = $this->sessionEnd();
                break;
        }
        return $view;
    }
    // reset the program
    public function sessionEnd(){
        session_unset();
        session_destroy();
        header('refresh:0');
    }
    /**
     * process the data from register, login, and search forms
     * @param string $description the description for the form
     * @param string $data the user data received
     * @return string the result after processed
     */
    public function processData($description, $data){
        if(preg_match('/login/i',$description)){
            require_once(dirname(__DIR__).'/Controller/controlLogin.php');

            $username = $data[0]['value'];
            $password = $data[1]['value'];
            $control = new ControlLogin($username, $password);
        }
        elseif (preg_match('/register/i',$description)){
            require_once(dirname(__DIR__).'/Controller/controlRegister.php');

            $name = $data[0]['value'];
            $username = $data[1]['value'];
            $email =$data[2]['value'];
            $age = $data[3]['value'];
            $address = $data[4]['value'];
            $password = $data[5]['value'];
            $control= new ControlRegister($name, $username, $age,
                                                $address, $password, $email);
        }
        elseif (preg_match('/search/i',$description)){
            require_once(dirname(__DIR__).'/Controller/controlSearch.php');
            
            $publisher = $data[0]['value'];
            $author = $data[1]['value'];
            $book = $data[2]['value'];
            $genre = $data[3]['value'];
            $year = $data[4]['value'];
            $control= new ControlSearch($publisher, $author, $book,
                                                $genre, $year);
        }
        $view = ucfirst(substr($description, 0, -4));
        return $control->{'process'.$view}();
    }
}
