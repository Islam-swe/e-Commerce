<?php 
require_once "MySql.php";


class Product extends MySql
{

//get all
public function getAllProducts()
{
    $query="SELECT * FROM products";
    $result= $this->connect()->query($query);
    $products=[];
    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            array_push($products,$row);
        }
    }

    return $products;
}


//get one
public function getOneProduct($id)
{
    $product=null;
    $query="SELECT * FROM products
            WHERE id='$id'";
    $result=$this->connect()->query($query);
    if($result->num_rows==1)
    {
        $product=$result->fetch_assoc();
    }

    return $product;
}

//create new
public function addProduct(array $data)
{
    $data['name']=mysqli_real_escape_string($this->connect(),$data['name']);
    $data['desc']=mysqli_real_escape_string($this->connect(),$data['desc']);


    $query="INSERT INTO products (`name`,`desc`,img, price, quantity, category_id, created_at)
            VALUES ('{$data['name']}',
             '{$data['desc']}' , '{$data['img']}'
              , '{$data['price']}' ,'{$data['quantity']}' 
              ,'{$data['category_id']}' , CURRENT_TIME())";

    $result=$this->connect()->query($query);
    if($result==true)
    {
        return true;
    }
    return false;
}


//edit
public function updateProduct($id,array $data)
{
    $data['name']=mysqli_real_escape_string($this->connect(),$data['name']);
    $data['desc']=mysqli_real_escape_string($this->connect(),$data['desc']);
    
    $query="UPDATE products SET 
    `name`='{$data['name']}',
    `desc`='{$data['desc']}',
    `price`={$data['price']}
     WHERE id='$id'";
    

    $result=$this->connect()->query($query);
    if($result==true)
    {
        return true;
    }
    return false;

}

//delete
public function deleteProduct($id)
{
    $query="DELETE FROM  products 
    WHERE id='$id'";

    $result=$this->connect()->query($query);
    if($result==true)
    {
        return true;
    }
    return false;

}
    
}


?>