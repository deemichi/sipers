<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Halaman <?php echo @$judul; ?></h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <?php
                                    for ($i=0; $i<count($this->session->flashdata('segment')); $i++) { 
                                        if ($i == 0) {
                                        ?>
                                            <li><i class="fa fa-dashboard"></i> <?php echo $this->session->flashdata('segment')[$i]; ?></li>
                                        <?php
                                        } elseif ($i == (count($this->session->flashdata('segment'))-1)) {
                                        ?>
                                            <li class="active"> <?php echo $this->session->flashdata('segment')[$i]; ?> </li>
                                        <?php
                                        } else {
                                        ?>
                                            <li> <?php echo $this->session->flashdata('segment')[$i]; ?> </li>
                                        <?php
                                        }

                                        if ($i == 0 && $i == (count($this->session->flashdata('segment'))-1)) {
                                        ?>
                                            <li class="active">  </li>
                                        <?php
                                        }
                                    }
                                  ?>
                                    <!--<li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>!-->
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>