<!DOCTYPE html>
<html>

<head>
   <!-- meta -->
    <?php echo @$_meta; ?>
    <title>SiPers [Sistem Informasi Persidangan Kemenko Kemaritiman]</title>
    <!-- css --> 
    <?php echo @$_css; ?>
    
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        
        <!-- header -->
        <?php echo @$_header; ?> <!-- nav -->
        
        <!-- sidebar -->
        <?php echo @$_sidebar; ?>

        
         <!-- content -->
         <?php echo @$_content; ?> <!-- headerContent --><!-- mainContent -->
        
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- js -->
    <?php echo @$_js; ?>

</body>

</html>