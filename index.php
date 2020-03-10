<?php
    include "connection.php";

    $error = '';
    if(isset($_POST['btn_login'])){
        if (empty($_POST['username']) || empty($_POST['password'])) {
            //$error = "Username or Password is invalid";
            header("Location: index.php");
        } else{
            session_start();
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query_db_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
            $user = mysqli_fetch_assoc($query_db_user);
            $query_db_profile = mysqli_query($conn, "SELECT * FROM profile WHERE username = '$username'");
            $profile = mysqli_fetch_assoc($query_db_profile);

            if(mysqli_num_rows($query_db_user) == 1){
                $_SESSION['user'] = $user;
                $_SESSION['profile'] = $profile;
                header("Location: feed.php");
            } else{}
            mysqli_close($conn);
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Vietgram | Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Vietgram, like Instagram but with Pho" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <main id="login">
            <div class="login__column">
                <img src="images/phoneImage.png" class="login__phone" />
            </div>
            <div class="login__column">
                <div class="login__box">
                    <img src="images/loginLogo.png" class="login__logo" />
                    <form action="" method="post" class="login__form">
                        <input type="text" name="username" placeholder="Username" required />
                        <input type="password" name="password" placeholder="Password" required />
                        <input type="submit" value="Log in" name="btn_login"/>
                    </form>
                    <span class="login__divider">or</span>
                    <a href="#" class="login__link">
                        <i class="fa fa-money"></i>
                        Log in with Facebook
                    </a>
                    <a href="#" class="login__link login__link--small">Forgot password</a>
                </div>
                <div class="login__box">
                    <span>Don't have an account?</span> <a href="#">Sign up</a>
                </div>
                <div class="login__box--transparent">
                    <span>Get the app.</span>
                    <div class="login__appstores">
                        <img src="images/ios.png" class="login__appstore" alt="Apple appstore logo" title="Apple appstore logo" />
                        <img src="images/android.png" class="login__appstore" alt="Android appstore logo" title="Android appstore logo" />
                    </div>
                </div>
            </div>
        </main>
        <footer class="footer">
            <div class="footer__column">
                <nav class="footer__nav">
                    <ul class="footer__list">
                        <li class="footer__list-item"><a href="#" class="footer__link">About Us</a></li>
                        <li class="footer__list-item"><a href="#" class="footer__link">Support</a></li>
                        <li class="footer__list-item"><a href="#" class="footer__link">Blog</a></li>
                        <li class="footer__list-item"><a href="#" class="footer__link">Press</a></li>
                        <li class="footer__list-item"><a href="#" class="footer__link">Api</a></li>
                        <li class="footer__list-item"><a href="#" class="footer__link">Jobs</a></li>
                        <li class="footer__list-item"><a href="#" class="footer__link">Privacy</a></li>
                        <li class="footer__list-item"><a href="#" class="footer__link">Terms</a></li>
                        <li class="footer__list-item"><a href="#" class="footer__link">Directory</a></li>
                        <li class="footer__list-item"><a href="#" class="footer__link">Language</a></li>
                    </ul>
                </nav>
            </div>
            <div class="footer__column">
                <span class="footer__copyright">© 2017 Vietgram</span>
            </div>
        </footer>
    </body>
</html>