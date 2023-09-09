<?php
    require('connection.php');
    $store_medicine_id = null;
    $store_medicine_name=null;
    $store_medicine_quantity= null;
    $store_medicine_entry_date = null;
    $store_medicine_expire_date =null;
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
       if(isset($_GET['id'])){
        $getid = $_GET['id'];

        $sql = "SELECT * FROM store_medicine WHERE store_medicine_id = $getid";

        $query3 = $conn-> query($sql);

        $data = mysqli_fetch_assoc($query3);

        $store_medicine_id = $data['store_medicine_id'];
        $store_medicine_name = $data['store_medicine_name'];
        $store_medicine_quantity = $data['store_medicine_quantity'];
        $store_medicine_entry_date = $data['store_medicine_entry_date'];
        $store_medicine_expire_date= $data['store_medicine_expire_date'];
     }

     if(isset($_GET['store_medicine_name'])){
        $new_store_medicine_id= $_GET['store_medicine_id'];
        $new_store_medicine_name= $_GET['store_medicine_name'];
        $new_store_medicine_quantity = $_GET['store_medicine_quantity'];
        $new_store_medicine_entry_date= $_GET['store_medicine_entry_date'];
        $new_store_medicine_expire_date= $_GET['store_medicine_expire_date'];

        $sql4 = "UPDATE store_medicine SET
        store_medicine_name =  '$new_store_medicine_name',
        store_medicine_quantity =  '$new_store_medicine_quantity',
        store_medicine_entry_date = '$new_store_medicine_entry_date',
        store_medicine_expire_date = '$new_store_medicine_expire_date'
        WHERE store_medicine_id = '$new_store_medicine_id' ";

        if($conn-> query($sql4)==true){
            echo 'Update Successfully';
        }
        else{
            echo 'Not updated';
}
    }
        
     ?>
    <form action="edit_store_medicine.php" method="GET">
        Medicine Name :<br>

        <select name="store_medicine_name" id="">
            <?php 
                $sql1 = "SELECT * FROM medicine";
                $query1 = $conn-> query($sql1);
        
        
            while ($data = mysqli_fetch_array($query1)){
                $medicine_id = $data['medicine_id'];
                $medicine_name = $data['medicine_name'];

            ?>
                <option value ='<?php echo $medicine_id; ?>' <?php 
                                                                 if($store_medicine_name == $medicine_id){
                                                                    echo 'selected';
                                                                 }
                                                              ?> >
                    <?php echo $medicine_name; ?>

                </option>";
            
            <?php 
            }
            ?>
        </select><br><br>
        Medicine Quantity :<br>
        <input type="number" name="store_medicine_quantity" value="<?php echo $store_medicine_quantity; ?>"><br><br>
        Store Entry Date :<br>
        <input type="date" name="store_medicine_entry_date" value="<?php echo $store_medicine_entry_date; ?>"><br><br>
        Store Expire Date :<br>
        <input type="date" name="store_medicine_expire_date" value="<?php echo  $store_medicine_expire_date; ?>"><br><br>
        <input type="text" name="store_medicine_id" value="<?php echo $store_medicine_id; ?>" hidden>
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