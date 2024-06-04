<?php
session_start();
require_once("include/connection.php");
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

// If redirected from login.php
if(isset($_POST['username'])){
    $user = mysqli_real_escape_string($connect, $_POST['username']);
    $pass = md5($_POST['password']);

    // Use prepared statement for security
    $stmt = $connect->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any rows are returned
    if($result->num_rows >= 1){
        $emp_array = $result->fetch_array(MYSQLI_ASSOC);
        $_SESSION['username'] = $user;
        $_SESSION['emp_id'] = $emp_array['id'];
        $_SESSION['user_id'] = $emp_array['id'];

        if($emp_array['admin'] == 1) $_SESSION['admin'] = 1;
        if($emp_array['admin'] == 2) $_SESSION['admin'] = 2;

        // Redirect to index.php if logged in
        header("Location: index.php");
        exit();
    }
    else {
        $temp = 1;
    }
}
?>
<html>
<head>
    <title>Supermarket Management</title>
    <link rel="stylesheet" type="text/css" href="css/outline.css" />
    <link rel="stylesheet" type="text/css" href="css/menu.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/design.js"></script>
    <script type="text/javascript" src="js/validate.js"></script>
</head>
<body>
<div class="container">
    <div id="body">
        <div align="center">
            <a href='index.php'></a>
            <?php include_once("include/left_content.php"); ?>
        </div>
        <div class="mcontent">
            <div align="center">
                <strong>Login<br></strong>
                <div id="data">
                    <div align="center">
                        <?php
                        if(isset($_SESSION['username'])){
                            echo "You are logged in.";
                        }
                        else {
                            if(isset($temp)) echo "Incorrect username or password.";
                            echo "<form method='post' action='login.php'>
                                <table>
                                    <tr><td style='padding:5px'>Username:</td><td style='padding:5px'><input type='text' name='username' placeholder='Username' required /></td></tr>
                                    <tr><td style='padding:5px'>Password:</td><td style='padding:5px'><input type='password' name='password' placeholder='Password' required /></td></tr>
                                    <tr><td colspan='2' style='padding:5px;'><input type='submit' value='Login' /></td></tr>
                                </table>
                              </form>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
