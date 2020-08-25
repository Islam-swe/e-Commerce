<?php 
session_start();
require_once '../classes/Product.php';
require_once '../classes/validation/Validator.php';

if(!isset($_SESSION['id']))
{
    header('location:../login.php');
    die();
}

use validation\Validator;

$id=$_GET['id'];

//if form is not submitted
if(!isset($_POST['submit']))
{
    header('location:../add.php');
}

$name=$_POST['name'];
$desc=$_POST['desc'];
$price=$_POST['price'];

//clean data
$name=htmlspecialchars(trim($name));
$price=htmlspecialchars(trim($price));
$desc=htmlspecialchars(trim($desc));

//$img=$_FILES['img'];





//validation
$v=new Validator;
$v->rules('name',$name,['required','string','Max:100']);
$v->rules('price',$price,['required','numeric']);
$v->rules('desc',$desc,['required']);
//$v->rules('img',$img,['requiredimage','image']);
$errors=$v->errors;


//if data is valid
if($errors==[])
{

    //update in db
    $data=
    [
    'name'=>$name,
    'desc'=>$desc,
    'price'=>$price
    ];


    $prod=new Product;
    $result=$prod->updateProduct($id,$data);


    //if stored successfully
    if($result==true)
    {
        
        header("location: ../showProd.php?id=".$id);

    }
    else
    {
    //redirect with errors

        echo 'error';

    }
}
else 
{
    //redirect with errors
    $_SESSION['errors']=$errors;
    header("location:../edit.php?id=".$id);
    //var_dump($errors);
}

?>