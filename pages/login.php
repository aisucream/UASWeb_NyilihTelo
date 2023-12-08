<?php

session_start();

require('../connections/connection.php');

if(isset($_SESSION["login"])){
  header("location: index.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- ---- -->

    <!-- CSS Native -->
    <link rel="stylesheet" href="../assets/dist/css/login.css" />
    <!-- ---- -->

    <!-- Logo -->
    <link rel="icon" type="png" href="../assets/images/dashboard/logo.png" />
    <!-- ---- -->

    <!-- Font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,700;1,600&display=swap" rel="stylesheet" />
    <!-- ---- -->

    <title>Login | Nyilih Te-Lo</title>
</head>

<body>

    <div class="global-container">
        <div class="card login-form">

            <div class="body">
                <h1>Log <span>in</span></h1>
                <h3>Single Account, Single Sign On login</h3>

            </div>

            <div class="form mt-3">

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">NIM/NIP</label>
                        <input type="username"  name="username" class="form-control" id="username" placeholder="Masukan NIM/NIP">
                    </div>       
                    <div class="mb-3 mt-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password">
                    </div>
                    
                    <button type="submit" class="button-submit" name="login">Login</button>
                </form>


                <div class = "mt-3">
                    <?php
                    if (isset($_POST["login"])) {
                        $users = $_POST["username"];
                        $password = $_POST["password"];

                        $q = mysqli_query($conn, "SELECT * FROM user WHERE no_induk = '$users'");
                        $countdata = mysqli_num_rows($q);
                        $data = mysqli_fetch_array($q);

                        if ($users == "" or $password == "") {
                            ?>
                                <div class= "alert alert-danger" role="alert" >
                                    <p>Harap isi form diatas</p>
                                </div>
                            <?php

                        } else {
                            if ($countdata > 0){
                                if($data['password'] !=$password){
                                    ?>
                                        <div class= "alert alert-danger" role="alert" >
                                            <p>Password anda salah!</p>
                                        </div>
                                    <?php
                                }else{
                                    if($data['level']=="admin"){
                                        $_SESSION['user'] = $data['no_induk'];
                                        $_SESSION["login"] = true;
                                        header('location: admin/dashboard-admin.php');
                                    }else{
                                        $_SESSION['user'] = $data['no_induk'];
                                        $_SESSION["login"] = true;
                                        header('location: index.php');
                                    }
                                }
                            }else{
                                ?>
                                <div class= "alert alert-danger" role="alert" >
                                    <p>Username tidak tersedia</p>
                                </div>
                                <?php
                            }
                        }
                    }
                    
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- ----------- -->
</body>

</html>