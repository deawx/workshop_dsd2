<div class="panel panel-success">
  <div class="panel-heading"> <h3 class="panel-title"> </h3> </div>
  <?=form_open_multipart(uri_string(),array('name'=>'skill','class'=>'form-horizontal','autocomplete'=>'off'));?>
  <?=form_hidden('user_id',$this->session->id);?>
  <div class="panel-body">

  <div class="form-group">
    <?=form_label('มีความประสงค์จะขอหนังสือรับรองความรู้ความสามารถ ในสาขาอาชีพ*','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?=form_input(array('name'=>'career[1]','class'=>'form-control','id'=>'career1','placeholder'=>'สาขาอาชีพ..'),set_value('career[1]'));?>
      <p class="help-block"></p>
      <?=form_input(array('name'=>'career[2]','class'=>'form-control','id'=>'career2','placeholder'=>'สาขาอาชีพ..'),set_value('career[2]'));?>
      <p class="help-block"></p>
      <?=form_input(array('name'=>'career[3]','class'=>'form-control','id'=>'career3','placeholder'=>'สาขาอาชีพ..'),set_value('career[3]'));?>
      <p class="help-block"></p>
      <?=form_input(array('name'=>'career[4]','class'=>'form-control','id'=>'career4','placeholder'=>'สาขาอาชีพ..'),set_value('career[4]'));?>
      <p class="help-block"></p>
      <?=form_input(array('name'=>'career[5]','class'=>'form-control','id'=>'career5','placeholder'=>'สาขาอาชีพ..'),set_value('career[5]'));?>
      <p class="help-block"></p>
    </div>
  </div>

  <hr>

  <div class="form-group"> <?=form_label('เอกสารหลักฐานประกอบการยื่นคำขอ*','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[picture]'),'(1)รูปถ่ายหน้าตรง ขนาด 1 X 1.5 นิ้ว พื้นหลังสีขาว ซึ่งถ่ายมาแล้วไม่เกินหกเดือน จำนวน 2 รูป',set_value('reference[picture]'));?>(1)รูปถ่ายหน้าตรง ขนาด 1 X 1.5 นิ้ว พื้นหลังสีขาว ซึ่งถ่ายมาแล้วไม่เกินหกเดือน จำนวน 2 รูป</label> </div>
      <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[copy]'),'(2)สำเนาบัตรประจำตัวประชาชน',set_value('reference[copy]'));?>(2)สำเนาบัตรประจำตัวประชาชน</label> </div>
      <p class="help-block"></p>
      <?=form_input(array('name'=>'reference[etc]','class'=>'form-control','placeholder'=>'(3)เอกสารอื่นๆ โปรดระบุ'));?>
      <p class="help-block">*ข้าพเจ้าขอรับรองว่าข้อความดังกล่าวข้างต้นและเอกสารหลักฐานที่แนบคำขอถูกต้องและเป็นความจริงทุกประการ</p>
    </div>
  </div>
  <div class="form-group"> <?=form_label('แนบไฟล์เอกสารหลักฐาน','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php echo form_upload(array('name'=>'file_1','accept'=>'image/*')); ?> <br>
      <?php echo form_upload(array('name'=>'file_2','accept'=>'image/*')); ?> <br>
      <?php echo form_upload(array('name'=>'file_3','accept'=>'image/*')); ?> <br>
      <?php echo form_upload(array('name'=>'file_4','accept'=>'image/*')); ?>
      <p class="help-block">*รองรับไฟล์รูปภาพที่มีขนาดไม่เกิน 2MB</p>
    </div>
  </div>
  <div class="form-group"> <?=form_label('เอกสารสำคัญ*','needed',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <div class="checkbox"> <label><?=form_checkbox(array('name'=>'needed','required'=>TRUE),'1',set_value('needed'));?>สำเนาใบผ่านการสอบมาตรฐานฝีมือแรงงานแห่งชาติ</label> </div>
      <br>
      <p>*ข้าพเจ้าได้ผ่านการสอบมาตรฐานฝีมือแรงงานแล้วและพร้อมแนบสำเนาเอกสารดังกล่าวมาเพื่อขอรับการอนุมัติ</p>
      <p>*มีค่าธรรมเนียมในการประเมิน 1,000 บาทถ้วน</p>
    </div>
  </div>
  <div class="form-group"> <?=form_label('','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_submit('','ยืนยัน',array('class'=>'btn btn-primary btn-block'));?> </div>
  </div>

  </div>
  <div class="panel-footer"> </div>
  <?=form_close();?>
</div>

<script type="text/javascript">
$(function() {

  var exist = $('#exist');
  var exist_ctn = $('div#exist_ctn :input');
  exist.prop('checked',true);
  exist_ctn.prop('disabled',true);
  exist.on('change',function(){
    if (this.checked) {
      exist_ctn.prop('disabled',true);
    } else {
      exist_ctn.prop('disabled',false);
    }
  });

  $('#id_card').inputmask('9999999999999');
  $('.zip').inputmask('99999');
  $('.tel').inputmask('9999999999');

});
</script>
