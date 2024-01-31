<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>


<body>
    <h3 class="text-center text-danger mb-4">Delete Account</h3>
    <form class="mt-5" method="post">
        <div class="form-outline mb-4">
            <input type="submit" value="Delete Account" class="form-control w-50 m-auto" name="delete">
        </div>

        <div class="form-outline mb-4">
            <input type="submit" value="Don't Delete Account" class="form-control w-50 m-auto" name="dont_delete">
        </div>
    </form>
</body>
</html>


<?php
    $username_session=$_SESSION['user_name'];
    if(isset($_POST['delete'])){
        $delete_query="Delete from `user_table` where user_name='$username_session'";
        $result=mysqli_query($con,$delete_query);

            if($result){
                session_destroy();
                echo "<script>alert('Account deleted successfully.')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }
    }

    if(isset($_POST['dont_delete'])){
        echo "<script>window.open('profile.php','_self')</script>";
    }

?>