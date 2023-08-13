<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Trade Visitor</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <?php if ($user) { ?>
        <script>
            window.location.pathname = "/dashboard";
        </script>
    <?php } ?>
</head>

<body class="antialiased">
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="card">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item text-center">
                    <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link btr" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Signup</a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link btr" id="pills-password-tab" data-toggle="pill" href="#pills-password" role="tab" aria-controls="pills-password" aria-selected="false">Reset User</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="form px-4 pt-5">
                        <form>
                            <input type="text" name="emailSignIn" class="form-control" placeholder="Email or Phone">
                            <br />
                            <input type="password" name="passSignIn" class="form-control" placeholder="Password" onkeydown="event.key === 'Enter'?signIn():null">
                            <br />
                            <input type="button" class="btn btn-success btn-block" onclick="signIn()" value="Sign In">
                            <br />
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="form px-4">
                        <form>
                            <input type="numer" name="csrf" class="form-control" placeholder="CSRF">
                            <br />
                            <input type="text" name="name" class="form-control" placeholder="Name">
                            <br />
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            <br />
                            <input type="password" name="pass" class="form-control" placeholder="Password" autocomplete="new-password">
                            <br />
                            <input type="password" name="confirmPass" class="form-control" placeholder="Confirm Password" autocomplete="new-password">
                            <br />
                            <input type="button" class="btn btn-primary btn-block" onclick="signUp()" value="Sign Up">
                            <br />
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab">
                    <div class="form px-4">
                        <form>
                            <input type="email" name="forgotEmail" class="form-control" placeholder="Email">
                            <br />
                            <input type="password" name="forgotPassOld" class="form-control" placeholder="Old Password" autocomplete="new-password">
                            <br />
                            <input type="password" name="forgotPassNew" class="form-control" placeholder="New Password" autocomplete="new-password">
                            <br />
                            <input type="password" name="forgotPassConfirmNew" class="form-control" placeholder="New Password Confirm" autocomplete="new-password">
                            <br />
                            <input type="button" class="btn btn-danger btn-block" onclick="resetPass()" value="Reset Password">
                            <br />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/signUp.js') }}"></script>
</body>

</html>