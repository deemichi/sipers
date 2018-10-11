<div class="modal-header">
                                <h4 class="modal-title"><strong>Update Data Pejabat</strong> </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form id="form-update-pejabat" method="POST">
                                  <input type="hidden" name="id" value="<?php echo $dataPejabat->d_kdpejabat; ?>">
                                  <div class="input-group form-group">
                                     <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Nama Pejabat" required="" value="<?php echo $dataPejabat->d_nama; ?>" name="nama" aria-describedby="sizing-addon2">
                                  </div>

                                  <div class="input-group form-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-building"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Instansi" required="" value="<?php echo $dataPejabat->d_instansi; ?>" name="instansi" aria-describedby="sizing-addon2">
                                  </div>

                                  <div class="form-group">
                                   
                                    <div class="col-md-4">
                                        <button type="submit" class="form-control btn btn-danger"> <i class="glyphicon glyphicon-ok"></i> Update</button>
                                   </div>
                                  
                                  </div>
                                </form>
                            </div>