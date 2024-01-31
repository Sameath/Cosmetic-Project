<?php 
include('../includes/connect.php');
include('../function/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Admin Dashbaord</title>

    <style>
        .logo{
            width: 100px;
            border-radius: 30%;
            box-shadow: 1px 1px 5px 1px;
        }
        .admin_img{
            width: 100px;
            object-fit: contain;
        }
        button{
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">

    <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">

            <img src="../images/cosmetic.jpg" alt="" class="logo mx-4">


                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                    <?php
                    if(!isset($_SESSION['admin_name'])){

                        echo "
                        <li class='nav-link'>
                             <a class='nav-link' href='#'>Welcome Guest</a>
                        </li>
                        ";

                    }else{

                        echo "
                        <li class='nav-link'>
                            <h2><a class='nav-link' href='#'>Welcome ".$_SESSION['admin_name']."</a></h2>
                        </li>
                        ";
                        
                    }

                ?>
                    </ul>
                </nav>

            </div>
        </nav>

        <!-- second child -->
        <div class="bg-warning">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- third cjild -->
        <div class="row">
            <div class="col-md-12 bg-info p-1 d-flex align-items-center ">

  
                <div class="px-5">
                    <a href="#"><img src="" alt="" class="admin_img"></a>
                    <!-- បើ user login អោយប៊ូតុងបង្ហាញឈ្មោះរបស់ user -->
                <?php
                    if(!isset($_SESSION['admin_name'])){

                        echo "
                        <li class='nav-link'>
                             <h4><a class='nav-link text-light' href='#'>Welcome Guest</a></h4>
                        </li>
                        ";

                    }else{

                        echo "
                        <li class='nav-link'>
                            <h4><a class='nav-link text-light' href='#'>Welcome ".$_SESSION['admin_name']."</a></h4>
                        </li>
                        ";
                        
                    }

                ?>
                </div> 

                <div class="button text-center">

                    <button class="my-3"><a href="index.php?insert_product" class="nav-link text-light bg-info my-1">Insert Product</a></button>

                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Product</a></button>

                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Category</a></button>

                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Category</a></button>

                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brand</a></button>

                    <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brand</a></button>

                    <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Order</a></button>

                    <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payment</a></button>

                    <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List User</a></button>

                    <?php 

                        if(!isset($_SESSION['admin_name'])){
                            echo "
                            <li class='nav-link'>
                                <button><a class='nav-link text-light bg-info my-1' href='admin_login.php'>Login</a></button>
                            </li>
                            ";
                        }else{
                            echo "
                            <li class='nav-link'>
                                <button><a class='nav-link text-light bg-info my-1' href='admin_logout.php'>Logout</a></button>
                            </li>
                            ";
                        }
                    ?>
                    <!-- <button><a href="index.php?admin_logout" class="nav-link text-light bg-info my-1">Logout</a></button> -->
                
                </div>
            </div>
        </div>
    </div>


    <!-- fourth child  -->
    <div class="container my-5">
        <?php 
            if(isset($_GET['insert_product'])){
                include('insert_product.php');
            }

            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }


            if(isset($_GET['insert_brand'])){
                include('insert_brands.php');
            }

            if(isset($_GET['view_products'])){
                include('view_product.php');
            }

            if(isset($_GET['edit_product'])){
                include('edit_product.php');
            }

            if(isset($_GET['delete_product'])){
                include('delete_product.php');
            }

            if(isset($_GET['view_categories'])){
                include('view_categories.php');
            }

            if(isset($_GET['view_brands'])){
                include('view_brands.php');
            }

            if(isset($_GET['edit_category'])){
                include('edit_category.php');
            }

            if(isset($_GET['edit_brand'])){
                include('edit_brand.php');
            }

            // Check if the GET parameter name delete_category is set
            if(isset($_GET['delete_category'])){
                include ('delete_category.php');
            }

            // Check if the GET parameter name delete_brand is set
            if(isset($_GET['delete_brand'])){
                include ('delete_brand.php');
            }

            if(isset($_GET['list_orders'])){
                include ('list_orders.php');
            }

            if(isset($_GET['delete_listOrder'])){
                include ('delete_listOrder.php');
            }

            if(isset($_GET['list_payments'])){
                include ('list_payments.php');
            }

            if(isset($_GET['delete_listPayment'])){
                include ('delete_listPayment.php');
            }

            if(isset($_GET['list_users'])){
                include ('list_users.php');
            }

            if(isset($_GET['delete_listuser'])){
                include ('delete_listuser.php');
            }

            if(isset($_GET['admin_logout'])){
                include ('admin_logout.php');
            }

            
        ?>
    </div>


    <!-- last child -->
    <div class="bg-info p-3 text-center">
            <p>All right reserved-Desing by Ban Sameath</p>
    </div>
    
    

<!-- Bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- jquery link -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>