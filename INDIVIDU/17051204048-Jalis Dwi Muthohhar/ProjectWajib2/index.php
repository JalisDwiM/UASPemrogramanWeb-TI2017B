<?php
session_start();
include "header.php";
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    try {
        $stmt = $dbh->prepare('SELECT * FROM loginphp WHERE username=?');
        $stmt->bindParam(1,$username);
        $stmt->execute();
        $row = $stmt->fetch();
        $hash2 = $row['password'];
        $user = $row['username'];
        $full = $row['fullname'];
        $type = $row['type'];
        $act = $row['active'];
        $verify=password_verify($password, $hash2);
        if ($verify) {
            if($act=='0'){
                //session_start();
                $_SESSION['username'] = $user;
                $_SESSION['fullname'] = $full;
                $_SESSION['type'] = $type;
                ?>
                <div class="progress">
		    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
		    <span class="sr-only">100% Complete</span>
		    </div>
		</div>
                <script>location.href="admin/index.php"</script>
                <?php
            } else{
                echo '<div class="alert alert-warning" role="alert">Account is not active, please open your email inbox and click link activation.</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Invalid password.</div>';
        }
    } catch (PDOException $e) {
        echo 'Error: ',  $e->getMessage(), "\n";
    }
}
if(isset($_GET['email']) && !empty($_GET['email'])){
    if(isset($_GET['hash']) && !empty($_GET['hash'])){
        $email = $_GET['email'];
        $hash = $_GET['hash'];
        $act = 0;
        $act2 = 1;
        $stmt = $dbh->prepare('SELECT * FROM loginphp WHERE email=? AND hash=? AND active=?');
        $stmt->bindParam(1,$email);
        $stmt->bindParam(2,$hash);
        $stmt->bindParam(3,$act);
        $stmt->execute();
        if($stmt->rowCount()){
            $stmt = $dbh->prepare('UPDATE loginphp SET active=? WHERE email=? AND hash=?');
            $stmt->bindParam(1,$act2);
            $stmt->bindParam(2,$email);
            $stmt->bindParam(3,$hash);
            if($stmt->execute()){
                echo '<div class="alert alert-success" role="alert">Your account has been activated, you can now login</div>';
            } else{
                echo '<div class="alert alert-danger" role="alert">The url is either invalid or you already have activated your account</div>';
            }
        }
    }else{
        echo '<div class="alert alert-danger" role="alert">Invalid approach, please use the link that has been send to your email</div>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login With Enkripsi md5</title>
</head>
<body>
        <h1 class="text-center">SISTEM LOGIN DAN REGISTRASI</h1>
<div class="panel panel-default" >
    <div class="panel-body">
        <img src="img/images.png" weight="70" height="70" alt="images" style="display: block; margin: auto;">
        <form method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Nama Pengguna" required/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Kata Sandi" required/>
            </div>
            <button type="submit" name="login" class="btn btn-success btn-block">Login</button>
            <p style="clear:both;">
                <div style="float:left;"><a href="lupa.php">Forgot Password</a></div>
                <div style="float:right;"><a href="register.php">Register </a></div>
            </p>
        </form>
    </div>
</div>
<?php
include "footer.php";
?>
</body>
</html>