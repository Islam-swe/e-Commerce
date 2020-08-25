<?php
require_once "classes/Product.php";



$prod=new Product();


//$prod->getAll();
//var_dump($prod->getOneProduct(9));

var_dump($prod->updateProduct(1,
[
    'name'=>'test1',
    'desc'=>'test1test1',
    'price'=>1000,
]
   
) )


?>
