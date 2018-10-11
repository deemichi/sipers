<?php

  foreach ($dataPejabat as $pejabat) {
    ?>
    <tr>
      <td><?php echo $pejabat->d_nama; ?></td>
      <td><?php echo $pejabat->d_instansi; ?></td>
      <td class="text-center" style="min-width:230px;">
      <a href="javascript:void(0)" data-toggle="modal" class="update-dataPejabat" data-id="<?php echo $pejabat->d_kdpejabat; ?>" data-placement="top" title="Update">
      <i class="mdi mdi-check" ></i></a>

      <a href="javascript:void(0)" data-toggle="modal" class="konfirmasiHapus-pejabat" data-placement="top" title="Hapus" data-id="<?php echo $pejabat->d_kdpejabat; ?>" data-target="#konfirmasiHapus">
      <i class="mdi mdi-close"></i></a>
                                            
         
          </td>
    </tr>
    <?php

  } 
?>