<?php 
session_start();
require_once '../classes/Category.php';
require_once '../classes/validation/Validator.php';

//check if not logged in
if(!isset($_SESSION['id']))
{
    header('location:../login.php');
    die();
}

use validation\Validator;



//if form is not submitted
if(!isset($_POST['submit']))
{
    header('location:../addCategory.php');
}


//getting data
$category_name=$_POST['category_name'];



//validation
$v=new Validator;
$v->rules('category_name',$category_name,['required','string','Max:100']);

$errors=$v->errors;




//if data is valid
if($errors==[])
{   
    
    //store in db
    $data=
    [
    'category_name'=>$category_name,
   
    ];
    $category=new Category;
    $result=$category->addCategory($data);


    //if stored successfully
    if($result==true)
    {
        
        header("location: ../index.php");

    }
    else
    {
    //redirect with errors
    $_SESSION['errors']=['error storing in database'];
    header('location:../addCategory.php');


    }
}
else 
{
    //redirect with errors
    $_SESSION['errors']=$errors;
    header('location:../addCategory.php');
}

?>