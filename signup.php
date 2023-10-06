<?php
$user = 0;
$success = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'database.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    // $MySql = "insert into `registration`(username, password)
    // values ('$username', '$password')";

    // $thisResult = mysqli_query($connect, $MySql);

    // if($thisResult == true){
    //     echo " You have successfully inserted";
    // } else {
    //     echo "Check your datas";
    // }

    $MySql = "select * from `registration` where username = '$username'";

    $thisResult = mysqli_query($connect, $MySql);

    if ($thisResult) {
        $num = mysqli_num_rows($thisResult);
        if ($num > 0) {
            // echo "User already exit";
            $user = 1;
        } else {

            $MySql = "insert into `registration`(username, password)
            values ('$username', '$password')";

            $thisResult = mysqli_query($connect, $MySql);

            if ($thisResult == true) {
                // echo " Signup successfully";
                $success = 1;
                header('location:login.php');
            } else {
                echo "Check your datas";
            }
        }
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <?php
    if ($user) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry!</strong> The user name is already used.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
    }
    ?>

    <?php
    if ($success) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> The user name is already used.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="mx-auto col-10 col-md-8 col-lg-6">

                <h1 class="mb-5">Sign up Form</h1>
                <form action="signup.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" name="username"> <br />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password"><br />
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>