<div class="form-group"> <?=form_label('เอกสารหลักฐานประกอบการยื่นคำขอ*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[picture]'),'(1)รูปถ่ายหน้าตรง ขนาด 1 X 1.5 นิ้ว พื้นหลังสีขาว ซึ่งถ่ายมาแล้วไม่เกินหกเดือน จำนวน 2 รูป',set_value('reference[picture]'));?>(1)รูปถ่ายหน้าตรง ขนาด 1 X 1.5 นิ้ว พื้นหลังสีขาว ซึ่งถ่ายมาแล้วไม่เกินหกเดือน จำนวน 2 รูป</label> </div>
    <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[copy]'),'(2)สำเนาบัตรประจำตัวประชาชน',set_value('reference[copy]'));?>(2)สำเนาบัตรประจำตัวประชาชน</label> </div>
    <p class="help-block"></p>
    <?=form_input(array('name'=>'reference[etc]','class'=>'form-control','placeholder'=>'(3)เอกสารอื่นๆ โปรดระบุ'));?>
    <p class="help-block">*ข้าพเจ้าขอรับรองว่าข้อความดังกล่าวข้างต้นและเอกสารหลักฐานที่แนบคำขอถูกต้องและเป็นความจริงทุกประการ</p>
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
