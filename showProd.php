<?php 
require_once 'inc/header.php';
require_once 'classes/Product.php';
require_once 'classes/Category.php';

//get the product id
$id=$_GET['id'];
//call func getAllProducts from to get product data
$prod=new Product;
$product=$prod->getOneProduct($id);


//call func getAllProducts from to get product data
$category=new Category;
$category=$category->getOneCategory($product['category_id']);

//----store prod id in session for adding to cart process
$_SESSION['prodId']=$id;
if(!isset($_SESSION['cart']))
{
    $_SESSION['cart']=[];
}

if(isset($_POST['cart']))
{
    array_push($_SESSION['cart'],$_SESSION['prodId']);
}

?>


<div class="container py-4">
    <div class="row">
        <?php if($product!=null) { ?>
        <div class="col-md-6">
            <img class="w-100" src="images/<?php echo $product['img']?>" alt="<?php echo $product['name']?>">
        </div>
        <div class="col-md-6">
            <h5 class="card-title"> <?php echo $product['name']?> </h5>
            <p class="text-muted">$<?php echo $product['price']?></p>
            <p class="card-text"><?php echo $product['desc'] ?> </p>
            <p class="card-text text-muted"><span class="font-weight-bold text-dark">Category: </span> <?php echo $category['type'] ?> </p>
            <p class="card-text text-muted"><span class="font-weight-bold text-dark">Quantity: </span><?php echo $product['quantity'] ?> Pieces </p>

            <?php if(isset($_SESSION['id'])){ ?>
                <a href="edit.php?id=<?php echo $product['id']?>" class="btn btn-info">Edit</a>
                <a href="handlers/handleDelete.php?id=<?php echo $product['id']?>" class="btn btn-danger">Delete</a>
            <?php }?>
            <a href="index.php" class="btn btn-primary">Back</a>


            <?php if(!isset($_SESSION['id'])){ ?>
                <form action="showProd.php?id=<?php echo $product['id']?>" method="post">
                    <input name="cart" class="btn btn-success" type="submit" value="Add To Cart">

                </form>
            <?php }?>
            <?php 
            if(isset($_POST['cart'])){?>
               <a class="btn btn-info" href="buyProducts.php">Buy</a> 

            <?php }?>
        </div>

        <?php } else{?>
            <h1>No Product Found with this ID</h1>
        <?php } ?>
      
    </div>
</div>




<?php require_once 'inc/footer.php';?>