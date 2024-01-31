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
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
    <title>Login Page</title>
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>

        <div class="row ">
            <div class="col-lg-12 col-xl-6 m-auto">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline align-items-center mb-4">
                        <label for="user_username" class="form-label">User Name</label>
                        <input type="text" id="user_username" class="form-control " placeholder="Enter username" autocomplete="off" require name="user_username">
                    </div>

                
                    <div class="form-outline align-items-center mb-4">
                        <label for="user_password" class="form-label">User Password</label>
                        <input type="password" id="user_password" class="form-control " placeholder="Enter password" autocomplete="off" require name="user_password">
                    </div>


                    <div class="text-center ">
                        <input type="submit" value="Login" class="btn bg-info mb-2" name="user_login">
                        <p>Dont have account? <a href="user_registration.php" class="text-danger text-decoration-none">Register</a></p>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>


<?php 
    if(isset($_POST['user_login'])){
        $user_username=$_POST['user_username'];
        $user_password=$_POST['user_password'];

        //select username from user table
        $select_query="select * from `user_table` where user_name='$user_username'";
        $result=mysqli_query($con,$select_query);
        $row_count=mysqli_num_rows($result);
        $row_data=mysqli_fetch_assoc($result);
        $user_ip=getIPAddress();

        // select cart item
        $select_query_cart="select * from `cart_details` where ip_address='$user_ip'";
        $select_cart=mysqli_query($con,$select_query_cart);
        $row_count_cart=mysqli_num_rows($select_cart);
        
        if($row_count>0){
            
            $_SESSION['user_name']=$user_username;

            if($user_password==$row_data['user_password']){

                // echo "<script>alert('Login successfull.')</script>";
                if($row_count==1 and $row_count_cart==0){
                    $_SESSION['user_name']=$user_username;
                    echo "<script>alert('Login successfull.')</script>";
                    echo "<script>window.open('profile.php','_self')</script>";
                }else{
                    $_SESSION['user_name']=$user_username;
                    echo "<script>alert('Login successfull.')</script>";
                    echo "<script>window.open('payment.php','_self')</script>";
                }

            }else{

                echo "<script>alert('Invalid credentails.')</script>";

            }

        }else{

                echo "<script>alert('Invalid credentails.')</script>";

        }
        

    }
?>