<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>

    <body>        
        <div class="container-fluid " >
            <div class="" style="margin-top:5%">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                            <h3 class="text-primary">Login</h3>
                        </div>
                        <div class="p-4">
                            <form >
                                <!-- <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div> -->
                                <div class="input-group mb-3 form-group">                                   
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-envelope text-white"></i></span>
                                    <input type="text" id="username" class="form-control" placeholder="Email / Username" name="username">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-key-fill text-white"></i></span>
                                    <input type="password" id="password" class="form-control" placeholder="password"
                                    name="password"
                                    >
                                </div>
                                <div class="d-grid col-12 mx-auto">
                                    <button class="btn btn-primary" type="button" name="submit"
                                    onclick="submitform()" ><span></span> Sign In</button>
                                </div>                               
                                
                                <p class="text-center mt-3">Not have an account?
                                    <span class="text-primary"><a href="registration.php">Create New</a></span>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<script>
    /*Custom fucntion to validate data and submit data thorugh ajax*/
    function submitform() {
        /*falg to check the data, if there is an error, flag will turn to 1*/
        var flag = 0;
        /*Checking the value of inputs*/
        var username = $('#username').val();
        var password = $('#password').val();
        /*Validating the values of inputs that it is neither null nor undefined.*/
        if (username == '' || username == undefined) {
            $('#username').css('border', '1px solid red');
            flag = 1;
        }
        if (password == '' || password == undefined) {
            $('#password').css('border', '1px solid red');
            flag = 1;
        }
        /*if there is no error, go to flag==0 condition*/
        if (flag == 0) {
            /*Ajax call*/
            $.ajax({
                url: "<?php echo base_url('/Home/getLogin') ?>",
                method: 'POST',
                data: "UserName=" + username + "&Password=" + password,
                success: function (result) {
                    /*result is the response from LoginController.php file under getLogin.php function*/
                    if (result == 1) {
                        /*if response result is 1, it means it is successful.*/
                        $('#username').css('border', '1px solid green');
                        $('#password').css('border', '1px solid green');
                        setTimeout(function () {
                            /*Redirect to login page after 1 sec*/
                            window.location.href = '<?php echo base_url("index.php/LoginController/dashboard") ?>';
                        }, 1000)
                    } else if (result == 2) {
                        /*if response result is 2, it means, username is invalid.*/
                        $('#username').css('border', '1px solid red');
                        alert('Invalid Username');
                    } else if (result == 3) {
                        /*if response result is 3, it means, password is invalid.*/
                        $('#password').css('border', '1px solid red');
                        alert('Invalid Password');
                    } else if (result == 4 || result == 5) {
                        /*if response result is 4 or 5, it means, username & password are invalid.*/
                        $('#username').css('border', '1px solid red');
                        $('#password').css('border', '1px solid red');
                        alert('Invalid Username & Passowrd');
                    } else {
                        alert('Something went wrong');
                    }
                }
            });
        } else {
            alert('Something went wrong');
        }
    }
</script>