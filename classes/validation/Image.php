<?php 
namespace validation;
require_once 'ValidationInterface.php';

class Image implements ValidationInterface
{
    private $name;
    private $value;

    public function __construct($name,$value)
    {
        $this->name=$name;
        $this->value=$value;
    }
    public function validate()
    {
        $types=['image/jpg','image/jpeg','image/gif','image/png'];
        if(strlen($this->value['name'])>0&&!in_array($this->value['type'],$types))
        {

            return "$this->name must be an image type(jpg or jpeg or gif or png)";
        }
        return '';
    }
}





?>