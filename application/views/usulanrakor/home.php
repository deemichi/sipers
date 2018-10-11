<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="row">
                    <div class="col-12">
                        
                        <div class="card">
                            <div class="card-body"><div class="col-md-2">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#tambah-usulanrakor" class="btn m-t-20 btn-info btn-block waves-effect waves-light">
                                 <i class="mdi mdi-account"></i>Tambah Data</a></div>
                                                        <h5 class="card-title"></h5>
                                <div class="table-responsive">
                                    <table id="list-data"  class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Tgl Usulan</th>
                                                <th>Uraian Usulan</th>
                                                <th>Status</th>
                                                <th>Uraian Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="data-usulanrakor">
                                            
                                            
                                        </tbody>
                                        
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                 
                


<?php echo $modal_tambah_usulanrakor; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataUsulanRakor', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>


                
