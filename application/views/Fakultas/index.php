<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo site_url('/'); ?>assets/bootstrap-3.3.6-dist/css/bootstrap.min.css" />
        <title>WEB SRVS :: LOGIN</title>
        <style type="text/css">
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 530px;
  padding: 15px;
  margin: 0 auto;
}

#result {
  max-width: 530px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
        </style>
    </head>
    <body>
        
    <div class="container">

        <form class="form-signin" onsubmit="return dosubmit()">
            <h2 class="form-signin-heading">::Login::</h2>

            <label for="inputEmail" class="sr-only">USERNAME</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="username" required autofocus>

            <label for="inputPassword" class="sr-only">PASSWORD</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="password" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            
            &nbsp;
            
            <div class="alert alert-warning" id="result">
                    RESPONSE :
            </div>

        </form>
        
        

    </div> <!-- /container -->
    
    </body>
    <script src="<?php echo site_url('/'); ?>assets/jquery-2.2.3/jquery-2.2.3.min.js" ></script>
    <script src="<?php echo site_url('/'); ?>assets/bootstrap-3.3.6-dist/js/bootstrap.min.js" ></script>
    <script type="text/javascript">
        function dosubmit(){
            var d = $('form').serialize();
            $( "#result" ).html( 'RESPONSE : Loading...');
            $.post("<?php echo site_url('index.php/fakultas/dologin'); ?>",d, function( data ) {
                if(data == 1){
                    window.location.href = '<?php echo site_url('index.php/fakultas/home') ?>';
                }
                $( "#result" ).html( 'RESPONSE : ' + data );
            });
            return false;
        }
    </script>
</html>
