<?php $this->load->view('_partials/messages'); ?>
*หมายเหตุจากผู้อนุมัติ : <p class="text-warning"> <?=$skill['approve_remark'];?></p>
<div class="panel panel-warning">
  <div class="panel-heading"> <h3 class="panel-title"> แก้ไขข้อมูลรายการขอสอบรับรองความรู้ความสามารถ </h3> </div>
  <?=form_open_multipart(uri_string(),array('name'=>'skill','class'=>'form-horizontal','autocomplete'=>'off'));?>
  <?=form_hidden('approve_status',$skill['approve_status']);?>
  <?=form_hidden('id',$skill['id']);?>
  <div class="panel-body">

    <div class="form-group"> <?=form_label('มีความประสงค์จะขอหนังสือรับรองความรู้ความสามารถ ในสาขาอาชีพ','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?=form_input(array('name'=>'career[1]','class'=>'form-control','id'=>'career1','placeholder'=>'สาขาอาชีพ..'),set_value('career[1]',isset($skill['career1'])?$skill['career1']:NULL));?>
        <p class="help-block"></p>
        <?=form_input(array('name'=>'career[2]','class'=>'form-control','id'=>'career2','placeholder'=>'สาขาอาชีพ..'),set_value('career[2]',isset($skill['career2'])?$skill['career2']:NULL));?>
        <p class="help-block"></p>
        <?=form_input(array('name'=>'career[3]','class'=>'form-control','id'=>'career3','placeholder'=>'สาขาอาชีพ..'),set_value('career[3]',isset($skill['career3'])?$skill['career3']:NULL));?>
        <p class="help-block"></p>
        <?=form_input(array('name'=>'career[4]','class'=>'form-control','id'=>'career4','placeholder'=>'สาขาอาชีพ..'),set_value('career[4]',isset($skill['career4'])?$skill['career4']:NULL));?>
        <p class="help-block"></p>
        <?=form_input(array('name'=>'career[5]','class'=>'form-control','id'=>'career5','placeholder'=>'สาขาอาชีพ..'),set_value('career[5]',isset($skill['career5'])?$skill['career5']:NULL));?>
        <p class="help-block"></p>
      </div>
    </div>
    <hr>
    <div class="form-group"> <?=form_label('เอกสารหลักฐานประกอบการยื่นคำขอ','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[picture]'),'picture',set_checkbox('reference[picture]','picture',isset($reference['picture'])));?>(1)รูปถ่ายหน้าตรง ขนาด 1 X 1.5 นิ้ว พื้นหลังสีขาว ซึ่งถ่ายมาแล้วไม่เกินหกเดือน จำนวน 2 รูป</label> </div>
        <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[copy]'),'copy',set_checkbox('reference[copy]','copy',isset($reference['copy'])));?>(2)สำเนาบัตรประจำตัวประชาชน</label> </div>
        <p class="help-block"></p>
        <?=form_input(array('name'=>'reference[etc]','class'=>'form-control','placeholder'=>'(๓)เอกสารอื่นๆ โปรดระบุ'),set_value('reference[copy]',$reference['etc']));?>
        <p class="help-block">*ข้าพเจ้าขอรับรองว่าข้อความดังกล่าวข้างต้นและเอกสารหลักฐานที่แนบคำขอถูกต้องและเป็นความจริงทุกประการ</p>
      </div>
    </div>
    <div class="form-group"> <?=form_label('แนบไฟล์เอกสารหลักฐาน','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_upload(array('name'=>'file_1','accept'=>'image/*')); ?> <br>
        <?=($skill['file_1']!='')?img('uploads/'.$skill['file_1'],NULL,array('class'=>'img-responsive','style'=>'width:150px;height:150px;')):NULL;?> <br>
        <?php echo form_upload(array('name'=>'file_2','accept'=>'image/*')); ?> <br>
        <?=($skill['file_2']!='')?img('uploads/'.$skill['file_2'],NULL,array('class'=>'img-responsive','style'=>'width:150px;height:150px;')):NULL;?> <br>
        <?php echo form_upload(array('name'=>'file_3','accept'=>'image/*')); ?> <br>
        <?=($skill['file_3']!='')?img('uploads/'.$skill['file_3'],NULL,array('class'=>'img-responsive','style'=>'width:150px;height:150px;')):NULL;?> <br>
        <?php echo form_upload(array('name'=>'file_4','accept'=>'image/*')); ?> <br>
        <?=($skill['file_4']!='')?img('uploads/'.$skill['file_4'],NULL,array('class'=>'img-responsive','style'=>'width:150px;height:150px;')):NULL;?> <br>
        <p class="help-block">*รองรับไฟล์รูปภาพที่มีขนาดไม่เกิน 2MB</p>
      </div>
    </div>
    <?php if ($skill['approve_status'] !== 'accept') : ?>
      <hr>
      <div class="form-group"> <?=form_label('','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8">
          <?=form_submit('','ยืนยัน',array('class'=>'btn btn-primary'));?>
          <?=form_button('','ปิดหน้านี้',array('class'=>'btn btn-default','onclick'=>'window.close()'));?>
        </div>
      </div>
    <?php endif; ?>

  </div>
  <div class="panel-footer"> </div>
  <?=form_close();?>
</div>

<script type="text/javascript">
$(function(){
  $('#id_card').inputmask('9999999999999');
  $('.zip').inputmask('99999');
  $('.tel').inputmask('9999999999');
});
</script>
