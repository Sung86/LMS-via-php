<?php
class RegisterView{
    private $view;
    private $registerForm;

    public function __construct(){
        $this->registerForm = $this->registerForm();
        $this->view = $this->view();
    }
    //get the view that has been set
    public function getView(){
        return $this->view;
    }
    //The view in the RegisterView
    private function view(){
        return  '<section>'
                    .$this->registerForm.
                '</section>';
    }
    /**
    * generate register form input fields
    * @param string $inputs the array of input fields of register form
    * @return string the structured input fields
    */
    private function generateInputs($inputs){
        $string = '';
        if(is_array($inputs))
            foreach($inputs as $input){
                $attrName= "register-".strtolower(str_replace(" ","-",$input));
                
                    $string .= "<input ";
                            if($input === "Age")
                                $string .= 'type ="number"';
                            elseif($input === "Password")
                                $string .= 'type = "password"';
                            elseif($input === "Email")
                                $string .= 'type = "email"';
                            else
                                $string .= 'type = "input"';
                    $string .= '
                            name ="'.$attrName.'"
                            placeholder="'.$input.'"/>
                        <br><br>
                    ';
            }
        return $string;
    }
    // The register form in the register view
    private function registerForm(){
        $registerInput = array("Name", "Username", "Email",
                                    "Age","Address","Password");
        return '
        <form id="register-form" method="post">  
        <h1>Register Form</h1>
            
            '.$this->generateInputs($registerInput).'
            
            <input class="checkbox-unmaskpw" type="checkbox" 
                name = "unmaskpw" style="cursor:pointer"/> 
                Show my password
            <br><br>
            <input
                class="form-button"
                type="submit"
                name="submit-register"
                value="Register"/>
            </form>
            '.$this->scriptCode().
            $this->styleCode();
    }
    //the javascript script code for the register view
    private function scriptCode(){
        return "
        <script>
        $(document).ready(function(){
            // On submit, validate user inputs register form 
            // If no errors, form is submitted & send to controller
            // else display error messages
            $('#register-form').on('submit',function(e){
                e.preventDefault();
                $('#register-err').remove();//remove register error for each register action
        
                var values  = $(this).serializeArray();
                var errors = checkRegister(values); //validate register form's inputs
                if(!errors[0]){ //if no error
                        $.post('Controller/Controller.php', {description : 'registerForm', data :JSON.stringify(values) },function(response){
                           var data = JSON.parse(response);
                            if(Array.isArray(data))  
                                displayMessage('register-form','register-err', data, 'red');
                            else{
                                sessionStorage.setItem('registered', data);
                                location.reload(false);
                            }
                        });
                }
                else
                   displayMessage('register-form','register-err', errors,'red');
            });
            //when 'Show my password' is unchecked then 
            //unmask the password; otherwise, mask the password
            $('.checkbox-unmaskpw').on('click',function(){
                if($(this).is(':checked'))
                    $('input[name=register-password]').prop('type', 'input');
                else
                    $('input[name=register-password]').prop('type', 'password');
            });
        
        });
        </script>";
    }
    //the css code for styling the view
    private function styleCode(){
        return '
        <style>
        #register-form > input:not(.checkbox-unmaskpw){
            text-align:center;
            border: 1px solid black;
            font-size:20pt;
            padding:10px;
            width:40%;
        }
        #register-form{
            margin-top:5%;
            margin-bottom: 10%;
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
