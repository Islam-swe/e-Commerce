<?php
require_once 'inc/header.php';
require_once 'classes/Product.php';
require_once 'classes/helpers/Str.php';

use helpers\Str;

//call func getAllProducts from
$prod=new Product;
$products=$prod->getAllProducts();


?>


<div class="container py-4">
    <div class="row">

    <?php if($products!=[]) {?>
        <?php foreach($products as $product) { ?>
        <div class="col-md-4 p-2">
            <div class="card" >
                <img style="height:300px" src="images/<?php echo $product['img']?>" class="card-img-top" alt="<?php echo $product['name']?>">
                    <div class="card-body">
                    <h5 class="card-title"> <?php echo $product['name']?> </h5>
                    <p class="text-muted">$<?php echo $product['price']?></p>
                    <p class="card-text"><?php echo Str::limit($product['desc']) ?> </p>
                    <a href="showProd.php?id=<?php echo $product['id']?>" class="btn btn-primary">Show</a>
                    
                    <?php if(isset($_SESSION['id'])){ ?>
                        <a href="edit.php?id=<?php echo $product['id']?>" class="btn btn-info">Edit</a>
                        <a href="handlers/handleDelete.php?id=<?php echo $product['id']?>" class="btn btn-danger">Delete</a>
                    <?php }?>
                    </div>
            </div>
        </div>
        <?php } ?>
    <?php } else {?>
        <p>No Proudct Found</p>
    <?php } ?>
    </div>
</div>











<?php require_once 'inc/footer.php';?>