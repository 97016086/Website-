<?php



class validate
{
    private $data;
    private $errors = [];
    private static $fields = ['name', 'email', 'bericht'];

    public function __construct($post_data)
    {
        $this->data = $post_data;
    }

    public function validateForm(){

        foreach(self::$fields as $field){
            if (!array_key_exists($field, $this->data)){
                trigger_error("$field is not present in data");
                return;
            }
        }

        $this->validateName();
        $this->validateEmail();
        $this->validateText();
        return $this->errors;

        

       
    }

    private function validateName(){

        $val = trim($this->data['name']);

        if(empty($val)){
            $this->addError('name', 'naam kan niet leeg zijn');
        }else{
            if(!preg_match("/^[a-zA-Z-' ]*$/", $val)){
                $this->addError('name', 'naam kan alleen bestaan uit letters');
            }
            
        }

    }

    private function validateEmail(){
        $val = trim($this->data['email']);

        if(empty($val)){
            $this->addError('email', 'email kan niet leeg zijn');
        }else{
            if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
                $this->addError('email', 'email moet bestaan uit een geldig emailadres ');
            }
            
        }
        

    }

    private function validateText(){
        $val =  trim($this->data['bericht']);

        if (strlen($_POST['bericht']) == 0){
            $this->addError('bericht', 'het tekstvak kan niet leeg zijn');
        }else{
        if (!preg_match("/^[a-zA-Z-' ]*$/", $val)){
            $this->addError('bericht', 'Je mag geen cijfers of andere tekens gebruiken voor dit tekstvak ');
            }

        }
        

    }



    private function addError($key, $val){
        $this->errors[$key] = $val;

        
    }
    
}


?>