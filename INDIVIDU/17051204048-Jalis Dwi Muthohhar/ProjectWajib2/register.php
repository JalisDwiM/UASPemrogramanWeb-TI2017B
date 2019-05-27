<?php
include "header.php";
if(isset($_POST['reg'])){
    $fn = $_POST['fullname'];
    $em = $_POST['email'];
    $un = $_POST['username'];
    $pw = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $tp = $_POST['type'];
    $hash = md5(rand(0,1000));
    try {
        $stmt = $dbh->prepare("INSERT INTO loginphp VALUES('',?,?,?,?,?,'0',?)");
        $stmt->bindParam(1,$fn);
        $stmt->bindParam(2,$em);
        $stmt->bindParam(3,$un);
        $stmt->bindParam(4,$pw);
        $stmt->bindParam(5,$tp);
        $stmt->bindParam(6,$hash);
        if($stmt->execute()){
            $to      = $em;
            $subject = 'Register Verification Multi Login';
            $message = '

            Thanks for signing up!
            Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

            ------------------------
            Username: '.$un.'
            Password: '.$_POST['password'].'
            ------------------------

            Please click this link to activate your account:
            http://localhost/loginphp'.$em.'&hash='.$hash.'

            ';

            $headers = 'From:noreply@gmail.com' . "\r\n";
            mail($to, $subject, $message, $headers);
            echo '<div class="alert alert-success" role="alert">Email has been sent for activation this account, please klik or copy link email into addressbar browser</div>';
        } else{
            echo '<div class="alert alert-danger" role="alert">Register new user error, please try again</div>';
        }
        $row = $stmt->fetch();
        $hash = $row['password'];
        $user = $row['username'];
        $full = $row['fullname'];
        $type = $row['type'];
        $act = $row['active'];
        if (password_verify($pw, $hash)) {
            if($act=='0'){
                echo '<div class="alert alert-danger" role="alert">Password is valid!</div>';
                session_start();
                $_SESSION['username'] = $user;
                $_SESSION['fullname'] = $full;
                $_SESSION['type'] = $type;
                ?>
                <script>location.href="admin/index.php"</script>
                <?php
            } else{
                echo '<div class="alert alert-warning" role="alert">Account is not active, please open your email inbox and click link activation.</div>';
            }
        } else {
            
        }
    } catch (PDOException $e) {
        echo 'Error: ',  $e->getMessage(), "\n";
    }
}
?>
<div class="panel panel-default" style="margin-top:80px;">
    <div class="panel-body">
        <h3 class="text-center" style="font-weight:bolder;margin:10px 0; color:darkblue;">User Register</h3>
        <form method="post">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Nama Lengkap" required/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Surel Anda" required/>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Nama Pengguna" required/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Kata Sandi" required/>
            </div>
            <div class="form-group">
                <label for="type">Type User</label>
                <select id="type" name="type" class="form-control">
                    <option>Administrator</option>
                    <option>Guru</option>
                    <option>Siswa</option>
                </select>
            </div>
            <button type="submit" name="reg" class="btn-block">Register</button>
            <p style="clear:both;">
                <div style="float:left;"></div>
                <div style="float:right;"><a href="index.php">Login</a></div>
            </p>
        </form>
    </div>
</div>
<?php
include "footer.php";
?>