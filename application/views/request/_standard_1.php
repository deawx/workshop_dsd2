<div class="form-group"> <?=form_label('หน่วยงาน*','department',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'department','class'=>'form-control','readonly'=>TRUE),set_value('department','ศูนย์พัฒนาฝีมือแรงงานจังหวัดประจวบคีรีขันธ์'));?> </div>
</div>
<div class="form-group"> <?=form_label('สาขาอาชีพ*','branch',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'branch','class'=>'form-control'),set_value('branch'));?> </div>
</div>
<div class="form-group"> <?=form_label('ระดับ*','level',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_dropdown(array('name'=>'level','class'=>'form-control'),array(''=>'เลือกรายการ','1'=>'1','2'=>'2','3'=>'3'),set_value('level'));?> </div>
</div>
<div class="form-group"> <?=form_label('ประเภทการสอบ*','category',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $c = array(''=>'เลือกรายการ',
      'ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ'=>'ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ',
      'ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ'=>'ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ',
      'ทดสอบฝีมือแรงงานตามความต้องการของสถานประกอบกิจการ'=>'ทดสอบฝีมือแรงงานตามความต้องการของสถานประกอบกิจการ',
      'ทดสอบ/รับรองฝีมือแรงงานนานาชาติ(ช่างเชื่อมมาตรฐานสากล)'=>'ทดสอบ/รับรองฝีมือแรงงานนานาชาติ(ช่างเชื่อมมาตรฐานสากล)');
    echo form_dropdown(array('name'=>'category','class'=>'form-control','id'=>'ctg'),$c,set_value('category'));?>
  </div>
</div>
<div class="form-group"> <?=form_label('ประวัติการเข้าทดสอบ','used',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?php $tf = array(''=>'เลือกรายการ','เคย'=>'เคย','ไม่เคย'=>'ไม่เคย');
    echo form_dropdown(array('name'=>'used','class'=>'form-control','id'=>'tf'),$tf,set_value('used'));?>
  </div>
</div>
<div class="form-group"> <?=form_label('สถานที่เข้ารับการทดสอบ','used_place',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $t = array(''=>'เลือกรายการ',
      'จากกรมพัฒนาฝีมือแรงงาน'=>'จากกรมพัฒนาฝีมือแรงงาน',
      'ในสถานประกอบกิจการ'=>'ในสถานประกอบกิจการ',
      'จากหน่วยงานราชการอื่น'=>'จากหน่วยงานราชการอื่น');
    echo form_dropdown(array('name'=>'used_place','class'=>'form-control tf_t'),$t,set_value('used_place'));?>
    <p class="help-block">*ให้เลือกกรณีเคยมีประวัติการเข้าทดสอบ</p>
  </div>
</div>
<div class="form-group"> <?=form_label('เหตุผลที่สมัครทดสอบ','reason',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $r = array(
      'ต้องการทราบฝีมือและความสามารถ'=>'ต้องการทราบฝีมือและความสามารถ',
      'ต้องการมีงานทำ'=>'ต้องการมีงานทำ','เพื่อปรับหรือเลื่อนระดับตำแหน่งงาน'=>'เพื่อปรับหรือเลื่อนระดับตำแหน่งงาน',
      'เพื่อปรับรายได้ให้สูงขึ้น'=>'เพื่อปรับรายได้ให้สูงขึ้น','ได้รับการสนับสนุนจากหัวหน้า/ผู้บังคับบัญชา'=>'ได้รับการสนับสนุนจากหัวหน้า/ผู้บังคับบัญชา',
      'ไปทำงานในต่างประเทศ'=>'ไปทำงานในต่างประเทศ');
    echo form_dropdown(array('name'=>'reason','class'=>'form-control tf_f','multiple'=>TRUE),$r,set_value('reason'));?>
    <p class="help-block">*กดปุ่ม ctrl บนคีย์บอร์ดหากต้องการเลือกหลายรายการ</p>
  </div>
</div>
<div class="form-group"> <?=form_label('แหล่งที่ทราบข่าว','source',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $s = array(
      'วิทยุ'=>'วิทยุ','โทรทัศน์'=>'โทรทัศน์','สื่อสิ่งพิมพ์'=>'สื่อสิ่งพิมพ์',
      'ป้ายประกาศ'=>'ป้ายประกาศ','อินเตอร์เน็ต'=>'อินเตอร์เน็ต',
      'สถาบัน/ศูนย์พัฒนาฝีมือแรงงาน'=>'สถาบัน/ศูนย์พัฒนาฝีมือแรงงาน',
      'หน่วยงานอื่นสังกัดกระทรวงแรงงาน'=>'หน่วยงานอื่นสังกัดกระทรวงแรงงาน',
      'อบจ./อบต.'=>'อบจ./อบต.','พ่อ แม่ ญาติ พี่น้อง เพื่อน'=>'พ่อ แม่ ญาติ พี่น้อง เพื่อน',
      'กลุ่มอาชีพ กลุ่มสตรี กลุ่มสหกรณ์ กลุ่มออมทรัพย์'=>'กลุ่มอาชีพ กลุ่มสตรี กลุ่มสหกรณ์ กลุ่มออมทรัพย์','นายจ้าง'=>'นายจ้าง');
    echo form_dropdown(array('name'=>'source','class'=>'form-control tf_f','multiple'=>TRUE),$s,set_value('source'));?>
    <p class="help-block">*กดปุ่ม ctrl บนคีย์บอร์ดหากต้องการเลือกหลายรายการ</p>
  </div>
</div>
