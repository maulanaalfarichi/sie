<!doctype html>
<html class="no-js" lang="en">
<head>
<link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/icon/g.png') }}">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Masuk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="login-area login-bg">
        <div class="container">
            <div class="login-box ptb--50">
                <form id="loginForm" name="loginForm" role="form" method="POST" action="javascript:void(0)">
                    <div class="login-form-head">
                        <h4>Masuk</h4>
                        <p>Sistem Informasi Eksekutif</p>
                    </div>
                    <div class="login-form-body">
                        <span id="form_result_table"></span>
                        <div class="form-gp">
                            <label for="exampleInputName1">Email</label>
                            <input type="text" id="email" name="email">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="password" name="password">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                </div>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button type="submit" id="loginBtn">Login <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script>
        if ($("#loginForm").length > 0) {
            $("#loginForm").validate({
                rules: {
                    email: {
                        required: true,
                        maxlength: 50,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },   
                },
                messages: { 
                    email: {
                        required: "Email harus diisi!",
                        email: "Email tidak valid!",
                        maxlength: "Email maksimal 50 karakter!",
                    },
                    password: {
                        required: "Password harus diisi!",
                        minlength: "Password minimal 6 karakter!"
                    }, 
                },
                submitHandler: function(form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        data: $('#loginForm').serialize(),
                        url: '{{ route("prosesLogin") }}',
                        type: 'POST',
                        dataType: 'json',
                        beforeSend: function() {
                            $('#loginBtn').html('Proses..');
                            $('#loginBtn').prop('disabled', true);
                        },
                        success: function(data) {
                            var html = '';
                            if(data.errors) {
                                html = '<div class="alert alert-danger">';
                                for(var count = 0; count < data.errors.length; count++) {
                                    html += data.errors[count] + '<br>';
                                }
                                html += '</div>';
                                $('#loginBtn').removeAttr('disabled');
                                $('#loginBtn').html('Login');
                            }
                            if(data.error_login) {
                                html = '<div class="alert alert-danger">' + data.error_login + '</div>';
                                $('#email').val('');
                                $('#password').val('');
                                $('#loginBtn').removeAttr('disabled');
                                $('#loginBtn').html('Login');
                            }
                            if(data.success) {
                                //$('#loginBtn').html('Data ditemukan..');
                                location.reload(true);
                            }
                            $('#form_result_table').html(html);
                        },
                        error: function(xhr, status, error) {
                            let json = JSON.parse(xhr.responseText);
                            let message = json.message;
                            html = '<div class="alert alert-danger">' + message + '.</div>';
                            $('#loginBtn').removeAttr('disabled');
                            $('#loginBtn').html('Login');
                            $('#form_result_table').html(html);
                        }
                    });
                }
            }); 
        }
    </script>
</body>

</html>