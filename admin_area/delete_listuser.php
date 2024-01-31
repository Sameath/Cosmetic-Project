<?php 
    if(isset($_GET['delete_listuser'])){
        $delete_listuser=$_GET['delete_listuser'];
        $delete_query="Delete from `user_table` where user_id='$delete_listuser'";
        $result=mysqli_query($con,$delete_query);

        if($result){
            echo "<script>alert('User has been deleted.')</script>";
            echo "<script>window.open('./index.php?list_users','_self')</script>";
        }
    }

?>