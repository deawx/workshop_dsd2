<div class="row">
  <div class="container">
    <h3><?=$news['title'];?></h3>
    <hr>
    <p class="lead">
      วันที่ประกาศ : <span class="label label-info"><?=date('d-m-Y',$news['date_create']);?></span>
      วันที่แก้ไข : <span class="label label-warning"><?=date('d-m-Y',$news['date_update']);?></span>
      จำนวนผู้เข้าชม : <span class="label label-default"><?=$news['views'];?></span>
    </p>
    <div class="well"> <div class="row"> <?=($news['detail']);?> </div> </div>
    <?php $assets_id = unserialize($news['assets_id']);
    $assets = $this->db->select('id,file_type,file_size,file_name,client_name')->where_in('id',$assets_id)->get('assets')->result_array(); ?>
    <p class="lead"> รายการเอกสารที่แนบมาด้วย <?=count($assets);?> รายการ</p>
    <table class="table table-hover" style="border:none;">
      <?php foreach ($assets as $asset) : ?>
        <tr>
          <td>ชื่อไฟล์ <?=$asset['client_name'];?></td>
          <td>ขนาดไฟล์ <?=byte_format($asset['file_size']);?></td>
          <td><a href="<?=base_url('uploads/attachments/'.$asset['file_name']);?>" target="_blank">ดาวน์โหลด</a></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>
