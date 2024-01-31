<?php 
    include('../includes/connect.php');
    include('../function/common_function.php');
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
    <!-- Bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Registration Page</title>
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>

        <div class="row ">
            <div class="col-lg-12 col-xl-6 m-auto">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline align-items-center mb-4">
                        <label for="user_username" class="form-label">User Name</label>
                        <input type="text" id="user_username" class="form-control " placeholder="Enter username" autocomplete="off" require name="user_username">
                    </div>

                    <div class="form-outline align-items-center mb-4">
                        <label for="user_email" class="form-label">User Email</label>
                        <input type="email" id="user_email" class="form-control " placeholder="Enter email" autocomplete="off" require name="user_email">
                    </div>

                    <div class="form-outline align-items-center mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" class="form-control "  require name="user_image">
                    </div>

                    <div class="form-outline align-items-center mb-4">
                        <label for="user_password" class="form-label">User Password</label>
                        <input type="password" id="user_password" class="form-control " placeholder="Enter password" autocomplete="off" require name="user_password">
                    </div>

                    <div class="form-outline align-items-center mb-4">
                        <label for="user_confirm_password" class="form-label">User Confirm Password</label>
                        <input type="password" id="user_confirm_password" class="form-control " placeholder="Enter confirm password" autocomplete="off" require name="user_confirm_password">
                    </div>

                    <div class="form-outline align-items-center mb-4">
                        <label for="user_address" class="form-label">User Address</label>
                        <input type="text" id="user_address" class="form-control " placeholder="Enter address" autocomplete="off" require name="user_address">
                    </div>

                    <div class="form-outline align-items-center mb-4">
                        <label for="user_contact" class="form-label">User Contact</label>
                        <input type="text" id="user_contact" class="form-control " placeholder="Enter contact" autocomplete="off" require name="user_contact">
                    </div>

                    <div class="text-center ">
                        <input type="submit" value="Register" class="btn bg-info mb-2" name="user_register">
                        <p>Already have an account? <a href="user_login.php" class="text-danger text-decoration-none">Login</a></p>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>


<?php 
    if(isset($_POST['user_register'])){

        $user_username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];
        $user_confirm_password=$_POST['user_confirm_password'];
        $user_address=$_POST['user_address'];
        $user_contact=$_POST['user_contact'];
        $user_ip=getIPAddress();

        //access image
        $user_image=$_FILES['user_image']['name'];
        $user_tmp_image=$_FILES['user_image']['tmp_name'];

        //select query
        $select_query="select * from `user_table` where user_name='$user_username' or user_email='$user_email'";
        $result=mysqli_query($con,$select_query);
        $row_count=mysqli_num_rows($result);
        if($row_count>0){
            echo "<script>alert('Username or email already registered.')</script>";
        }elseif($user_password!=$user_confirm_password){
            echo "<script>alert('Password not match')</script>";
        }else{
            //insert query
            move_uploaded_file($user_tmp_image,"./user_images/$user_image");
            $insert_query="insert into `user_table` (user_name, user_email, user_password, user_image, user_ip, user_address, user_mobile) 
                            values ('$user_username', '$user_email', '$user_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
            $sql_execute=mysqli_query($con,$insert_query);

            if($sql_execute){
                echo "<script>alert('Data inserted successfully.')</script>";
            }else{
                die(mysqli_error($con));
            }
        }


        //selecting cart item 
        $select_cart_item="select * from `cart_details` where ip_address='$user_ip'";
        $result_cart=mysqli_query($con,$select_cart_item);
        $rows_count=mysqli_num_rows($result_cart);

        if($rows_count>0){
            $_SESSION['user_name']=$user_username;
            echo "<script>alert('You have items in your cart.')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }else{
            echo "<script>window.open('user_login.php','_self')</script>";

        }

    
}
?>