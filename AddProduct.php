<?php
   $connect = pg_connect("host=ec2-107-20-153-39.compute-1.amazonaws.com
   dbname=d7fnvuie08bqea
   port=5432
   user=qbwkglenipljgh
   password=bd2de50a1827c44d273e78356a3fca0f849403100e1a4b5f12d1c91f91a7e9ee
    sslmode=require");

   if ($connect === false) {
      die("ERROR: Something went wrong with connection!");
    } else {
      $product_name = $_POST['Productname'];
      $product_type = $_POST['Type'];
      $price = $_POST['Price'];

    }
    $query = "INSERT INTO product (product_name, product_type, price) 
    VALUES('$product_name', '$product_type', '$price');";
    $result = pg_query($connect, $query);
    if ($result) {
      echo "<script>alert('Record added succesfully!, Refresh');</script>";
      header('refresh: 3; url=Add.php');
    } else {
      echo ("ERROR + $query") . pg_errormessage($query);
    }
    pg_close($connect);
?>
