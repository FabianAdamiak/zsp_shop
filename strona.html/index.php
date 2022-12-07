<html>
    <head>
    <meta charset="UTF-8">
    <title>sklep dla ubogich</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form  method="POST">
                        <h2>LOGIN</h2>
                        <h2><a href="register.php" style="">SIGN UP</a></h2>
    
                        <label>Email</label>    
                        <input type="text" name="login" id="login" placeholder="login"><br>
                        <label>Password</label>
                        <input type="password" name="haslo" id="haslo" placeholder="podaj haslo"><br> 
                        <button type="submit">Login</button>
        </form>
<?php
            $con = new mysqli('localhost','root','','zsp-shop');
            if (isset($_POST["login"]) && isset($_POST["haslo"])){
                $t = "SELECT id FROM users WHERE login='".$_POST["login"]."' AND password='".$_POST["haslo"]."'";
                $result = $con->query($t);
                $id = $result->fetch_all(MYSQLI_ASSOC);
                if (count($id)>0){
                        session_start();
                        $_SESSION["user_email"] = $_POST["login"];
                        header("location:Strona.php");
                }
                else{
                        print("Nieprawidłowy login lub hasło");
                
                };
            };
        
        ?>
    </body>
    
</html>