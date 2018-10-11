<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $userdata->nama; ?></p>
        <!-- Status -->
        <a href=""><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">LIST MENU</li>
      <!-- Optionally, you can add icons to the links -->

      <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('HomePersis'); ?>">
          <i class="fa fa-home"></i>
          <span>Home</span>
        </a>
      </li>
      
     

      <li <?php if ($page == 'pejabat') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Pejabat'); ?>">
          <i class="fa fa-user"></i>
          <span>Data Pejabat/Peserta</span>
        </a>
      </li>

      <li <?php if ($page == 'pejabat') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('UsulanRakor'); ?>">
          <i class="fa fa-tag"></i>
          <span>Usulan Rakor</span>
        </a>
      </li>

      <li <?php if ($page == 'pejabat') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('#'); ?>">
          <i class="fa fa-list-alt"></i>
          <span>Agenda Rakor</span>
        </a>
      </li>


      <li <?php if ($page == 'pejabat') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('#'); ?>">
          <i class="fa fa-check-circle-o"></i>
          <span>Pemuktahiran Rakor</span>
        </a>
      </li>

      <li <?php if ($page == 'pejabat') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('#'); ?>">
          <i class="fa fa-file"></i>
          <span>Dokumentasi Rakor</span>
        </a>
      </li>



    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>