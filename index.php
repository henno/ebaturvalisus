<?php
session_start();

// Redirect user to login.php if not logged in
if(empty($_SESSION['user_id'])){
    header('Location: login.php');
    exit();
}

require 'classes/Post.php';
var_dump($_POST);

require 'config.php';
require 'database.php';

if (!empty($_POST)) {
    insert('posts', $_POST);
}

$posts = Post::get_all();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- Custom styles for this template -->

</head>

<body>

<div class="container">

    <button class="btn btn-default" onclick="function logout() {location.href= 'logout.php';}logout()">Logout</button>

    <a href="admin.php">Admin</a>
    <ul class="list-group">
        <?php foreach ($posts as $post): ?>
            <li class="list-group-item">
                <b><?= $post['post_author'] ?></b><br>
                <?= $post['post_content'] ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <form method="post">
        <div class="row">
            <div class="col-md-12">
                <b>Your post:</b>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Author
                    <input type="text" name="post_author"><br>
                </label><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>
                    <textarea name="post_content" id="" cols="30" rows="10"></textarea>
                </label><br>
                <input type="submit" class="btn btn-primary">
            </div>
        </div>
    </form>


    <iframe src="kurjus.php" style="display: block"></iframe>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
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
