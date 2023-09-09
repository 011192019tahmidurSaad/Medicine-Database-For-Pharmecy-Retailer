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
    <title>Medi DB</title>
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
                    <div class="row p-4">
                        <div class="col-sm-3">
                            <a href="add_company.php" class="text-dark text-decoration-none">
                                <i class="fas fa-solid fa-plus-circle fa-5x text-secondary"></i>
                                <p>Add Company</p>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="List_of_company.php" class="text-dark text-decoration-none">
                                <i class="fas fa-regular fa-building fa-5x text-secondary"></i>
                                <p>Company List</p>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="add_disease.php" class="text-dark text-decoration-none">
                                <i class="fas fa-solid fa-plus-circle fa-5x text-secondary"></i>
                                <p>Add Disease</p>
                            </a>
                        </div>
                        <div class="col-sm-3">
                        <a href="list_of_disease.php" class="text-dark text-decoration-none">
                                <i class="fas fa-solid fa-disease fa-5x text-secondary"></i>
                                <p>Disease List</p>
                            </a>
                        </div>
                        <hr/>
                        <div class="col-sm-3">
                            <a href="add_medicine.php" class="text-dark text-decoration-none">
                                <i class="fas fa-solid fa-plus-circle fa-5x text-secondary"></i>
                                <p>Add Medicine</p>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="list_of_medicine.php" class="text-dark text-decoration-none">
                                <i class="fas fa-solid fa-prescription-bottle fa-5x text-secondary"></i>
                                <p>Medicine List</p>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="add_store_medicine.php" class="text-dark text-decoration-none">
                                <i class="fas fa-solid fa-plus-circle fa-5x text-secondary"></i>
                                <p>Store Medicine</p>
                            </a>
                        </div>
                        <div class="col-sm-3">
                        <a href="list_of_entry_medicine.php" class="text-dark text-decoration-none">
                        <i class="fas fa-solid fa-pills fa-5x text-secondary"></i>
                                <p>Medicine Storage</p>
                            </a>
                        </div>
                        <hr/>
                        <div class="col-sm-3">
                            <a href="add_spend_medicine.php" class="text-dark text-decoration-none">
                                <i class="fas fa-solid fa-plus-circle fa-5x text-secondary"></i>
                                <p>Add spend Medicine</p>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="list_of_spend_medicine.php" class="text-dark text-decoration-none">
                                <i class="fas fa-solid fa-list fa-5x text-secondary"></i>
                                <p>Sell List</p>
                            </a>
                        </div>
                        <hr/>
                        <div class="col-sm-3">
                            <a href="report.php" class="text-dark text-decoration-none">
                                <i class="fas fa-solid  fa-chart-bar fa-5x text-secondary"></i>
                                <p>Report</p>
                            </a>
                        </div>
                        <hr/>
                        <div class="col-sm-3">
                            <a href="add_users.php" class="text-dark text-decoration-none">
                                <i class="fas fa-solid fa-user fa-5x text-secondary"></i>
                                <p>ADD User</p>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="list_of_users.php" class="text-dark text-decoration-none">
                                <i class="fas fa-solid fa-list fa-5x text-secondary"></i>
                                <p>User list</p>
                            </a>
                        </div>

                        
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