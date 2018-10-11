<div class="modal-header">
                                <h4 class="modal-title"><strong>Update Usulan Rakor</strong> </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form id="form-update-usulanrakor" method="POST">
                                  <input type="hidden" name="id" value="<?php echo $dataUsulanRakor->f_kdusulan; ?>">
                                  <div class="input-group form-group">
                                     <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input class="form-control" id="tglusulan" name="tglusulan" value="<?php echo $dataUsulanRakor->f_tglusulan; ?>" placeholder="Tanggal Usulan Rakor" type="text"/ required="">
                                  </div>


                                  <div class="input-group form-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-building"></i></span>
                                    </div>
                                    <textarea class="form-control" rows="5" cols="55" id="uraianusulan" name="uraianusulan"><?php echo $dataUsulanRakor->f_uraianusulan; ?></textarea>
                                  </div>

                                  
                                  <div class="form-group">
                                   
                                    <div class="col-md-4">
                                        <button type="submit" class="form-control btn btn-danger"> <i class="glyphicon glyphicon-ok"></i> Update</button>
                                   </div>
                                  
                                  </div>
                                </form>
                            </div>




<script>
    $(document).ready(function(){
      var date_input=$('input[name="tglusulan"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>




                    
  
            