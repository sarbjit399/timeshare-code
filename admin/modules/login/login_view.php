<script type="text/javascript">
    var DEFAULT_URL = "<?= DEFAULT_URL ?>"; // Do not remove this line
</script>
<script src="<?= DEFAULT_URL ?>/assets/js/jquery.1.11.1.js" type="text/javascript"></script>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <!-- Bootstrap -->
        <link href="<?= DEFAULT_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?= DEFAULT_URL ?>/assets/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?= DEFAULT_URL ?>/assets/css/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="<?= DEFAULT_URL ?>/assets/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

        <script type="text/javascript" src="<?= DEFAULT_URL ?>/assets/js/jquery.validate.min.js"></script>

    </head>
    <body id="login">
        <div class="container">
            <div  id="msgs">
                </div>
            <form class="form-signin" action="javascript:void(0);" method="post" id="login_form" name="login_form">
                <h2 class="form-signin-heading">Please sign in</h2>
                <input type="text" class="input-block-level" name="username" placeholder="Email address">
                <input type="password" name="password" class="input-block-level" placeholder="Password">
                <!--                <label class="checkbox">
                                    <input type="checkbox" value="remember-me"> Remember me
                                </label>-->
                <input class="btn btn-large btn-primary" id="login_btn" type="submit" value="Sign in"/>
            </form>

        </div> <!-- /container -->
        <!--<script src="<?= DEFAULT_URL ?>/assets/vendors/jquery-1.9.1.min.js"></script>-->

        <script src="<?= DEFAULT_URL ?>/assets/js/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>


<!--validate login form-->
<script>
     $(document).ready(function() {
         /**
          * validate form
          */
         $("body").on("click", "#login_btn", function() {
             $("#login_form").validate({
                 rules: {
                     username: {
                         required: true
                     },
                     password: {
                         required: true
                     }
                 },
                 messages: {
                     username: {
                         required: "Please enter username"
                     },
                     password: {
                         required: "Please enter password"
                     }

                 },
                 submitHandler: function(form) {
                     var dataString = "method=login_check&" + $("#login_form").serialize();
                     $.ajax({
                         data: dataString,
                         url: DEFAULT_URL + '/admin/ajax/login_check.php',
                         type: "post",
                         success: function(data) {
                             if (data == 'success') {
                                var HTML='Login Successfully. Redirecting....';
                                 $("#msgs").html(HTML);
                                 setTimeout(function() {
                                     window.location.href = DEFAULT_URL + '/admin/dashboard/';
                                 }, 3000);
                             } else {
                                 var HTML='Invaild username or password.Please try again....';
                                 $("#msgs").html(HTML);
                             }
                         }
                     });
                 }


             });

         });

     });</script>