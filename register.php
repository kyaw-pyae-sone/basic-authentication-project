<?php require_once("./header.php"); ?>


    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <form action="" method="POST">
                    <div class="my-2">
                        <input type="text" name="name" id="" class="form-control shadow-sm w-100" placeholder="Enter Name..." value="<?php if(isset($_POST["btn-create"])){echo $_POST['name'];}?>">
                        <?php 
                            if(isset($_POST["btn-create"])){
                                $nameStatus = $_POST["name"] == "" ? false : true;

                                echo $nameStatus ? "" : "<small class='text-danger'>Name is required</small>";
                            }
                        ?>
                    </div>
                    <div class="my-2">
                        <input type="email" name="email" id="" class="form-control shadow-sm w-100" placeholder="Enter Email..." value="<?php if(isset($_POST["btn-create"])){echo $_POST['email'];}?>">
                        <?php 
                            if(isset($_POST["btn-create"])){
                                $emailStatus = $_POST["email"] == "" ? false : true;

                                echo $emailStatus ? "" : "<small class='text-danger'>Email is required</small>";
                            }
                        ?>
                    </div>
                    <div class="my-2">
                        <input type="password" name="password" id="" class="form-control shadow-sm w-100" placeholder="Enter Password..." value="<?php if(isset($_POST["btn-create"])){echo $_POST['name'];}?>" />
                        <?php 
                            if(isset($_POST["btn-create"])){
                                $passwordStatus = $_POST["password"] == "" ? false : true;

                                echo $passwordStatus ? "" : "<small class='text-danger'>Password is required</small>";
                            }
                        ?>
                    </div>
                    <div class="my-2">
                        <input type="password" name="confirm-password" id="" class="form-control shadow-sm w-100" placeholder="Enter Confirm Password..." value="<?php if(isset($_POST["btn-create"])){echo $_POST['name'];}?>">
                        <?php 
                            if(isset($_POST["btn-create"])){
                                $confirm_passwordStatus = $_POST["confirm-password"] == "" ? false : true;

                                echo $confirm_passwordStatus ? "" : "<small class='text-danger'>Confirm Password is required</small>";
                            }
                        ?>
                    </div>
                    <div class="my-2">
                        <input type="submit" name="btn-create" id="" class="btn bg-dark text-white w-100 shadow-sm" value="Create Account">
                    </div>
                </form>

                <?php include_once("./registerationProcess.php") ?>
            </div>
        </div>
    </div>

<?php require_once("./footer.php"); ?>