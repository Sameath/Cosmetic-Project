<?php 
    if(isset($_GET['delete_product'])){
        $delete_id=$_GET['delete_product'];
        
        //delete query
        $query="DELETE FROM products WHERE product_id='$delete_id'";
        $run=mysqli_query($con,$query);
        if($run){
            echo "<script>alert('Product deleted success.')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        }
    }
?>