<?php 
namespace validation;

require_once 'ValidationInterface.php';
require_once 'Email.php';
require_once 'Str.php';
require_once 'Numeric.php';
require_once 'Required.php';
require_once 'Max.php';
require_once 'RequiredImage.php';
require_once 'Image.php';

class Validator
{
    
    public $errors=[];

    private function makeValidtion(ValidationInterface $v)
    {
      return  $v->validate();
    }

    public function rules($name,$value,array $rules)
    {
        
            foreach($rules as $rule)
            {
                if($rule=='required')
                {
                    $error=$this->makeValidtion(new Required($name,$value));
                }
                elseif($rule=='numeric')
                {
                    $error= $this->makeValidtion(new Numeric($name,$value));  
                }
                elseif($rule=='string')
                {
                    $error=$this->makeValidtion(new Str($name,$value));  
                }
                elseif($rule=='email')
                {
                    $error= $this->makeValidtion(new Email($name,$value));  
                }
                elseif($rule=='Max:100')
                {
                    $error=$this->makeValidtion(new Max($name,$value));  
                }
                elseif($rule=='requiredimage')
                {
                    $error=$this->makeValidtion(new RequiredImage($name,$value));  
                }
                elseif($rule=='image')
                {
                    $error=$this->makeValidtion(new Image($name,$value));  
                }
                else
                {
                    $error='';
                }
                if($error!='')
                {
                    array_push($this->errors,$error);
                }
                
            }
    }


}

?>