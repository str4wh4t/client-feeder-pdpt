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
        <title></title>
    </head>
    <body>
        <form onsubmit="return dosubmit()" >
            <div class="form-group">
                <label for="">USERNAME</label>
                <input type="input" name="proxyusername" class="form-control" id="username" placeholder="username">
            </div>
            <div class="form-group">
                <label for="">PASSWORD</label>
                <input type="input" name="proxypassword" class="form-control" id="password" placeholder="password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
            <!-- <input type="hidden" name="act" value="GetToken" /> -->
        </form>
        <div class="alert" id="result">
            Response :
        </div>
    </body>
    <script src="<?php echo site_url('/'); ?>assets/jquery-2.2.3/jquery-2.2.3.min.js" ></script>
    <script src="<?php echo site_url('/'); ?>assets/bootstrap-3.3.6-dist/js/bootstrap.min.js" ></script>
    <script type="text/javascript">
        function dosubmit(){
            var d = $('form').serialize();
            $.get("<?php echo site_url('index.php/apis/gettoken'); ?>",d, function( data ) {
                $( "#result" ).html( data );
            });
            return false;
        }
    </script>
</html>
