<?php
include_once "Header.php";
ob_start();
session_start();
?>



<h2 style="margin-left:10rem; margin-top:5rem;">Enter Username and Password</h2> 
<?php
$msg = '';
$users = ['user' => "test", "manager" => "secret", "guest" => "abc123"];

if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $user = $_POST['username'];
    if (array_key_exists($user, $users)) {
        if ($users[$_POST['username']] == $_POST['password']) {
            $_SESSION['valid'] = true;
            $_SESSION['username'] = $_POST['username'];
            $msg = "You have entered correct username and password";
            //send to shop page (Read page???)
            header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley", true, 301);
            exit();

        } else {
            $msg = "Password not found";
        }
    } else {
        $msg = "Username not found";
    }
}

?>


<h4 style="margin-left:10rem; color:red;"><?php echo $msg; ?></h4>
<br/><br/>
    <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div>
        <label for="username">Username:</label>
        <input type="text" name="username" id="name">
        </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
        <section style="margin-left:2rem;">
            <button type="submit" name="login">Login</button>
            <br />
            <a href="../Pages/LoginPage.php">Sign up</a>
        </section>
    </form>

    <p style="margin-left: 2rem;"> 
        <a href = "logout.php" tite = "Logout">Click here to clean Session.</a>
    </p> 



<?php
include_once "Footer.php";
?>