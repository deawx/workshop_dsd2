<div class="panel panel-success">
  <div class="panel-heading"> <h3 class="panel-title"> </h3> </div>
  <?=form_open_multipart(uri_string(),array('class'=>'form-horizontal','autocomplete'=>'off'));?>
  <?=form_hidden('user_id',$this->session->id);?>
  <div class="panel-body">

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
    <hr>
    <div class="form-group">
      <?=form_label('ความต้องการหางาน*','need_work_status',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php $tt = array(''=>'เลือกรายการ',
          'ไม่ต้องการ'=>'ไม่ต้องการ',
          'ต้องการจัดหางานในประเทศ'=>'ต้องการจัดหางานในประเทศ',
          'ต้องการจัดหางานในต่างประเทศ'=>'ต้องการจัดหางานในต่างประเทศ');
        echo form_dropdown(array('name'=>'need_work_status','class'=>'form-control','id'=>'need_work_status'),$tt,set_value('need_work_status'));?>
      </div>
    </div>
    <div id="local">
      <div class="form-group"> <?=form_label('ตำแหน่ง/อาชีพ*','need_work_position',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'need_work_position','class'=>'form-control'),set_value('need_work_position')); ?> </div>
      </div>
      <div class="form-group"> <?=form_label('กลุ่มอุตสาหกรรม*','need_work_group',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'need_work_group','class'=>'form-control'),set_value('need_work_group')); ?>
          <p class="help-block">*ให้เลือกกรณีจัดหางานในประเทศ</p>
        </div>
      </div>
    </div>
    <div id="abroad">
      <div class="form-group"> <?=form_label('ประเทศที่จะไปทำงาน*','need_work_country',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'need_work_country','class'=>'form-control'),set_value('need_work_country')); ?>
          <p class="help-block">*ให้เลือกกรณีจัดหางานในต่างประเทศ</p>
        </div>
      </div>
    </div>
    <hr>
    <div id="ctg_ctn">
      <div class="form-group"> <?=form_label('ชื่อบริษัทจัดหางาน/สถานที่ทำงาน*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[agent]','class'=>'form-control'),set_value('work_abroad[agent]'));?>
          <p class="help-block">*กรณีทดสอบฝีมือแรงงานเพื่อไปทำงานในต่างประเทศ</p>
        </div>
      </div>
      <div class="form-group"> <?=form_label('ชื่อบริษัทนายจ้าง*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[company]','class'=>'form-control'),set_value('work_abroad[company]'));?>
        </div>
      </div>
      <div class="form-group"> <?=form_label('เลขที่/หมู่ที่/ชื่อหน่วยงาน*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[address]','class'=>'form-control'),set_value('work_abroad[address]'));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[street]','class'=>'form-control'),set_value('work_abroad[street]'));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ตำบล','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[tambon]','class'=>'form-control'),set_value('work_abroad[tambon]'));?> </div>
      </div>
      <div class="form-group"> <?=form_label('อำเภอ','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[amphur]','class'=>'form-control'),set_value('work_abroad[amphur]'));?> </div>
      </div>
      <div class="form-group"> <?=form_label('จังหวัด*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[province]','class'=>'form-control'),set_value('work_abroad[province]'));?> </div>
      </div>
      <div class="form-group"> <?=form_label('รหัสไปรษณีย์*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[zip]','class'=>'form-control zip'),set_value('work_abroad[zip]'));?> </div>
      </div>
      <div class="form-group"> <?=form_label('เบอร์โทรศัพท์*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[phone]','class'=>'form-control tel'),set_value('work_abroad[phone]'));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ประเทศที่จะไปทำงาน*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[country]','class'=>'form-control'),set_value('work_abroad[country]')); ?> </div>
      </div>
      <div class="form-group"> <?=form_label('ระยะเวลาจ้าง*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[duration]','class'=>'form-control','id'=>'duration','maxlength'=>'2'),set_value('work_abroad[duration]'));?> </div>
      </div>
    </div>

    <div class="form-group"> <?=form_label('ประเภทผู้สมัคร*','type',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php $c = array(''=>'เลือกรายการ',
        'ผู้รับการฝึกจาก กพร.'=>'ผู้รับการฝึกจาก กพร.',
        'จากสถานศึกษา'=>'จากสถานศึกษา',
        'จากภาครัฐ'=>'จากภาครัฐ',
        'จากภาคเอกชน'=>'จากภาคเอกชน',
        'บุคคลทั่วไป'=>'บุคคลทั่วไป');
        echo form_dropdown(array('name'=>'type','class'=>'form-control'),$c,set_value('type'));?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('สภาพร่างกาย*','health',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php $h = array(''=>'เลือกรายการ','ปกติ'=>'ปกติ','พิการ'=>'พิการ');
        echo form_dropdown(array('name'=>'health','class'=>'form-control','id'=>'health'),$h,set_value('health'));?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('ความพิการ','health_status',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php $hs = array('การมองเห็น'=>'การมองเห็น','การได้ยิน'=>'การได้ยิน','การเคลื่อนไหว'=>'การเคลื่อนไหว');
        echo form_dropdown(array('name'=>'health_status','class'=>'form-control','id'=>'health_status'),$hs,set_value('health_status'));?>
        <p class="help-block">*ให้เลือกกรณีสถาพร่างกายพิการ</p>
      </div>
    </div>
    <div class="form-group"> <?=form_label('เอกสารที่แนบมาด้วย*','reference',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[refer]'),'สำเนาวุฒิการศึกษาหรือหนังสือรับรองการทำงาน',set_value('reference[refer]'));?>สำเนาวุฒิการศึกษาหรือหนังสือรับรองการทำงาน</label> </div>
        <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[copy]'),'สำเนาบัตรประจำตัวประชาชนหรือสำเนาทะเบียนบ้าน',set_value('reference[copy]'));?>สำเนาบัตรประจำตัวประชาชนหรือสำเนาทะเบียนบ้าน</label> </div>
        <p class="help-block"></p>
        <?=form_input(array('name'=>'reference[etc]','class'=>'form-control','placeholder'=>'อื่นๆ'),set_value(''));?>
        <p class="help-block">*ข้าพเจ้าขอรับรองว่าข้อความข้างต้นเป็นความจริงทุกประการและได้แนบหลักฐานการสมัครมาด้วย</p>
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
    <div class="form-group"> <?=form_label('ยอมรับการเปิดเผยข้อมูล*','allow',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <div class="checkbox"> <label><?=form_checkbox(array('name'=>'allow'),TRUE,set_value('allow'));?>ยอมรับ</label> </div>
        <br>
        <p>*ข้าพเจ้ายินยอมเปิดเผยข้อมูลส่วนบุคคลให้กับหน่วยงานของรัฐและเอกชนทราบเพื่อประโยชน์ในการจัดหางานและบริหารแรงงานต่อไป</p>
        <p>*มีค่าธรรมเนียมในการประเมิน 100 บาทถ้วน</p>
      </div>
    </div>
    <hr>
    <div class="form-group"> <?=form_label('','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_submit('','ยืนยัน',array('class'=>'btn btn-primary btn-block'));?> </div>
    </div>

  </div>
  <?=form_close();?>
</div>

<script type="text/javascript">
$(function() {

  var work_category = $('#work_category');
  var ctg = $('#ctg');
  var ctg_ctn = $('#ctg_ctn :input');
  var need_work_status = $('#need_work_status');
  var local = $('div#local :input');
  var abroad = $('div#abroad :input');
  var health = $('#health');
  var tf = $('#tf');
  var tf_t = $('.tf_t');
  var tf_f = $('.tf_f');

  tf_t.prop('disabled',true);
  tf_f.prop('disabled',true);
  tf.on('change',function(){
    if (this.value === 'เคย') {
      tf_t.prop('disabled',false);
      tf_f.prop('disabled',true);
    } else if(this.value === 'ไม่เคย') {
      tf_t.prop('disabled',true);
      tf_f.prop('disabled',false);
    } else {
      tf_t.prop('disabled',true);
      tf_f.prop('disabled',true);
    }
  });

  local.prop('disabled',true);
  abroad.prop('disabled',true);
  need_work_status.on('change',function(){
    if (this.value === 'ไม่ต้องการ') {
      local.prop('disabled',true);
      abroad.prop('disabled',true);
    } else if(this.value === 'ต้องการจัดหางานในประเทศ') {
      local.prop('disabled',false);
      abroad.prop('disabled',true);
    } else if(this.value === 'ต้องการจัดหางานในต่างประเทศ') {
      local.prop('disabled',true);
      abroad.prop('disabled',false);
    } else {
      local.prop('disabled',true);
      abroad.prop('disabled',true);
    }
  });

  ctg_ctn.prop('disabled',true);
  ctg.on('change',function(){
    if (this.value === 'ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ') {
      ctg_ctn.prop('disabled',false);
    } else {
      ctg_ctn.prop('disabled',true);
    }
  });

  $('#health_status').prop('disabled',true);
  health.on('change',function(){
    if (this.value == 'พิการ') {
      $('#health_status').prop('disabled',false);
    } else {
      $('#health_status').prop('disabled',true);
    }
  });
  $('#health_status').editableSelect();

  $('#age').inputmask('99');
  $('#id_card').inputmask('9999999999999');
  $('.zip').inputmask('99999');
  $('.tel').inputmask('9999999999');
});
</script>
