<?php echo strtotime('30/11/2016'); ?>
<div class="panel panel-success">
  <div class="panel-heading"> <h3 class="panel-title">ประวัติการลงทะเบียนคำร้องของคุณทั้งหมด <?=count($requests);?> รายการ</h3> </div>
  <div class="panel-body"> </div>
  <table class="table table-hover">
    <thead> <tr> <th>ประเภทรายการ</th> <th>วันที่ยื่นคำร้อง</th> <th>วันที่หมดอายุ</th> <th></th> </tr> </thead>
    <tbody>
      <?php foreach ($requests as $key => $value) :
        $exist = '';
        $expired = strtotime('+30 days',$value['date_create']);
        if ($value['approve_status'] !== 'accept' && time() < $expired) :
          $exist++; ?>
          <tr class="rows" style="display:none;">
            <td>
              <?php echo isset($value['category']) ? $value['category'] : 'หนังสือรับรองความรู้ความสามารถ';
              if ($value['approve_status'] == NULL) : ?>
                <span class="label label-primary">ใหม่</span>
              <?php elseif ($value['approve_status'] === 'reject'): ?>
                <span class="label label-info">รอ</span>
              <?php endif;
              if ($value['assets_id'] == NULL) : ?>
                <span class="label label-warning">รอแนบไฟล์</span>
              <?php endif; ?>
            </td>
            <td><?=date('d-m-Y',$value['date_create']);?></td>
            <td><?php echo ($value['date_create']) ? date('d-m-Y',$expired) : 'N/A'; ?> </td>
            <td>
                <?php $req = isset($value['category']) ? 'standard' : 'skill'; ?>
                <?=anchor('account/request/'.$req.'/'.$value[$req.'_id'],'แก้ไข',array('class'=>'label label-info','target'=>'_blank'));?>
                <?=anchor('#','แนบไฟล์',array('class'=>'label label-primary','data-toggle'=>'modal','data-target'=>'#attachment'.$value['date_create']));?>

                <div class="modal fade" id="attachment<?=$value['date_create'];?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <?=form_open().form_hidden('id',$value['id']).form_hidden('type',isset($value['category']) ? 'standards' : 'skills');?>
                      <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h4 class="modal-title">รายการแนบไฟล์เอกสาร</h4> </div>
                      <div class="modal-body" style="padding:0px;">
                        <table class="table table-hover">
                          <thead> <tr> <th>#</th> <th>ชื่อไฟล์</th> <th>ขนาดไฟล์</th> <th></th> </tr> </thead>
                          <tbody>
                            <?php $assets_id = unserialize($value['assets_id']);
                            foreach ($assets as $asset) : ?>
                              <tr>
                                <td><?=form_checkbox(array('name'=>'assets_id[]'),$asset['id'],set_checkbox('assets_id',$asset['id'],(any_in_array($asset['id'],$assets_id))));?></td>
                                <td><?=$asset['client_name'];?></td>
                                <td><?=byte_format($asset['file_size']);?></td>
                                <td><?=anchor('uploads/attachments/'.$asset['file_name'],'ดู',array('class'=>'label label-info','target'=>'_blank'));?></td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    <div class="modal-footer"> <button type="submit" class="btn btn-primary btn-block">ยืนยัน</button> </div>
                    <?=form_close();?>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        <?php else: ?>
          <tr class="rows text-muted" style="display:none;">
            <td> <?php echo isset($value['category']) ? $value['category'] : 'หนังสือรับรองความรู้ความสามารถ'; ?> </td>
            <td><?=date('d-m-Y',$value['date_create']);?></td>
            <td>
              <?php $expired = strtotime('+30 days',$value['date_create']);
              echo ($value['date_create']) ? date('d-m-Y',$expired) : 'N/A'; ?>
            </td>
            <td> </td>
          </tr>
        <?php endif; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="panel-footer"> <?=anchor('#','ก่อนหน้า',array('class'=>'label label-default','id'=>'more'));?> </div>
</div>

<p>*ใหม่ หมายถึงคำร้องที่ยังไม่ได้รับการตรวจสอบจากผู้ดูแลระบบ</p>
<p>*รอ หมายถึงคำร้องที่ได้รับการปฎิเสธและรอการแก้ไขตอบกลับจากผู้ยื่นคำร้อง</p>
<p>*รอแนบไฟล์ หมายถึงคำร้องที่ยังไม่ได้รับการแนบไฟล์เอกสารจึงยังไม่ได้รับการตรวจสอบ</p>

<?php if (isset($exist)) : ?>
  <div class="alert alert-info">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>*หมายเหตุ</strong> พบรายการคำร้องอยู่ในระหว่างดำเนินการ ท่านไม่สามารถยื่นคำร้องเพิ่มเติมได้
  </div>
<?php endif; ?>

<script type="text/javascript">
$(function(){
  var rows = $('.rows');
  var more = $('#more');

  rows.slice(0,10).show();

  if ($('.rows:hidden').length < 10) {
    more.hide();
  }

  more.on('click',function(e){
    e.preventDefault();
    $('.rows:hidden').slice(0,5).fadeIn('slow');
    if ($('.rows:hidden').length == 0) {
      more.fadeOut('slow');
    }
  });
});
</script>
