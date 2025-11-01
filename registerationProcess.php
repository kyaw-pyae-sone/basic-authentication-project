<?php 

    // function for strong password checking by using preg_match(pattern, password)
    function strongPasswordCheck($password) {
        $upperCaseStatus = preg_match("/[A-Z]/", $password);
        $lowerCaseStatus = preg_match("/[a-z]/", $password);
        $numberStatus = preg_match("/[0-9]/", $password);
        $specialCharacterStatus = preg_match("/[!@#$%^&*]/", $password);
        $lengthStatus = strlen($password) >= 6 ? true : false;

        return ($upperCaseStatus && $lowerCaseStatus && $numberStatus && $specialCharacterStatus && $lengthStatus) ? true : false;
            
    }

    if(isset($_POST["btn-create"])) {

        // getting data from POST
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm-password"];

        
        if($nameStatus && $emailStatus && $passwordStatus && $confirm_passwordStatus){ // all field must have value
            
            if ($password == $confirm_password) {
                
                $strongStatus = strongPasswordCheck($password);

                if($strongStatus){
                    
                    $data = [
                        "name" => $name,
                        "email" => $email,
                        "hashPassword" => password_hash($password, PASSWORD_BCRYPT)
                    ];

                    print_r($data);

                    session_start(); // to start session,

                    $_SESSION["registration_data"] = $data; // data insert into session with the name of registration data

                    header("Location:home.php");

                }else{
                    // message for weak password
                    echo '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Password is not Strong.</strong> Try Again!!!
                            <small>
                                <ul>
                                    <li>At least one capital letter</li>
                                    <li>At least one small letter</li>
                                    <li>At least one number</li>
                                    <li>At least one special character</li>
                                    <li>Password length must be over 6</li>
                                </ul>
                            </small>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    ';
                }
            
            }else{
                
                // message for password not same
                echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Password Not Same. Try Again !!! </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';
            }   
        }
    }

