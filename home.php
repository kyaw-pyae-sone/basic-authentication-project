<?php require_once("./header.php") ?>

    <h1 class="text-white bg-dark p-5 text-center">Welcome from Home</h1>

    <div class="text-end">
        <a href="logout.php">
            <button class="btn btn-danger btn-sm text-white shadow-sm px-4 me-4"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>
        </a>
    </div>

    <?php
    
        session_start(); // to use session, need to start first

        echo "<pre>";

        if(!isset($_SESSION["registration_data"])){
            header("Location:login.php"); // redirecting to login for users not registered
        }
    
    ?>

<?php require_once("./footer.php") ?>