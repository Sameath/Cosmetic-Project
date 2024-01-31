<!-- connect file -->
<?php 
include('../includes/connect.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Checkout Page</title>

    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .logo{
            width: 100px;
            border-radius: 30%;
            box-shadow: 1px 1px 2px 3px;
        }
        .nav-link{
            color: white;
            font-size: 20px;
        }
        .card-img-top{
            width: 100%;
            height: 200px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">

                        <!-- logo img -->
                    <img src="../images/Tube_Cafe.png" alt="" class="logo mx-4">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <!-- for home -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>

                        <!-- for products -->
                    <li class="nav-item">
                        <a class="nav-link" href="../display_all.php">Products</a>
                    </li>

                        <!-- for register -->
                    <li class="nav-item">
                        <a class="nav-link" href="user_registration.php">Register</a>
                    </li>

                        <!-- for contact -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>

                        


                </ul>
                <form class="d-flex" action="search_product.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <input type="submit" value="Search" name="search_data_product" class="btn btn-outline-light bg-warning">
                </form>
                </div>
            </div>
        </nav>




        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
            <ul class="navbar-nav m-auto">
                
                

                <!-- បើ user login អោយប៊ូតុងបង្ហាញពាក្យ logout -->

                <?php 
                    if(!isset($_SESSION['user_name'])){
                        echo "
                        <li class='nav-link'>
                            <a class='nav-link' href='./user_login.php'>Login</a>
                        </li>
                        ";
                    }else{
                        echo "
                        <li class='nav-link'>
                            <a class='nav-link' href='./user_logout.php'>Logout</a>
                        </li>
                        ";
                    }
                ?>

                
            </ul>
        </nav>


        <!-- third child -->
        <!-- <div class="bg-success">
            <h3 class="text-center">Hidden store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div> -->


        <!-- fourth child Product and Category -->
        <div class="row px-3 mt-5">
            <!-- product side -->
            <div class="col-md-12">
                <!-- product -->
                <div class="row">

                    <?php 
                        if(!isset($_SESSION['user_name'])){
                            include('user_login.php');
                        }else{
                            include('payment.php');
                        }
                    ?>
                
                    
                </div>
            </div>
                

        </div>




        <!-- last child -->
        <!-- include footer -->
        <?php
        include('../includes/footer.php');
        ?>
    </div>


    <!-- Bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>