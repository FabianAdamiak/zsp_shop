<html>
<head>
    <meta charset="UTF-8">
    <title>OLX dla gorszych</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $db = new mysqli("localhost", "root", "", "shop");

    if(isset($_POST["out"])){
        if($_POST["out"] == 1){
            setcookie("userID", NULL);
            header('Location: index.php');
        }
    }

    if(!isset($_COOKIE["userID"])){
        if(isset($_POST["login"]) && isset($_POST["password"])){
            $sql = "SELECT `id` FROM `account` WHERE `login`='".$_POST["login"]."' AND `password`='".md5($_POST["password"])."';";

            if($res = $db->query($sql))
                if(mysqli_num_rows($res) != 0){
                    $logedID = $res->fetch_assoc()["id"];
                    setcookie("userID", $logedID);
                    header('Location: index.php');
                    {
                        </html>