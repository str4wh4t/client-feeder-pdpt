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
                <label for="">TABLE</label>
                <input type="input" name="table" class="form-control" id="table" placeholder="table" value="semester" />
            </div>
            <div class="form-group">
                <label for="">ID SMT</label>
                <input type="input" name="id_smt" class="form-control" id="id_smt" placeholder="id_smt" value="" />
            </div>
            <div class="form-group">
                <label for="">A PERIODE AKTIF</label>
                <input type="input" name="a_periode_aktif" class="form-control" id="a_periode_aktif" placeholder="a_periode_aktif" value="" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
            <!-- <input type="hidden" name="act" value="GetToken" /> -->
        </form>
        <div class="alert alert-warning">
            TOKEN : <?php echo get_cookie('token'); ?>
        </div>
        <div class="alert alert-warning" id="result">
            RESPONSE :
        </div>
        <table class="table table-striped" >
            <thead>
                <tr>
                    <th>NO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                </tr>
            </tbody>
        </table>
       
    </body>
        <script src="<?php echo site_url('/'); ?>assets/jquery-2.2.3/jquery-2.2.3.min.js" ></script>
    <script src="<?php echo site_url('/'); ?>assets/bootstrap-3.3.6-dist/js/bootstrap.min.js" ></script>
    <script type="text/javascript">
        function dosubmit(){
            var d = $('form').serialize();
            $( "#result" ).html( 'RESPONSE : Loading...');
            $.post("<?php echo site_url('index.php/api/updatesmt'); ?>",d, function( data ) {
                $( "#result" ).html( 'RESPONSE : ' + data );
            });
            return false;
        }
    </script>
</html>
