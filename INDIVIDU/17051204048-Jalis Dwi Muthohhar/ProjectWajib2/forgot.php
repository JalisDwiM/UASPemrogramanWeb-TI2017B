<?php
include "header.php";
if(isset($_POST['forgot'])){
    $email = $_POST['email'];
    $stmt = $dbh->prepare('SELECT * FROM loginphp WHERE email=?');
    $stmt->bindParam(1,$email);
    $stmt->execute();
    $row = $stmt->fetch();
    $email2 = $row['email'];
    $hash = $row['hash'];
    $un = $row['username'];
    if($email==$email2){
        $to      = $email;
        $subject = 'Forgot password multi login';
        $message = '

        Forgot your password

        ------------------------
        Username: '.$un.'
        ------------------------

        Please click this link to set new password:
        http://localhost/loginphp'.$email.'&hash='.$hash.'

        ';

        //$headers = 'From:noreply@kautube.com' . "\r\n";

        //echo '<div class="alert alert-success" role="alert">Email has been sent to your email</div>';
    } else{
        echo '<div class="alert alert-danger" role="alert">Your email is not registered</div>';
    }
}
?>
<div class="panel panel-default" style="margin-top:80px;">
    <div class="panel-body">
        <h3 class="text-center" style="font-weight:bolder;margin:10px 0; color:orange;">Forgot Password</h3>
        <form method="post">
            <div class="form-group">
                <label for="email">Enter your email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email Anda" required/>
            </div>
            <button type="submit" name="forgot" class="btn btn-warning btn-block">Kirim</button>
            <p style="clear:both;">
                <div style="float:left;"><a href="index.php">Login Area</a></div>
                <div style="float:right;"><a href="register.php">Register New User</a></div>
            </p>
        </form>
    </div>
</div>
<?php
include "footer.php";
?>