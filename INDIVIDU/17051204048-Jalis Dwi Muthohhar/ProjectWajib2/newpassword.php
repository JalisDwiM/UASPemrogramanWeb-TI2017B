<?php
include "header.php";
if(isset($_POST['new'])){
    $pw1 = $_POST['pw1'];
    $pw2 = $_POST['pw2'];
    $email = $_POST['email'];
    $hash = $_POST['hash'];
    if($pw1==$pw2){
        $pw = password_hash($_POST['pw1'], PASSWORD_DEFAULT);
        $stmt = $dbh->prepare('UPDATE loginphp SET password=? WHERE email=? AND hash=?');
        $stmt->bindParam(1,$pw);
        $stmt->bindParam(2,$email);
        $stmt->bindParam(3,$hash);
        if($stmt->execute()){
            echo '<div class="alert alert-success" role="alert">New password has been updated</div>';
            ?>
            <script>location.href='index.php'</script>
            <?php
        } else{
            echo '<div class="alert alert-danger" role="alert">Error, password is not updated</div>';
        }
    } else{
        echo '<div class="alert alert-danger" role="alert">Please input same password</div>';
    }
}
?>
<div class="panel panel-default" style="margin-top:80px;">
    <div class="panel-body">
        <h3 class="text-center" style="font-weight:bolder;margin:10px 0;">Set New Password</h3>
        <form method="post">
            <input type="hidden" name="email" value="<?php echo $_GET['email'] ?>"/>
            <input type="hidden" name="hash" value="<?php echo $_GET['hash'] ?>"/>
            <div class="form-group">
                <label for="pw1">New Password</label>
                <input type="password" id="pw1" name="pw1" class="form-control" placeholder="Kata sandi baru" required/>
            </div>
            <div class="form-group">
                <label for="pw2">Re-Enter Password</label>
                <input type="password" id="pw2" name="pw2" class="form-control" placeholder="Kata sandi ulang" required/>
            </div>
            <button type="submit" name="new" class="btn btn-primary btn-block">Update Password</button>
            <p style="clear:both;">
                <div style="float:left;"><a href="index.php">Back to login user</a></div>
                <div style="float:right;"></div>
            </p>
        </form>
    </div>
</div>
<?php
include "footer.php";
?>