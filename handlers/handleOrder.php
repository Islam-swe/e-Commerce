<?php 
session_start();
require_once '../classes/Order.php';
require_once '../classes/OrderDetails.php';
require_once '../classes/Product.php';
require_once '../classes/Category.php';
require_once '../classes/validation/Validator.php';



use validation\Validator;

//if form is not submitted
if(!isset($_POST['submit']))
{
    header('location:../index.php');
}


//getting data
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];






//validation
$v=new Validator;
$v->rules('name',$name,['required','string','Max:100']);
$v->rules('email',$email,['required','email','Max:100']);
$v->rules('phone',$phone,['required','numeric']);
$v->rules('address',$address,['required','string']);
$errors=$v->errors;




//if data is valid
if($errors==[])
{   
 
    //store in db
    $data=
    [
    'name'=>$name,
    'email'=>$email,
    'phone'=>$phone,
    'address'=>$address
    ];

    //create object order to use function addOrder
    //to store the customer order in db
    $order=new Order;
    $result1=$order->addOrder($data);

    foreach($_SESSION['cart'] as $cartId)
    {
    
        $prod=new Product;
        $product=$prod->getOneProduct($cartId);

        // $categ=new Category;
        // $category=$categ->getOneCategory($product['product_id']);

        $ord=new Order;
        $order=$ord->getOneOrder($email);

        $order_id=$order['order_id'];
        $product_id=$product['id'];
        $priceEach=$product['price'];   

        $orderDetail=
        [
        'order_id'=>$order_id,
        'product_id'=>$product_id,
        'priceEach'=>$priceEach
        ];

        var_dump($orderDetail);
        $ordDetail=new OrderDetails;
        $result2= $ordDetail->addOrderDetail($orderDetail);
    }
    

    //if stored successfully
    if($result1==true && $result2==true)
    {
       
        header("location: ../index.php");
        unset($_SESSION['cart']);

    }
    else
    {
        //redirect with errors
        $_SESSION['errors']=['error storing in database'];
        header('location:../buyProducts.php');
    }
}
else 
{
    //redirect with errors
    $_SESSION['errors']=$errors;
    header('location:../buyProducts.php');
}

?>