<?php
class LoginView {
    private $view;
    private $loginForm;

    public function __construct(){
        $this->loginForm = $this->loginForm();
        $this->view = $this->view();
    }
    //get the view that has been set
    public function getView(){
        return $this->view;
    }
    //the view in the LoginView
    private function view(){
        return  '<section>'
                    .$this->loginForm.
                '</section>';
    }
    // the login form in the LoginView
    private function loginForm(){
        return '
            <form id="login-form" method="post">
            <h1>Login Form</h1>
            <input 
                type="input" 
                name="login-username"
                placeholder="Username"required/>
            <br><br>
            <input 
                type="password" 
                name="login-password"
                placeholder="Password"required/>
            <br><br>
            <input class="checkbox-unmaskpw" type="checkbox" 
                name = "unmaskpw" style="cursor:pointer"/> 
                Show my password
            <br><br>
            <input 
                class="form-button"
                type="submit" 
                name="submit-login"
                value="Login"/>
            </form> 
            '.$this->scriptCode().
            $this->styleCode();
    }
    //the javascript code for the LoginView
    private function scriptCode(){
        return "
            <script>
            if(sessionStorage.getItem('registered')){
                var message = 'Registered, please login';
                displayMessage('login-form','registered',message, 'green');
                sessionStorage.removeItem('registered');
            }
            $('#login-form').on('submit',function(e){
                e.preventDefault();
                $('#login-err, #registered').remove();//remove login error for each login action
        
                var values  = $(this).serializeArray();
                var errors = checkLogin(values); //validate register form's inputs
                if(!errors[0]){ //if no error
                    $.post('Controller/Controller.php', { description: 'loginForm', data :JSON.stringify(values) },function(response){
                        var data = JSON.parse(response);
                        // All error messages are in array 
                        // Only success login is true
                        if(Array.isArray(data))  
                            displayMessage('login-form','login-err', data, 'red');
                        else
                          location.reload(false);
                    });
               }
                else //else got error
                  displayMessage('login-form','login-err', errors, 'red');
            });
            //if the checkbox for show my password is checked then the 
            //password will be unmasked otherwise, it will be masked
            $('.checkbox-unmaskpw').on('click',function(){
                if($(this).is(':checked'))
                    $('input[name=login-password]').prop('type', 'input');
                else
                    $('input[name=login-password]').prop('type', 'password');
            });
        </script>";
    }
    //the css code for styling the view
    private function styleCode(){
        return '
        <style>
        #login-form > input:not(.checkbox-unmaskpw){
            text-align:center;
            border: 1px solid black;
            font-size:20pt;
            padding:10px;
            width:40%;
        }
        #login-form{
            margin-top:10%;
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
        .blink{
            animation: blinker 2s linear 1;
        }
        @keyframes blinker {  
            50% { opacity: 0; }
        }
        </style>';
    }
}
