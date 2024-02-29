<?
include "index.php";
if ($_POST['pwd']) {
    $userpass = $_POST['pwd'];
    if ($userpass == $password) {
        $myfile = fopen("date.txt", "w") or die("Unable to open file!");
        $txt = $currentdate;
        fwrite($myfile, $txt);
        fclose($myfile);
        mysqli_query($conn, $sql2);
        header("Location: http://yoeyytimer.great-site.net/index.php?sucess=true");
    }
    else {
        header("Location: http://yoeyytimer.great-site.net/fail.php");
    }
}
