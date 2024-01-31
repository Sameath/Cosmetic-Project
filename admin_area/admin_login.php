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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
       body{
            overflow: hidden;
            background: radial-gradient(circle, #800000, #808000, #000080);
            color: white;
        }
        .img-fluid{
            border-radius: 20px;
            box-shadow: 1px 3px 4px 1px;
            width: 400px;
            height: 400px;
        }
        .btn{
            box-shadow: 1px 2px 1px 1px;
        }
    </style>
    <title>Admin Login</title>
</head>
<body class="bg-dark">
    <div class="comntainer-fluid mt-3">
        <h1 class="text-center mb-5 mt-5">Login</h1>

        <div class="row d-flex justify-content-center align-items-center">

            <!-- for image -->
            <div class="col-lg-6 col-xl-5 m-5">
                <img src="../images/cosmetic.jpg" alt="Admin Resgistration" class="img-fluid">
            </div>

            <!-- for form -->
            <div class="col-lg-6 col-xl-5 m-5">
                <form action="" method="post">
                    
                    <!-- for username -->
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="admin_name" placeholder="បញ្ចូលឈ្មោះ" require class="form-control w-50">
                    </div>

                    <!-- for password -->
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="admin_password" placeholder="បញ្ចូលលេខសម្ងាត់" require class="form-control w-50">
                    </div>


                    <!-- for submit btn -->
                    <div>
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0 m-2 btn" name="admin_login">

                        <p class="small fw-bold mt-2 pt-1">Not have account yet? <a href="admin_registration.php" class="text-danger text-decoration-none">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
    if(isset($_POST['admin_login'])){
        $admin_name=$_POST['admin_name'];
        $admin_password=$_POST['admin_password'];

        $select_query="select * from `admin_table` where admin_name='$admin_name'";
        $result=mysqli_query($con,$select_query);
        $row_count=mysqli_num_rows($result);
        $row_data=mysqli_fetch_assoc($result);

        if($row_count>0){
            $_SESSION['admin_name']=$admin_name;
                if(password_verify($admin_password,$row_data['admin_password'])){
                    echo "<script>alert('Login succesful')</script>";

                    if($row_count==1){
                        $_SESSION['admin_name']=$admin_name;
                        echo "<script>alert('Login succesful')</script>";
                        echo "<script>window.open('index.php','_self')</script>";
                                                }

                     }else{
                
                    echo "<script>alert('Invalid Credentials')</script>";
                          }
                    
                    }else{
                        echo "<script>alert('Invalid Credentials')</script>";
                    }   
                
    }

    

?>

