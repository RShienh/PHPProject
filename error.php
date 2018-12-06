<?php
session_start();
?>
<html>
<head>
    <title>
        Error
    </title>
</head>
<body>
<canvas id="background"></canvas>
<div class="grid">
    <?php include 'navbar.php' ?>
    <div class="header"></div>
    <div class="sidebar">
        <div class="container shadow fadeInDown animated" style="text-align: center">
            <div class="form">
                <h1>Error</h1>
                <p>
                    <?php
                    if (isset($_SESSION['message']) AND !empty($_SESSION['message'])):
                        echo $_SESSION['message'];
                    else:
                        header("location: index.php");
                    endif;
                    ?>
                </p>
                <a href="index.php" class="bttn shadow fadeInUp animated"
                   style="vertical-align: bottom; margin-top: 125%">Home</a>
                </form>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</div>
<script src="js/canvas.js"></script>
<script src="js/wow.js"></script>
</body>
</html>
