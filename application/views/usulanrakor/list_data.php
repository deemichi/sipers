<?php
  foreach ($dataUsulanRakor as $usulanrakor) {
    ?>
    <tr>
      
      <td><?php echo $usulanrakor->f_tglusulan; ?></td>
      <td><?php echo $usulanrakor->f_uraianusulan; ?></td>
      <td><?php if ($usulanrakor->f_status=='1')
      echo "Dalam Proses"; 
      ?></td>
      <td><?php echo $usulanrakor->f_uraianstatus; ?></td>
      <td class="text-center" style="min-width:230px;">
        <a href="javascript:void(0)" data-toggle="modal" class="update-dataUsulanRakor" data-target="" data-id="<?php echo $usulanrakor->f_kdusulan; ?>" data-placement="top" title="Update">
         <i class="mdi mdi-check" ></i></a>
        <a href="javascript:void(0)" data-toggle="modal" class="konfirmasiHapus-usulanrakor" data-placement="top" title="Hapus" data-id="<?php echo $usulanrakor->f_kdusulan; ?>" data-target="#konfirmasiHapus">
        <i class="mdi mdi-close"></i></a>                                 
      </td>
    </tr>
    <?php

  } 
?>