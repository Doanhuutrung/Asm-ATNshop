<?php
   $connect = pg_connect("host=ec2-107-20-153-39.compute-1.amazonaws.com
   dbname=d7fnvuie08bqea
   port=5432
   user=qbwkglenipljgh
   password=bd2de50a1827c44d273e78356a3fca0f849403100e1a4b5f12d1c91f91a7e9ee
    sslmode=require");
    if ($connect === false) {
        die("ERROR: Something went wrong with connection!");
    }
    $query ="select * from product";
    $result = pg_query($connect,$query);
    ?>
<!doctype html>
    <html lang="en">
      <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      </head>
      <body>
        <div class="container">
            <h1 style = "text-align: center; margin-top: 10px;">ATN Management Dashboard</h1>
            <form action="login.html" method = "POST">
              <button style="margin-bottom: 10px;" type="button" class="btn btn-primary btn-sm" id="logout-button" name="logout-button">Log out</button>
              <button style="margin-bottom: 10px;" type="button" class="btn btn-primary btn-sm" id="edit-button" name="edit-button">Edit</button>
              <button style="margin-bottom: 10px;" type="button" class="btn btn-primary btn-sm" id="delete-button" name="delete-button">Delete</button>
              
            </form>
            <table class="table table-striped table-primary">
                <thead>
                    <tr class="table-primary">
                    <th scope="col">Toy</th>
                    <th scope="col">Type</th>
                    <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            if($result > 0){
                                while ($row_data = pg_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td class="table-primary" ><?php echo $row_data["product_name"];?></td>
                            <td class="table-primary"> <?php echo $row_data["product_type"];?></td>
                            <td class="table-primary"><?php echo $row_data["price"];?></td>
                        </tr>
                        <?php
                                }
                            }
                            else{
                                echo "<script>alert('Fetch database fail !');</script>" . pg_errormessage($query);
                            }
                        ?>
                </tbody>
            </table>
        </div>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </body>
    </html>
