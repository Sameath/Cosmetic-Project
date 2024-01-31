

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User order</title>
</head>
<body>
    <!-- Php code -->
<?php
          $username=$_SESSION['user_name'];
          $get_user="Select * from `user_table` where user_name='$username'";
          $result=mysqli_query($con,$get_user);
          $row_fetch=mysqli_fetch_assoc($result);
          $user_id=$row_fetch['user_id'];
          
?>
    
    <h3 class="text-center text-success">All my orders.</h3>
    <table class="table table-bordered mt-5">

        <thead class="bg-info text-center">
            <tr>
                <th>SI no</th>
                <th>Amount Due</th>
                <th>Total Product</th>
                <th>Invoice id</th>
                <th>Date</th>
                <th>Complet/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody class="bg-secondary text-light text-center">

        <?php 
            $get_order_detail="select * from `user_orders` where user_id=$user_id";
            $result_order=mysqli_query($con,$get_order_detail);
            $number=1;

            while ($row_order = mysqli_fetch_assoc( $result_order)) {
                $order_id=$row_order['order_id'];
                $amount_due=$row_order['amount_due'];
                $total_product=$row_order['total_products'];
                $invoice_number=$row_order['invoice_number'];
                $order_status=$row_order['order_status'];

                if($order_status=='pending'){
                    $order_status='Incomplete';
                }else{
                    $order_status='Complete';
                }

                $order_date=$row_order['order_date'];

                echo "
                    <tr>
                        <td>$number</td>
                        <td>$amount_due</td>
                        <td>$total_product</td>
                        <td>$invoice_number</td>
                        <td>$order_date</td>
                        <td>$order_status</td>"; ?>
                        

                        <?php 
                        if($order_status=='Complete'){
                            echo "<td>Paid</td>";
                        }else{
                            echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
                    </tr>";

                        }
                $number++;
            }
        ?>
            
        </tbody>
    </table>

</body>
</html>