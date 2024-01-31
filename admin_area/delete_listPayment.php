<?php 
    if(isset($_GET['delete_listPayment'])){
        $delete_listPayment=$_GET['delete_listPayment'];
        $delete_query="Delete from `user_payment` where order_id='$delete_listPayment'";
        $result=mysqli_query($con,$delete_query);

        if($result){
            echo "<script>alert('Payment has been deleted.')</script>";
            echo "<script>window.open('./index.php?list_payments','_self')</script>";
        }
    }

?>