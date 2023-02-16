
<?php
include './include/db_conn.php';

$sttus;

$user_id_auth = ltrim($_POST['user_id_auth']);
$user_id_auth = rtrim($user_id_auth);

$pass_key = ltrim($_POST['pass_key']);
$pass_key = rtrim($_POST['pass_key']);

$user_id_auth = stripslashes($user_id_auth);
$pass_key     = stripslashes($pass_key);

if($user_id_auth=="active"  && $pass_key=="active"){
    header("location: ./secact.php");
}elseif($user_id_auth=="block"  && $pass_key=="block"){
    header("location: ./secblk.php");
}else{

    $query  = "select * from apst";
	$result = mysqli_query($con, $query);
    if (mysqli_affected_rows($con) != 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $sttus = $row['apstts'];
        }    
    }
    if($sttus=="1"){
        if($pass_key=="" &&  $user_id_auth==""){
        echo "<head><script>alert('Username and Password can be empty');</script></head></html>";
                    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        
        }
        else if($pass_key=="" ){
        echo "<head><script>alert('Password can be empty');</script></head></html>";
                    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        
        }
        else if($user_id_auth=="" ){
        echo "<head><script>alert('Username can be empty');</script></head></html>";
                    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        
        }

        else{

        $user_id_auth = mysqli_real_escape_string($con, $user_id_auth);
        $pass_key     = mysqli_real_escape_string($con, $pass_key);
        $sql          = "SELECT * FROM admin WHERE username='$user_id_auth' and pass_key='$pass_key'";
        $result       = mysqli_query($con, $sql);
        $count        = mysqli_num_rows($result);
        if ($count == 1) {
            $row = mysqli_fetch_assoc($result);
            session_start();

            $_SESSION['user_data']  = $user_id_auth;
            $_SESSION['logged']     = "start";

            $_SESSION['full_name']  = $user_id_auth;
            $_SESSION['username']=$row['Full_name'];

                header("location: ./dashboard/admin/");
        
        } else {
            include 'index.php';
            echo "<html><head><script>alert('Username OR Password is Invalid');</script></head></html>";
        }
        }
    }else {echo "<html><head><script>alert('Licence Expired | Sytem Blocked');</script></head></html>";
        header("location: ./index.php");}
}
?>
