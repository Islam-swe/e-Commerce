<?php 
require_once 'inc/header.php';
require_once 'classes/Product.php';

//check if not logged in
if(!isset($_SESSION['id']))
 {
    header('location:login.php');
 }
    
//get the product id
$id=$_GET['id'];

//call func getAllProducts from
$prod=new Product;
$product=$prod->getOneProduct($id);


?>

<!-- show errors if exist -->
<?php if(isset($_SESSION['errors'])){
    foreach($_SESSION['errors'] as $error){?>

    <div class="alert alert-danger w-50 m-auto" role="alert">
        <strong><?php echo $error?></strong>
    </div>
<?php }?>
<?php } unset($_SESSION['errors']) ?>
<!-- /show errors if exist -->



    <form class="w-75 m-auto py-5" action="handlers/handleEdit.php?id=<?php echo $id?>" method="POST">
       
        <div class="form-group">
            <label >Product Name</label>
            <input type="text" value="<?php echo $product['name']?>"  name="name" class="form-control" >
        </div>
       
        <div class="form-group">
            <label >Price</label>
            <input  value="<?php echo $product['price']?>" name="price" class="form-control" >
        </div>
       
        <div class="form-group">
            <label  >Description</label>
            <textarea class="form-control"rows="3" name="desc"><?php echo $product['desc']?></textarea> 
        </div>
       
        <input type="submit" name="submit" class="btn btn-primary" value="Edit"></input>
    </form>





<?php require_once 'inc/footer.php';?>