<?php
    include('../includes/connect.php');
    include('../function/common_function.php');
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
    <title>Admin Registration</title>
</head>
<body>
    <div class="comntainer-fluid mt-5">
        <h1 class="text-center mb-5">Admin Registration</h1>

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

                    <!-- for email -->
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="admin_email" placeholder="បញ្ចូលអីមែល" require class="form-control w-50">
                    </div>

                     <!-- for password -->
                     <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="admin_password" placeholder="បញ្ចូលលេខសម្ងាត់" require class="form-control w-50">
                    </div>

                    <!-- for confirm_password -->
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="បញ្ចូលលេខសម្ងាត់" require class="form-control w-50">
                    </div>

                    <!-- for submit btn -->
                    <div>
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0 m-2 btn" name="admin_registration">

                        <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="admin_login.php" class="text-danger text-decoration-none">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


<?php 
    if(isset($_POST['admin_registration'])){
        $admin_name=$_POST['admin_name'];
        $admin_email=$_POST['admin_email'];
        $admin_password=$_POST['admin_password'];
        $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
        $conf_admin_password=$_POST['confirm_password'];

        //select query to check user exist or not
        $select_query="Select * from `admin_table` where admin_name='$admin_name' or admin_email='$admin_email'";
        $result=mysqli_query($con,$select_query);
        $row_count=mysqli_num_rows($result);

        //check
        if($row_count>0){

            echo "<script>alert('ឈ្មោះនេះឬអុីមែលនេះបានចុះឈ្មោះរួចហើយ។')</script>";

        }elseif($admin_password!=$conf_admin_password){

            echo "<script>alert('លេខសម្ងាត់មិនត្រូវគ្នា។')</script>";

        }else{
            //insert to database
            $insert_query="insert into `admin_table` (admin_name, admin_email, admin_password) values ('$admin_name', '$admin_email', '$hash_password')";
            $sql_execute=mysqli_query($con,$insert_query);
            echo "<script>alert('បានស្នើរសុំរូចរាល់។')</script>";
            echo "<script>window.open('admin_login.php','_self')</script>";


        }
    }

?>