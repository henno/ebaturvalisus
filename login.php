<?php

var_dump($_POST);
require 'config.php';
require 'database.php';

session_start();

if (!empty($_POST)) {
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    $sql = "SELECT * FROM users WHERE username LIKE '$username' AND password = '$password'";
    echo "<hr><pre>$sql</pre><hr>";
    $user = get_first($sql);
    if (!$user) {
        $error = 'Username or password is incorrect';
    } else {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['is_admin'] = $user['is_admin'];

        header('Location: http://localhost/ebaturvalisus/index.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- Custom styles for this template -->

</head>

<body>


<div class="container">

    <h1>Please log in</h1>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger" role="alert">
            <strong><?= $error ?></strong>
        </div>
    <?php endif; ?>

    <form method="post">

        <div class="form-group has-succes|has-warning|has-danger">
            <label class="form-control-label" for="username">Username</label>
            <input type="text" class="form-control form-control-success" name="username" id="username"
                   aria-describedby="helpId">
        </div>

        <div class="form-group has-succes|has-warning|has-danger">
            <label class="form-control-label" for="password">Password</label>
            <input type="text" class="form-control form-control-success" name="password" id="password"
                   aria-describedby="helpId">
        </div>

        <input type="submit" class="btn btn-primary" value="Login">

    </form>


</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="https://maxcdn.bootstrapcdn.com/js/ie10-viewport-bug-workaround.js"></script>
<!-- Holder.js for placeholder images -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
</body>
</html>
