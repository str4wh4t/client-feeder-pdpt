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
                <input type="input" name="username" class="form-control" id="username" placeholder="username" value="001008e1" />
            </div>
            <div class="form-group">
                <label for="">PASSWORD</label>
                <input type="input" name="password" class="form-control" id="password" placeholder="password" value="SIbapsi2015" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
            <!-- <input type="hidden" name="act" value="GetToken" /> -->
        </form>
        <div class="alert alert-warning" id="result">
            RESPONSE :
        </div>
    </body>
    <script src="<?php echo site_url('/'); ?>assets/jquery-2.2.3/jquery-2.2.3.min.js" ></script>
    <script src="<?php echo site_url('/'); ?>assets/bootstrap-3.3.6-dist/js/bootstrap.min.js" ></script>
    <script type="text/javascript">
        function dosubmit(){
            var d = $('form').serialize();
            $( "#result" ).html( 'RESPONSE : Loading...');
            $.post("<?php echo site_url('index.php/api/gettoken'); ?>",d, function( data ) {
                $( ".alert" ).html( 'RESPONSE : ' + data );
            });
            return false;
        }
    </script>
</html>
