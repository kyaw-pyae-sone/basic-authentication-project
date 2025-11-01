<?php require_once("./header.php"); ?>


    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <form action="" method="POST">
                    <div class="my-2">
                        <input type="email" name="email" id="" class="form-control shadow-sm w-100" placeholder="Enter Email..." value="<?php if(isset($_POST["btn-login"])){echo $_POST['email'];}?>">
                        <?php 
                            if(isset($_POST["btn-login"])){
                                $emailStatus = $_POST["email"] == "" ? false : true;

                                echo $emailStatus ? "" : "<small class='text-danger'>Email is required</small>";
                            }
                        ?>
                    </div>
                    <div class="my-2">
                        <input type="password" name="password" id="" class="form-control shadow-sm w-100" placeholder="Enter Password..." value="<?php if(isset($_POST["btn-login"])){echo $_POST['password'];}?>" />
                        <?php 
                            if(isset($_POST["btn-login"])){
                                $passwordStatus = $_POST["password"] == "" ? false : true;

                                echo $passwordStatus ? "" : "<small class='text-danger'>Password is required</small>";
                            }
                        ?>
                    </div>
                    <div class="my-2">
                        <input type="submit" name="btn-login" id="" class="btn bg-dark text-white w-100 shadow-sm" value="Login">
                    </div>
                </form>

                <?php 
                
                    if(isset($_POST["btn-login"])){
                        $loginEmail = $_POST["email"];
                        $loginPassword = $_POST["password"];

                        if($emailStatus && $passwordStatus){
                            session_start(); // to use session

                            echo "<pre>";

                            if(isset($_SESSION["registration_data"])){
                                // print_r($_SESSION["registration_data"]);

                                $registerEmail = $_SESSION["registration_data"]["email"];
                                $registerPassword = $_SESSION["registration_data"]["hashPassword"];

                                if( $loginEmail == $registerEmail && password_verify($loginPassword, $registerPassword) ){
                                    header("Location:home.php");
                                }else{
                                    echo "<p class='text-white bg-danger text-center fw-bold p-3 w-100'>Credential Do Not Match...</p>";    
                                }

                            }else{
                                echo "<p class='text-danger bg-warning text-center fw-bold p-3 w-100'>you need to register first <a href='./register.php'>Register Here</a></p>";
                            }
                        }
                    }

                ?>
            </div>
        </div>
    </div>

<?php require_once("./footer.php"); ?>