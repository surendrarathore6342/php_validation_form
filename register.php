    <?php
    include 'config.php';
    $nameError = "";
    $emailError = "";
    $passwordError = "";
    $phoneError = "";
    $conditon = 0;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $mobile = trim($_POST['mobile_number']);
    
        // Name Validation
        if (empty($name) ){
            $conditon = 1;
            $nameError = "please enter a valid name";
        }
        else{
            if(strlen($name) <= 6)
            $nameError = "please select length 6";
        }
        // Email validation
        if (empty($email) ) {
            $conditon = 1;
            $emailError = "Please enter a valid email";
        }else{
            if(strpos($email, '@') === false || strpos($email, '.' ) === false)
            $emailError = "please enter the @ and . charters";
        }
        // Password Validation
        if (empty($password)){
            $conditon = 1;
            $passwordError = "Please Enter A Valid Password";
        }
        else{
            if(strlen($password) <= 6 )
            $passwordError = "please select length 6";  
        }
        // Mobile Number Validation
        if (empty($mobile) ) {
            $conditon = 1;
            $phoneError = "Please enter a valid mobile number";
        }
        else{
            if(strlen($mobile) <= 13 )
            $phoneError = "please select length 13";  
        }
        if(!$conditon){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $mobile_number = $_POST['mobile_number'];
            $password = $_POST['password'];
            
            $sql = "INSERT INTO register_users (name, email, mobile_number, password) VALUES ('$name','$email','$mobile_number','$password')";

            if ($arr->query($sql) === TRUE) {
                header("Location: login.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $arr->error;
            }
            $arr->close();
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Form</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            .error {color: red;}
        </style>
    </head>
    <body>
        <div class="contact-form spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-3">
                        <div class="contact_form_title">
                            <h2>Register form</h2>
                        </div>
                    </div>
                </div>
                <form method="post">
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="form-group">
                            <label for="name">NAME :-</label>
                                <input type="text" name="name" placeholder="Name" class="form-control">
                                <span class="error"><?php if (!empty($nameError)) echo $nameError; ?></span>
                            </div>
                        </div>
                        <div class="col-md-6 offset-3">
                            <div class="form-group">
                            <label for="email">EMAIL :-</label>
                                <input type="text" name="email" placeholder="Email" class="form-control">
                                <span class="error"><?php if (!empty($emailError)) echo $emailError; ?></span>
                            </div>
                        </div>
                        <div class="col-md-6 offset-3">
                            <div class="form-group">
                            <label for="password">PASSWORD :-</label>
                                <input type="text" name="password" placeholder="Password" class="form-control">
                                <span class="error"><?php if (!empty($passwordError)) echo $passwordError; ?></span>
                            </div>
                        </div>
                        <div class="col-md-6 offset-3">
                            <div class="form-group">
                            <label for="phone">PHONE NUMBER :-</label>
                                <input type="text" name="mobile_number" placeholder="phone" class="form-control">
                                <span class="error"><?php if (!empty($phoneError)) echo $phoneError; ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="site-btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
    </html>
