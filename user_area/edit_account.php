<?php 

    //display all data in column
   if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['user_name'];
    $select_query="select * from `user_table` where user_name='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);

    //fetch data 
    $row_fetch=mysqli_fetch_assoc($result_query);

    $user_id=$row_fetch['user_id'];
    $user_name=$row_fetch['user_name'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];


    //update button
    if(isset($_POST['user_update'])){
        $update_id=$user_id;

        $user_name=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_address=$_POST['user_address'];
        $user_mobile=$_POST['user_mobile'];

        //access image
        $user_img=$_FILES['user_image']['name'];
        $user_img_tmp=$_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_img_tmp,"./user_images/$user_img");

        //update query
        $update_data="update `user_table` set user_name='$user_name', user_email='$user_email', user_image='$user_img', user_address='$user_address', user_mobile='$user_mobile' where user_id=$update_id";
        $result_update=mysqli_query($con,$update_data);

        if($result_query){
            echo "<script>alert('Data updated.')</script>";
            echo "<script>window.open('user_logout.php','_self')</script>";

        }else{
            echo "<script>alert('Please fill the column.')</script>";

        }

    }






   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
</head>
<body>
   <h3 class="text-center text-success mb-4">Edit Account</h3>
   <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4 ">
            <input type="text" class="form-control w-50 m-auto mb-2" name="user_username" value="<?php echo $user_name ?>">
        </div>

        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto mb-2" name="user_email"  value="<?php echo $user_email ?>">
        </div>

        <div class="form-outline mb-4 d-flex  w-50 m-auto">
            <input type="file" class="form-control mb-2" name="user_image">
            <img src="./user_images/<?php echo $image ?>" alt="" width="100px" height="100px">
        </div>

        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto mb-2" name="user_address"  value="<?php echo $user_address ?>">
        </div>

        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto mb-2" name="user_mobile"  value="<?php echo $user_mobile ?>">
        </div>

        <input type="submit" class="btn bg-info py-2 px-3" value="update" name="user_update">

   </form>
</body>
</html>