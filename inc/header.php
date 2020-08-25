<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Online Shope</title>
  </head>
  <body>
   <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
       <a class="navbar-brand" href="index.php">Online Store</a>
       <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
           aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="collapsibleNavId">
           <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
               <li class="nav-item active">
                   <a class="nav-link" href="index.php">All Products <span class="sr-only">(current)</span></a>
               </li>
               <?php if(isset($_SESSION['id'])){ ?>
               <li class="nav-item ">
                   <a class="nav-link" href="add.php">Add New</a>
               </li>
               <li class="nav-item ">
                   <a class="nav-link" href="addCategory.php">Add Category</a>
               </li>
               <li class="nav-item ">
                   <a class="nav-link" href="orders.php">Orders</a>
               </li>
               <li class="nav-item ">
                  <a class="nav-link disabled" > <span class="text-white">Admin: </span><?php echo $_SESSION['username']?></a>
               </li>
               <li class="nav-item ">
                   <a class="nav-link" href="logout.php">Logout</a>
               </li>
               <?php } ?>
                    
              
           </ul>
        
       </div>
   </nav>


