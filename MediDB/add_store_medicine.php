<?php
    require('connection.php');

function data_list($tableName,$column1,$column2){
    require('connection.php');
        $sql1 = "SELECT * FROM $tableName";
        $query1 = $conn-> query($sql1);
        $sql2 = "SELECT * FROM $tableName";
        $query2 = $conn-> query($sql2);


    while ($data = mysqli_fetch_array($query1)){
        $data_id = $data[$column1];
        $data_name = $data[$column2];
        echo "<option value ='$data_id'>$data_name</option>";}

    }


 ?>
 <?php
   session_start();
   $user_first_name= $_SESSION['user_first_name'];
   $user_last_name= $_SESSION['user_last_name'];
   if(!empty($user_first_name) && !empty($user_last_name)){
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Medicine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

</head>
<body>
<div class="container bg-light">
        <div class="container-foluid border-bottom border-secondary"> <!--  topbar -->
              <?php include('bootstrap/topbar.php'); ?>
           
        </div><!-- end topbar -->
        <div class="container-foluid">
            <div class="row">
                <div class="col-sm-3 bg-light p-0 m-0">
                    <?php include('bootstrap/leftside_bar.php'); ?>
                </div>
                <div class="col-sm-9 border-start border-secondary">
                    <div class="container p-4 m-4">
                    <?php 
       if(isset($_GET['store_medicine_name'])){
        $store_medicine_name= $_GET['store_medicine_name'];
        $store_medicine_quantity = $_GET['store_medicine_quantity'];
        $store_medicine_entry_date= $_GET['store_medicine_entry_date'];
        $store_medicine_expire_date= $_GET['store_medicine_expire_date'];
        
        $sql = "INSERT INTO store_medicine (store_medicine_name,
                                     store_medicine_quantity,
                                     store_medicine_entry_date,
                                     store_medicine_expire_date)
        VALUES ('$store_medicine_name','$store_medicine_quantity',
                '$store_medicine_entry_date','$store_medicine_expire_date')";

        if($conn-> query($sql)== true){
            echo 'Data inserted';
        }
        else{
            echo 'data not inserted';
        }
        

       }
        
        
    ?>
    <?php
        
     ?>
    <form action="add_store_medicine.php" method="GET">
        Medicine Name :<br>

        <select name="store_medicine_name" id="">
            <?php 
                data_list('medicine','medicine_id','medicine_name');
            ?>
        </select><br><br>
        Medicine Quantity :<br>
        <input type="text" name="store_medicine_quantity" required><br><br>
        Store Entry Date :<br>
        <input type="date" name="store_medicine_entry_date" required><br><br>
        Store Expire Date :<br>
        <input type="date" name="store_medicine_expire_date" required><br><br>
        <input type="submit" value="submit" class="btn btn-secondary"></input>
    </form>
                
                    

                    </div> 
                    
                </div>
            </div>

        </div>
        <div class="border-top border-secondary">
        <?php include('bootstrap/bottom_bar.php'); ?>
        </div>

    </div>
</body>
</html>
<?php
   }
   else{
    header('location:login.php');
   }
 ?>