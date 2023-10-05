<?php

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
            echo "User already exit";
        } else {

            $MySql = "insert into `registration`(username, password)
            values ('$username', '$password')";

            $thisResult = mysqli_query($connect, $MySql);

            if ($thisResult == true) {
                echo " Signup successfully";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>