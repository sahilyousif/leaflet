<?php
session_start();

$userinfo = array(
    'admin'=>'bbpass12',
    'user1'=>'bbpass12'
    );

if(isset($_GET['logout'])) {
    $_SESSION['username'] = '';
    header('Location:  ' . $_SERVER['PHP_SELF']);
}

if(isset($_POST['username'])) {
    if($userinfo[$_POST['username']] == $_POST['password']) {
        $_SESSION['username'] = $_POST['username'];
        header("Location: index2.php");
        exit;
    }else {
        //Invalid Login
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- <?php if($_SESSION['username']): ?> -->
<!--             <p>You are logged in as <?=$_SESSION['username']?></p>
            <p><a href="?logout=1">Logout</a></p>

        <?php endif; ?> -->
        <div class="wrapper">
            <div class="container">
                <h1>Buyers Beware</h1>
                <form name="login" action="" method="post" class="form">
                    <input type="text" name="username" value="" placeholder="Username" /><br />
                    <input type="password" name="password" value="" placeholder="password" /><br />
                    <button type="submit" name="submit" value="Submit" >Login</button>
                </form>
            </div>

            <ul class="bg-bubbles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    </body>
    </html>