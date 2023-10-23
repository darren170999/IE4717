<?php include('assets/php/connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pure Frames</title>
	<meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/loginStyle.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="index.php">
                <img id="home-logo" src="../IE4717/assets/img/pureframeofficiallogodesign-1.png">
                <img id="home-logo" src="../IE4717/assets/img/name-only-11.png"> 
            </a>
        </div>
        <ul class="nav-list">
            <li><a href="location.html">Location</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="profile.html">UserProfile</a></li>
            <li><a href="loginSignUp.php">Login/SignUp</a></li>
        </ul>
    </div>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="register.php" method="post">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="username" name="username"/>
                <input type="password" placeholder="password" name="password"/>
                <input type="password" placeholder="Re-enter password" name="password2"/>
                <input type="email" placeholder="email" name="email" />
                <input type="int" placeholder="contact" name="contact" />
                <button>
                    <input type="submit" name="submit" value="Sign Up">
                </button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="signIn.php" method="POST">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="text" placeholder="username" name="username"/>
                <input type="password" placeholder="password" name="password"/>
                <a href="#">Forgot your password?</a>
                <button>
                    <input type="submit" name="signin" value="Sign in">
                </button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../IE4717/assets/js/sliding.js"></script>
<footer>    
    <div id="footer-copyright">
        <small><i>Copyright &copy; 2023 PureFrames</i></small>
    </div>
</footer>
</html>
