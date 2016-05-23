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
        <title>WEB SRVS :: DASHBOARD</title>
        <style type="text/css">
/*
 * Base structure
 */

/* Move down content because we have a fixed navbar that is 50px tall */
body {
  padding-top: 50px;
}


/*
 * Global add-ons
 */

.sub-header {
  padding-bottom: 10px;
  border-bottom: 1px solid #eee;
}

/*
 * Top navigation
 * Hide default border to remove 1px line.
 */
.navbar-fixed-top {
  border: 0;
}

/*
 * Sidebar
 */

/* Hide for mobile, show later */
.sidebar {
  display: none;
}
@media (min-width: 768px) {
  .sidebar {
    position: fixed;
    top: 51px;
    bottom: 0;
    left: 0;
    z-index: 1000;
    display: block;
    padding: 20px;
    overflow-x: hidden;
    overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
    background-color: #f5f5f5;
    border-right: 1px solid #eee;
  }
}

/* Sidebar navigation */
.nav-sidebar {
  margin-right: -21px; /* 20px padding + 1px border */
  margin-bottom: 20px;
  margin-left: -20px;
}
.nav-sidebar > li > a {
  padding-right: 20px;
  padding-left: 20px;
}
.nav-sidebar > .active > a,
.nav-sidebar > .active > a:hover,
.nav-sidebar > .active > a:focus {
  color: #fff;
  background-color: #428bca;
}


/*
 * Main content
 */

.main {
  padding: 20px;
}
@media (min-width: 768px) {
  .main {
    padding-right: 40px;
    padding-left: 40px;
  }
}
.main .page-header {
  margin-top: 0;
}


/*
 * Placeholder dashboard ideas
 */

.placeholders {
  margin-bottom: 30px;
  text-align: center;
}
.placeholders h4 {
  margin-bottom: 0;
}
.placeholder {
  margin-bottom: 20px;
}
.placeholder img {
  display: inline-block;
  border-radius: 50%;
}
input:focus{
    background-color: rgba(242, 255, 0, 0.15);
}

::-webkit-scrollbar
{
    width:0px;
}
::-webkit-scrollbar-track-piece
{
    background-coor:transparent;
}


        </style>
    </head>
    <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">WEB SRVS :: DASHBOARD</a>
        </div>
          
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Call center : BAPSI UNDIP</a></li>
            </ul>
            <!--
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
            -->
        </div>
          
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="<?php echo site_url('index.php/fakultas/home') ?>">Home<span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="<?php echo site_url('index.php/fakultas/kuliahmhs') ?>">Kuliah Mahasiswa</a></li>
            <!-- <li><a href="<?php echo site_url('index.php/fakultas/mhspt') ?>">Mahasiswa PT</a></li> -->
              <li><a href="#">...</a></li>
          </ul>
          <ul class="nav nav-sidebar">
              <li class="alert-danger" ><a href="javascript:void(0)" onclick="return dologout()" ><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Keluar</a></li>
          </ul>
            <form id="formout" style="display: none">
                <input type="hidden" name="logout" value="y" />
            </form>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">KULIAH MAHASISWA</h1>

          <div class="row placeholders">
              
              
            <div class="col-xs-12 placeholder">
                <div class="alert alert-info" style="text-align: left">
                    <strong>Keterangan : </strong><br />
                    - Silahkan masukan nim mahasiswa yang hendak dibetulkan.<br />
                    - Tekan enter untuk men-submit inputan.<br />
                    - Silahkan klik 2x pada input nim untuk mereset pencarian.
                </div>
                <br />
                <form id="forma" onsubmit='return dosubmit()'>
                    <input autofocus data-toggle="tooltip" data-placement="left" title="input mahasiswa" class="form-control input-lg " style="text-transform:uppercase" type="text" name='search' id="search" placeholder="Masukan nim" value="">
                </form>
                &nbsp;
                <div style="text-align: left" class="alert alert-warning" id="result1">
                    RESPONSE :
                </div>
              
            </div>
              
        

          </div>
          
          <div id="tbmhspt" style="display: none">
          <h2 class="sub-header">:: MHS PT ::</h2>
          <div class="table-responsive">
            <table class="table table-striped" id='datax'>
              <thead>
                <tr>
                  <th>NAMA</th>
                  <th>NIM</th>
                  <th>JURUSAN</th>
                  <th>TGL LAHIR</th>
                  <th>JNS DAFTAR</th>
                  <th>DELETE</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td colspan="5"> - daftar mahasiswa - </td>
                </tr>
              </tbody>
            </table>
              
              <br />
              <div style="text-align: left" class="alert alert-warning" id="result2">
                    RESPONSE :
                </div>
          </div>
          
          
          <br />
          <br />
          <br />
          <br />
          
          </div>
          <div id="tbkulmhs" style="display: none">
          <h2 class="sub-header">:: KULIAH MHS ::</h2>
          <div class="table-responsive">
            <table class="table" id='datay'>
              <thead>
                <tr>
                  <th>ID SMT</th>
                  <th>IPS</th>
                  <th>IPK</th>
                  <th>SKS SMT</th>
                  <th>SKS TOTAL</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td colspan="5"> - daftar kuliah - </td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          
          </div>
          <div id="divform" style="display: none">
          <h3 class="page-header">++ Edit ++</h3>

          <div class="row placeholders">
              
              
            <div class="col-xs-12 placeholder">
                <form class="form-horizontal" onsubmit="return doedit()" id="formy">
                    <div class="form-group has-success has-feedback">
                      <label class="control-label col-sm-3" for="inputSuccess3">IPS ( SEMESTER )</label>
                      <div class="col-sm-9">
                        <input data-toggle="tooltip" data-placement="left" title="masukan nilai ip semester ( angka dan titik , contoh : 3.01 )" type="text" class="form-control" name="ips" id="ips" aria-describedby="inputSuccess3Status">

                        <span id="inputSuccess3Status" class="sr-only">(success)</span>
                      </div>
                    </div>
                    <div class="form-group has-success has-feedback">
                      <label class="control-label col-sm-3" for="inputSuccess3">IPK ( KUMULATIF )</label>
                      <div class="col-sm-9">
                        <input data-toggle="tooltip" data-placement="left" title="masukan nilai ip kumulatif ( angka dan titik , contoh : 3.01 )" type="text" class="form-control" name="ipk" id="ipk" aria-describedby="inputSuccess3Status">

                        <span id="inputSuccess3Status" class="sr-only">(success)</span>
                      </div>
                    </div>
                    <div class="form-group has-success has-feedback">
                      <label class="control-label col-sm-3" for="inputSuccess3">SKS SMT</label>
                      <div class="col-sm-9">
                        <input data-toggle="tooltip" data-placement="left" title="masukan nilai sks semester ( angka )" type="text" class="form-control" name="sks_smt" id="sks_smt" aria-describedby="inputSuccess3Status">

                        <span id="inputSuccess3Status" class="sr-only">(success)</span>
                      </div>
                    </div>
                    <div class="form-group has-success has-feedback">
                      <label class="control-label col-sm-3" for="inputSuccess3">SKS TOTAL</label>
                      <div class="col-sm-9">
                        <input data-toggle="tooltip" data-placement="left" title="masukan nilai sks total ( angka )" type="text" class="form-control" name="sks_total" id="sks_total" aria-describedby="inputSuccess3Status">

                        <span id="inputSuccess3Status" class="sr-only">(success)</span>
                      </div>
                    </div>
                    <input type="hidden" id="id_smt" name="id_smt" value="" />
                    <input type="hidden" id="id_reg_pd" name="id_reg_pd" value="" />
                    
                    <div class="form-group has-success has-feedback">
                        <label class="control-label col-sm-8" for="inputSuccess3">&nbsp;</label>
                        <button type="submit" class="btn btn-primary btn-lg">Simpan <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                        &nbsp;
                        <button type="button" id="resetkulmhs" onclick="return doresetform()" class="btn btn-danger btn-lg">Batal <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></button>
                    </div>
                  </form>
                &nbsp;
                <div style="text-align: left" class="alert alert-warning" id="resulty">
                    RESPONSE :
                </div>
              
            </div>
              
        

          </div>
          
          <br />
          <br />
          
          </div>
          
        </div>
      </div>
    </div>
        
    </body>
        <script src="<?php echo site_url('/'); ?>assets/jquery-2.2.3/jquery-2.2.3.min.js" ></script>
    <script src="<?php echo site_url('/'); ?>assets/bootstrap-3.3.6-dist/js/bootstrap.min.js" ></script>
    <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        })
        
        function resetsearch(){
            $('#tbmhspt').hide();
            $('#tbkulmhs').hide();
            $('#divform').hide();
            $( "#result1" ).html( 'RESPONSE : ');
            $( "#result2" ).html( 'RESPONSE : ');
            $( "#resulty" ).html( 'RESPONSE : ');
            $('#selectkul0').tooltip('hide');
            $('#selectmhs0').tooltip('hide');
        }
        
        function dosubmit(){
            
            resetsearch();
            
            
            var d = $('#forma').serialize();
            $( "#result1" ).html( 'RESPONSE : Loading...');
            $.post("<?php echo site_url('index.php/fakultas/dosearchmhs'); ?>",d, function( rs ) {
                var result = $.parseJSON(rs);
                //console.log(result);
                $( "#result1" ).html( 'RESPONSE : ' + result.res);
                
                if(result.res == 'ok'){
                    var strx = '';
                    $.each(result.datax,function(k,v){
                        strx = strx + '<tr id="xtr'+k+'"> <td> <b><a id="selectmhs'+ k +'" data-toggle="tooltip" data-placement="left" title="pilih mahasiswa" onclick="return dopick(\''+ v.id_reg_pd +'\')" href="javascript:void(0)" > '+ v.nm_pd +'</a></b></td> <td>'+ v.nipd +'</td> <td>'+ v.fk__sms +'</td> <td>'+ v.tgl_lahir +'</td> <td>'+ v.fk__jns_daftar +'</td> <td><a onclick="return godel(\''+k+'\',\''+v.id_reg_pd+'\')" href="javascript:void(0)"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></a></span></td> </tr>' ;
                        
                        // <
                    });
                    $( "#datax tbody" ).html( strx );
                    $( "#tbmhspt" ).show();
                    
                    $("html, body").animate({ scrollTop: $(document).height() }, 1000,function(){
                        $("#search").blur();
                        $('#selectmhs0').tooltip('show');
                        $('a[id^=selectmhs]').tooltip();
                    });
                    
                    
                    
                }
                
            });
            return false;
        }
        function dopick(id_reg_pd){
            //var d = $('#formb').serialize();
            $( "#result2" ).html( 'RESPONSE : Loading...');
            $.post("<?php echo site_url('index.php/fakultas/dosearchkulmhs'); ?>",{'id_reg_pd':id_reg_pd}, function( rs ) {
                var result = $.parseJSON(rs);
                //console.log(result);
                $( "#result2" ).html( 'RESPONSE : ' + result.res);

                
                if(result.res == 'ok'){
                    var stry = '';
                    $.each(result.datay,function(k,v){
                        var err = '';
                        
                        if((v.ipk == 0 )&&(v.ips > 0)){
                            //var err = 'class="alert-danger"';
                        }
                        
                        stry = stry + '<tr '+ err +'> <td> <b><a id="selectkul'+ k +'" data-toggle="tooltip" data-placement="left" title="pilih semester" onclick="return doentry(\''+v.id_reg_pd+'\',\''+v.id_smt+'\',\''+v.ips+'\',\''+v.ipk+'\',\''+v.sks_smt+'\',\''+v.sks_total+'\')" \n\
                                href="javascript:void(0)" > '+ v.id_smt +'</a></b></td>\n\
                                <td>'+ v.ips +'</td> <td>'+ v.ipk +'</td> <td>'+ v.sks_smt +'</td> <td>'+ v.sks_total +'</td> </tr>' ;
                        // <
                    });
                    $( "#datay tbody" ).html( stry );
                    
                    $( "#tbkulmhs" ).show();
                    
                    $("html, body").animate({ scrollTop: $(document).height() }, 1000,function(){
                        $('a[id^=selectmhs]').tooltip('hide');
                        $('#selectkul0').tooltip('show');
                        $('a[id^=selectkul]').tooltip();
                    });
                    
                    
                    
                }
                
            });
            return false;
        }
        function doentry(id_reg_pd,id_smt,ips,ipk,sks_smt,sks_total){
            $('#ips').val(ips);
            $('#ipk').val(ipk);
            $('#sks_smt').val(sks_smt);
            $('#sks_total').val(sks_total);
            $('#id_reg_pd').val(id_reg_pd);
            $('#id_smt').val(id_smt);
            $('#divform').show();
            $("html, body").animate({ scrollTop: $(document).height() }, 1000,function(){
                        $('a[id^=selectkul]').tooltip('hide');
                        $('#ips').tooltip('show');
                        $('#ipk').tooltip();
                        $('#sks_smt').tooltip();
                        $('#sks_total').tooltip();
                        $('#ips').focus();
                        $('#selectkul0').tooltip('hide');
                    });
                    
            return false;
            
        }
         function doedit(){
             
            var d = $('#formy').serialize();
            
            $( "#resulty" ).html( 'RESPONSE : Loading...');
            
            $.post("<?php echo site_url('index.php/fakultas/doeditmhs'); ?>",d, function( rs ) {
                var result = $.parseJSON(rs);
                if(result.error_code == 0){
                    $( "#resulty" ).html( 'RESPONSE : ' + 'Ubah sukses... [ <b><a id="backo" data-toggle="tooltip" data-placement="bottom" title="kembali" href="javascript:void(0)" onclick="return backo()" >KLIK UNTUK KEMBALI</a></b> ]');
                    dopick(result.id_reg_pd);
                    $('#selectmhs0').tooltip('hide');   
                    $('#selectkul0').tooltip('hide');
                    $('#backo').tooltip('show');
                    
                }
                else{
                    $( "#resulty" ).html( 'RESPONSE : ' + result.error_desc);
                }
                
            });

            return false;
        }
        function backo(){
            $('#divform').slideUp(function(){
                $( "#resulty" ).html( 'RESPONSE : ');
                
                
                        $('#selectmhs0').tooltip('hide');   
                    $('#selectkul0').tooltip('hide');

                        
            });
            
            return false;
            
        }
        function dologout(){
             var d = $('#formout').serialize();
             if(confirm('Yakin akan keluar ?')){
                 $.post("<?php echo site_url('index.php/fakultas/dologout'); ?>",d, function( rs ) {
                        if(rs == 1){
                            window.location.href = '<?php echo site_url('index.php/fakultas') ?>';
                        }
                    });
             }
             
            return false;
        }
        function doresetform(){
            $('#divform').slideUp();
            return false;
        }
        $('#search').dblclick(function() {
            $(this).val('');
            resetsearch();
        });
        function godel(id,id_reg_pd){
            if(confirm('Yakin akan di hapus ?')){
                $.post("<?php echo site_url('index.php/fakultas/dogodel'); ?>",{id_reg_pd:id_reg_pd}, function( rs ) {
                    var result = $.parseJSON(rs);
                    if(result.error_code == 0){
                        $('a[id^=selectmhs]').tooltip('hide');
                        $('a[id^=selectkul]').tooltip('hide');
                        $('#tbkulmhs').hide();
                        $('#divform').hide();
                        $('#xtr'+id).html('<td colspan="6">data telah dihapus</td>');
                        $( "#result2" ).html( 'RESPONSE : ' + 'ok');
                    }
                    else{
                        $( "#result2" ).html( 'RESPONSE : ' + 'hapus data gagal...');
                    }
                    //$( "#result1" ).html( 'RESPONSE : ' + result.res);
                });
            }
            
        }
        $(document).ready(function () {
            //called when key is pressed in textbox
            $("#sks_smt").keypress(function (e) {
               //if the letter is not digit then display error and don't type anything
               if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                  //display error message
                  $('#sks_smt').tooltip('show');
                         return false;
              }
             });
             $("#sks_total").keypress(function (e) {
               //if the letter is not digit then display error and don't type anything
               if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                  //display error message
                  $('#sks_total').tooltip('show');
                         return false;
              }
             });
             $('#ips').keypress(function(event) {
                var $this = $(this);
                if ((event.which != 46 || $this.val().indexOf('.') != -1) &&
                   ((event.which < 48 || event.which > 57) &&
                   (event.which != 0 && event.which != 8))) {
                       event.preventDefault();
                }

                var text = $(this).val();
                if ((event.which == 46) && (text.indexOf('.') == -1)) {
                    setTimeout(function() {
                        if ($this.val().substring($this.val().indexOf('.')).length > 3) {
                            $this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
                        }
                    }, 1);
                }

                if ((text.indexOf('.') != -1) &&
                    (text.substring(text.indexOf('.')).length > 2) &&
                    (event.which != 0 && event.which != 8) &&
                    ($(this)[0].selectionStart >= text.length - 2)) {
                        event.preventDefault();
                }      
            });
             $('#ipk').keypress(function(event) {
                    var $this = $(this);
                    if ((event.which != 46 || $this.val().indexOf('.') != -1) &&
                       ((event.which < 48 || event.which > 57) &&
                       (event.which != 0 && event.which != 8))) {
                           event.preventDefault();
                    }

                    var text = $(this).val();
                    if ((event.which == 46) && (text.indexOf('.') == -1)) {
                        setTimeout(function() {
                            if ($this.val().substring($this.val().indexOf('.')).length > 3) {
                                $this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
                            }
                        }, 1);
                    }

                    if ((text.indexOf('.') != -1) &&
                        (text.substring(text.indexOf('.')).length > 2) &&
                        (event.which != 0 && event.which != 8) &&
                        ($(this)[0].selectionStart >= text.length - 2)) {
                            event.preventDefault();
                    }      
                });
          });
    </script>
    <!-- C2A000002 -->
</html>
