<?php
$uri_get = $this->input->get();
$uri_get = http_build_query($uri_get);
$uri_string = uri_string().'?'.$uri_get;
?>
<div class="panel panel-default">
  <div class="panel-heading"> <h3 class="panel-title">ข้อมูลคำร้องทั้งหมด <?=count($requests);?> รายการ</h3> </div>
  <div class="panel-body">
    <?=form_open(uri_string(),array('method'=>'get','class'=>'form-inline pull-right'));?>
    <div class="form-group"> <?=form_dropdown(array('name'=>'approve_status','class'=>'form-control'),array(''=>'เลือกทั้งหมด','accept'=>'ตอบรับ','reject'=>'ปฏิเสธ'),set_value('approve_status',$this->input->get('approve_status')));?> </div>
    <div class="form-group"> <?=form_input(array('name'=>'date_create','class'=>'form-control datepicker','placeholder'=>'วันที่ยื่นคำร้อง'),set_value('date_create',$this->input->get('date_create')));?> </div>
    <div class="form-group"> <?=form_input(array('name'=>'id_card','class'=>'form-control','placeholder'=>'ค้นหาหมายเลขบัตร'),set_value('id_card',$this->input->get('id_card')));?> </div>
    <div class="form-group"> <?=form_submit('','ค้นหา',array('class'=>'btn btn-default pull-right'));?> </div>
    <?=anchor_popup($uri_string.'&export=1','ส่งออก',array('class'=>'btn btn-default'));?>
    <?=form_close();?>
  </div>
  <table class="table table-condensed table-hover">
    <thead> <tr> <th>ประเภทรายการ</th> <th>ผลสอบ</th> <th>ผู้ยื่นคำร้อง</th> <th>วันที่ยื่นคำร้อง</th> <th>วันที่แก้ไข</th> <th>วันที่หมดอายุ</th> <th>วันที่เข้าสอบ</th> <th></th> </tr> </thead>
    <tbody>
      <?php foreach ($requests as $value) : ?>
        <?php $expired = strtotime('+30 days',strtotime($value['date_create']));
          $type = (isset($value['category']) ? 'standards' : 'skills'); ?>
          <tr class="rows" style="display:none;">
            <td>
              <?=isset($value['category']) ? $value['category'] : 'หนังสือรับรองความรู้ความสามารถ';
              if ($value['approve_status'] == NULL) : ?>
                <span class="label label-primary">ใหม่</span>
              <?php elseif ($value['approve_status'] === 'reject'): ?>
                <span class="label label-info">รอ</span>
              <?php endif; ?>
            </td>
            <td>
            <?php if ($value['approve_status'] === 'accept') :
              if ($value['status'] === 'ผ่าน') : ?>
                <a href="#" class="label label-success" data-toggle="modal" data-target="#approve_status<?=$value['id'].$value['user_id'];?>">ผ่าน</a>
              <?php elseif ($value['status'] === 'ไม่ผ่าน') : ?>
                <a href="#" class="label label-warning" data-toggle="modal" data-target="#approve_status<?=$value['id'].$value['user_id'];?>">ไม่ผ่าน</a>
              <?php else: ?>
                <a href="#" class="label label-default" data-toggle="modal" data-target="#approve_status<?=$value['id'].$value['user_id'];?>">เลือก</a>
              <?php endif; ?>
              <div class="modal fade" id="approve_status<?=$value['id'].$value['user_id'];?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog">
                  <?=form_open('admin/approve/status',array('class'=>'form-horizontal'));?>
                  <?=form_hidden('id',$value[rtrim($type,'s').'_id']);?>
                  <?=form_hidden('type',$type);?>
                  <div class="modal-content">
                    <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h4 class="modal-title">ระบุสถานะผลการสอบ</h4> </div>
                    <div class="modal-body">
                      <div class="form-group"> <?=form_label('ผลการสอบ','status',array('class'=>'control-label col-md-4'));?>
                        <div class="col-md-8"> <?=form_dropdown(array('name'=>'status','class'=>'form-control'),array(''=>'เลือกรายการ','ผ่าน'=>'ผ่าน','ไม่ผ่าน'=>'ไม่ผ่าน'),set_value('status',$value['status']));?> </div>
                      </div>
                    </div>
                    <div class="modal-footer"> <button type="submit" class="btn btn-primary btn-block">ยืนยัน</button> </div>
                    <?=form_close();?>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            </td>
            <td><?=$value['email'];?></td>
            <td><?=$value['date_create'];?></td>
            <td><?=$value['date_update'];?></td>
            <td><?=$value['date_create']; ?></td>
            <td>
              <a href="#" class="label label-success" data-toggle="modal" data-target="#approve_date<?=$value['id'].$value['user_id'];?>"><?=$value['approve_schedule'];?></a>
              <div class="modal fade" id="approve_date<?=$value['id'].$value['user_id'];?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog">
                  <?=form_open('admin/approve/schedule',array('class'=>'form-horizontal'));?>
                  <?=form_hidden('id',$value[rtrim($type,'s').'_id']);?>
                  <?=form_hidden('type',$type);?>
                  <div class="modal-content">
                    <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h4 class="modal-title">ระบุสถานะผลการสอบ</h4> </div>
                    <div class="modal-body">
                      <div class="form-group"> <?=form_label('กำหนดวันที่เข้าสอบ','status',array('class'=>'control-label col-md-4'));?>
                        <div class="col-md-8"> <?=form_input(array('name'=>'approve_schedule','class'=>'form-control datepicker'),set_value('approve_schedule',$value['approve_schedule']));?> </div>
                      </div>
                    </div>
                    <div class="modal-footer"> <button type="submit" class="btn btn-primary btn-block">ยืนยัน</button> </div>
                    <?=form_close();?>
                  </div>
                </div>
              </div>
            </td>
            <td><?=anchor('admin/approve/view/'.$value['user_id'].'/'.$type,'ดู',array('class'=>'label label-default','target'=>'_blank'));?></td>
          </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="panel-footer"> <?=anchor('#','ก่อนหน้า',array('class'=>'label label-default','id'=>'more'));?> </div>
</div>

<script type="text/javascript">
$(function(){
  $('.datepicker').datepicker({
    language: 'th',
    format: 'dd-mm-yyyy'
  });

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