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
            <li class="active"><a href="<?php echo site_url('index.php/fakultas/home') ?>">Home<span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo site_url('index.php/fakultas/kuliahmhs') ?>">Kuliah Mahasiswa</a></li>
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
          <h1 class="page-header">HOME</h1>

          <div class="row placeholders">
              
              
            <div class="col-xs-12 placeholder">
                
                <div class="alert alert-info">
                    Aplikasi Client Webservice Feeder PDDIKTI
                </div>
                <br />
                <!--
                <div style="text-align: left" class="alert alert-warning" id="result">
                    RESPONSE :
                </div>
                -->
            </div>
              
        

          </div>
          
          <br />

        </div>
      </div>
    </div>
        
    </body>
        <script src="<?php echo site_url('/'); ?>assets/jquery-2.2.3/jquery-2.2.3.min.js" ></script>
    <script src="<?php echo site_url('/'); ?>assets/bootstrap-3.3.6-dist/js/bootstrap.min.js" ></script>
    <script type="text/javascript">
         function dologout(){
             var d = $('#formout').serialize();
             if(confirm('Yakin akan keluar ?')){
                 $.post("<?php echo site_url('index.php/fakultas/dologout'); ?>",d, function( rs ) {
                        if(rs == 1){
                            window.location.href = '<?php echo site_url('index.php/fakultas') ?>';
                        }
                    });
             }
             
            
            
            //$( "#resulty" ).html( 'RESPONSE : Loading...');
            
            

            return false;
        }
    </script>
</html>
