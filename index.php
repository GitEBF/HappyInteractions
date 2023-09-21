<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Index</title>
</head>
<body>
    <?php
      session_unset();
      session_destroy();
    ?>
    <?php
        //database informations
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $db = "happyinteractions";
        $table = "user";

        //Create Connection to DB
        $conn = new mysqli($servername, $username, $password, $db);
        // Check Connection of DB
        if ($conn->connect_error) {
            die("Connection failed " . $conn->connect_error);
        }
        ?>



        <div class="container">
  <div class="button" id="loginButton">
    <div class="icon" id="buttonIcon">
      <i class="fa fa-user"></i>
    </div>
  </div>

  <div class="sidebar" id="loginSidebar">
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                Nom : <input type="text" name="name"><br>
                Mot de passe : <input type="password" name="password"> <br>
                <input type="submit">
            </form>
  </div>
</div>
<?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = $_POST['name'];
            $password = $_POST['password'];

            //$password = md5($password,false);

            $servernamebd = "localhost";
            $usernamebd = "root";
            $passwordbd = "root";
            $dbname = "happyinteractions";
            $connn = new mysqli($servernamebd,$usernamebd,$passwordbd,$dbname);

            if ($connn->connect_error) {
                die("Connection failed: " . $connn->connect_error);
            }   

            $sqll = "SELECT * FROM user where name='$user' and password='$password'";
            $result = $connn->query($sqll);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION["connexion"] = true;
            }
            else {
                echo "Nom ou mot de passe invalide";
                $_SESSION["connexion"] = false;
            }
            $connn->close(); }
          ?>


    <script src="js/main.js"></script>
       
    </body>
</html>