<?php
	include '../../globalConfig.php';
   if (isset($_SESSION['codUser'])) {
   	include '../../class/clsPaginas.php';
      $_SESSION['codIdioma'] = isset($_GET['codIdioma']) ? $_GET['codIdioma']:$_SESSION['codIdioma'];
      include '../../globalTraductor.php';
      $pag = new Paginas();
      $idiomas = $pag->consultarIdiomas($_SESSION['codIdioma']);
   }else{
      header("Location: ../../index.php");
   }
?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['codIdioma']; ?>">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>.::Biofood::.</title>
      <link rel="shortcut icon" href="../../imagenes/favicon.ico" type="image/x-icon">
      <meta name="description" content="Common form elements and layouts" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
      <!-- bootstrap & fontawesome -->
      <link rel="stylesheet" href="../../assets/css/bootstrap.css" />
      <link rel="stylesheet" href="../../assets/css/font-awesome.css" />
      <!-- page specific plugin styles -->
      <link rel="stylesheet" href="../../assets/css/jquery-ui.custom.css" />
      <link rel="stylesheet" href="../../assets/css/chosen.css" />
      <link rel="stylesheet" href="../../assets/css/datepicker.css" />
      <link rel="stylesheet" href="../../assets/css/bootstrap-timepicker.css" />
      <link rel="stylesheet" href="../../assets/css/daterangepicker.css" />
      <link rel="stylesheet" href="../../assets/css/bootstrap-datetimepicker.css" />
      <link rel="stylesheet" href="../../assets/css/colorpicker.css" />
      <!-- text fonts -->
      <link rel="stylesheet" href="../../assets/css/ace-fonts.css" />
      <!-- ace styles -->
      <link rel="stylesheet" href="../../assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
      <!--[if lte IE 9]>
      <link rel="stylesheet" href="../../assets/css/ace-part2.css" class="ace-main-stylesheet" />
      <![endif]-->
      <!--[if lte IE 9]>
      <link rel="stylesheet" href="../../assets/css/ace-ie.css" />
      <![endif]-->
      <!-- inline styles related to this page -->
      <!-- ace settings handler -->
      <script src="../../assets/js/ace-extra.js"></script>
      <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
      <!--[if lte IE 8]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.js"></script>
      <![endif]-->
   </head>
   <body class="no-skin">
      <!-- #section:basics/navbar.layout -->
      <?php include "../header.php" ?>
      <!-- /section:basics/navbar.layout -->
      <div class="main-container" id="main-container">
         <script type="text/javascript">
            try{ace.settings.check('main-container' , 'fixed')}catch(e){}
         </script>
         <!-------------- #section:basics/sidebar -------------------->
         <?php //include "menu.php"; ?>
         <!-- /section:basics/sidebar -->
         <div class="main-content">
            <div class="main-content-inner">
               <div class="page-content">
                  <div class="row">
                     <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <!-- #section:pages/error -->
                        <div class="error-container">
                           <div class="well">
                              <h1 class="grey lighter smaller">
                                 <span class="blue bigger-125">
                                    <i class="ace-icon fa fa-sitemap"></i>
                                    403
                                 </span>
                                 <?php echo _trnslt("Prohibido"); ?>
                              </h1>
                              <hr />
                              <h3 class="lighter smaller"><?php echo _trnslt("No tiene permisos para acceder a esta página."); ?></h3>
                              <div>
                                 <div class="space"></div>
                                 <h4 class="smaller">Try one of the following:</h4>
                                 <ul class="list-unstyled spaced inline bigger-110 margin-15">
                                    <li>
                                       <i class="ace-icon fa fa-hand-o-right blue"></i>
                                       Re-check the url for typos
                                    </li>
                                    <li>
                                       <i class="ace-icon fa fa-hand-o-right blue"></i>
                                       Read the faq
                                    </li>
                                    <li>
                                       <i class="ace-icon fa fa-hand-o-right blue"></i>
                                       Tell us about it
                                    </li>
                                 </ul>
                              </div>
                              <hr />
                              <div class="space"></div>
                              <div class="center">
                                 <a href="javascript:history.back()" class="btn btn-grey">
                                    <i class="ace-icon fa fa-arrow-left"></i>
                                    <?php echo _trnslt("Volver"); ?>
                                 </a>
                                 <a href="./dashboard" class="btn btn-primary">
                                    <i class="ace-icon fa fa-tachometer"></i>
                                    <?php echo _trnslt("Dashboard"); ?>
                                 </a>
                              </div>
                           </div>
                        </div>
                        <!-- /section:pages/error -->
                        <!-- PAGE CONTENT ENDS -->
                     </div><!-- /.col -->
                  </div>
               </div><!-- /.page-content -->
            </div>
         </div><!-- /.main-content -->
         <?php include "../footer.php" ?>
      </div><!-- /.main-container -->
      <!-- basic scripts -->
      <!--[if !IE]> -->
      <script type="text/javascript">
         window.jQuery || document.write("<script src='../../assets/js/jquery.js'>"+"<"+"/script>");
      </script>
      <!-- <![endif]-->
      <!--[if IE]>
      <script type="text/javascript">
         window.jQuery || document.write("<script src='../../assets/js/jquery1x.js'>"+"<"+"/script>");
      </script>
      <![endif]-->
      <script type="text/javascript">
         if('ontouchstart' in document.documentElement) document.write("<script src='../../assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
      </script>
      <script src="../../assets/js/bootstrap.js"></script>
      <!-- page specific plugin scripts -->
      <!--[if lte IE 8]>
      <script src="../../../assets/js/excanvas.js"></script>
      <![endif]-->
      <script src="../../assets/js/jquery-ui.custom.js"></script>
      <script src="../../assets/js/jquery.ui.touch-punch.js"></script>
      <script src="../../assets/js/chosen.jquery.js"></script>
      <script src="../../assets/js/fuelux/fuelux.spinner.js"></script>
       <script src="../../assets/js/date-time/bootstrap-datepicker.js"></script>
      <script src="../../assets/js/date-time/bootstrap-timepicker.js"></script>
      <script src="../../assets/js/date-time/moment.js"></script>
      <script src="../../assets/js/date-time/daterangepicker.js"></script>
      <script src="../../assets/js/date-time/bootstrap-datetimepicker.js"></script>
      <script src="../../assets/js/bootstrap-colorpicker.js"></script>
       <script src="../../assets/js/jquery.knob.js"></script>
      <script src="../../assets/js/jquery.autosize.js"></script>
      <script src="../../assets/js/jquery.inputlimiter.1.3.1.js"></script>
      <script src="../../assets/js/jquery.maskedinput.js"></script>
      <script src="../../assets/js/bootstrap-tag.js"></script>
      <!-- ace scripts -->
       <script src="../../assets/js/ace/elements.scroller.js"></script>
       <script src="../../assets/js/ace/elements.colorpicker.js"></script>
       <script src="../../assets/js/ace/elements.fileinput.js"></script>
      <script src="../../assets/js/ace/elements.typeahead.js"></script>
      <script src="../../assets/js/ace/elements.wysiwyg.js"></script>
      <script src="../../assets/js/ace/elements.spinner.js"></script>
      <script src="../../assets/js/ace/elements.treeview.js"></script>
      <script src="../../assets/js/ace/elements.wizard.js"></script>
      <script src="../../assets/js/ace/elements.aside.js"></script>
      <script src="../../assets/js/ace/ace.js"></script>
      <script src="../../assets/js/ace/ace.ajax-content.js"></script>
      <script src="../../assets/js/ace/ace.touch-drag.js"></script>
      <script src="../../assets/js/ace/ace.sidebar.js"></script>
      <script src="../../assets/js/ace/ace.sidebar-scroll-1.js"></script>
      <script src="../../assets/js/ace/ace.submenu-hover.js"></script>
      <script src="../../assets/js/ace/ace.widget-box.js"></script>
      <script src="../../assets/js/ace/ace.settings.js"></script>
      <script src="../../assets/js/ace/ace.settings-rtl.js"></script>
      <script src="../../assets/js/ace/ace.settings-skin.js"></script>
      <script src="../../assets/js/ace/ace.widget-on-reload.js"></script>
      <script src="../../assets/js/ace/ace.searchbox-autocomplete.js"></script>
      <!-- inline scripts related to this page -->
      <!-- the following scripts are used in demo only for onpage help and you don't need them -->
      <link rel="stylesheet" href="../../assets/css/ace.onpage-help.css" />
      <script type="text/javascript"> ace.vars['base'] = '..'; </script>
      <script src="../../assets/js/ace/elements.onpage-help.js"></script>
      <script src="../../assets/js/ace/ace.onpage-help.js"></script>
   </body>
</html>