<?php 
require_once "MySql.php";


class Category extends MySql
{

//get all
public function getAllCategories()
{
    $query="SELECT * FROM categories";
    $result= $this->connect()->query($query);
    $categories=[];
    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            array_push($categories,$row);
        }
    }

    return $categories;
}


//get one
public function getOneCategory($id)
{
    $category=null;
    $query="SELECT * FROM categories
            WHERE category_id='$id'";
    $result=$this->connect()->query($query);
    if($result->num_rows==1)
    {
        $category=$result->fetch_assoc();
    }

    return $category;
}

//create new
public function addCategory(array $data)
{
    $data['type']=mysqli_real_escape_string($this->connect(),$data['type']);


    $query="INSERT INTO categories (`type`)
            VALUES ('{$data['category_name']}')";

    $result=$this->connect()->query($query);
    if($result==true)
    {
        return true;
    }
    return false;
}




    
}


?>