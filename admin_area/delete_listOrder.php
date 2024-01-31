<?php 
    if(isset($_GET['delete_listOrder'])){
        $delete_listOrder=$_GET['delete_listOrder'];
        $delete_query="Delete from `user_order` where order_id='$delete_listOrder'";
        $result=mysqli_query($con,$delete_query);

        if($result){
            echo "<script>alert('listOrder has been deleted.')</script>";
            echo "<script>window.open('./index.php?list_orders','_self')</script>";
        }
    }

?>