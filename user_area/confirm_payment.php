<?php 
    include('../includes/connect.php');
    session_start();

    if(isset($_GET['order_id'])){
        $order_id=$_GET['order_id'];

        $select_data="select * from `user_orders` where order_id=$order_id";
        $result=mysqli_query($con,$select_data);
        $row_fetch=mysqli_fetch_assoc($result);
        $invoice_number=$row_fetch['invoice_number'];
        $amount_due=$row_fetch['amount_due'];


    }


    if(isset($_POST['confirm_payment'])){
        $invoice_number=$_POST['invoice_number'];
        $amount=$_POST['amount'];
        $payment_mode=$_POST['payment_mode'];

        $insert_query="insert into `user_payment` (order_id, invoice_number, amount, payment_mode) values ($order_id, $invoice_number, $amount, '$payment_mode' )";
        $result=mysqli_query($con,$insert_query);
        if($result){
            echo "<script>alert('Success completed payment.')</script>";
            echo "<script>window.open('profile.php?my_orders','_self')</script>";

        }else{
            echo "<script>alert('Order Not success.')</script>";
        }

        $update_order="update `user_orders` set order_status='Complete' where order_id=$order_id";
        $result_order=mysqli_query($con,$update_order);


    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment page</title>
</head>
<body class="bg-warning">
    <h1 class="text-center text-light mt-5">Confirm Payment</h1>
    <div class="container mb-5">
        <form action="" method="post">
            <div class="form-outline mt-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>

            <div class="form-outline mt-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">
            </div>

            <div class="form-outline mt-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option >Select payment mode</option>
                    <option >ABA</option>
                    <option >ACLEDA</option>
                    <option >WING</option>
                    <option >PAY Offline</option>
                </select>
            </div>

            <div class="form-outline mt-4 text-center w-50 m-auto">
                <input type="submit" value="Confirm" class="bg-info py-2 px-3 border-0 " name="confirm_payment">
            </div>            
        </form>
    </div>
    
</body>
</html>