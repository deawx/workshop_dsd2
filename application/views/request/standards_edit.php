<?php $this->load->view('_partials/messages'); ?>
*หมายเหตุจากผู้อนุมัติ : <p class="text-warning"> <?=$standard['approve_remark'];?></p>
<div class="panel panel-warning">
  <div class="panel-heading"> <h3 class="panel-title"> แก้ไขข้อมูลรายการขอสอบมาตรฐานฝีมือแรงงาน </h3> </div>
  <?=form_open_multipart(uri_string(),array('class'=>'form-horizontal','autocomplete'=>'off'));?>
  <?=form_hidden('approve_status',$standard['approve_status']);?>
  <?=form_hidden('id',$standard['id']);?>
  <div class="panel-body">

    <div class="form-group"> <?=form_label('หน่วยงาน','department',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'department','class'=>'form-control'),set_value('department',isset($standard['department'])?$standard['department']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('สาขาอาชีพ','branch',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'branch','class'=>'form-control'),set_value('branch',isset($standard['branch'])?$standard['branch']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ระดับ','level',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_dropdown(array('name'=>'level','class'=>'form-control'),array(''=>'เลือกรายการ','1'=>'1','2'=>'2','3'=>'3'),set_value('level',isset($standard['level'])?$standard['level']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ประเภทการสอบ','category',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php $c = array(''=>'เลือกรายการ','ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ'=>'ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ',
          'ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ'=>'ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ',
          'ทดสอบฝีมือแรงงานตามความต้องการของสถานประกอบกิจการ'=>'ทดสอบฝีมือแรงงานตามความต้องการของสถานประกอบกิจการ',
          'ทดสอบ/รับรองฝีมือแรงงานนานาชาติ(ช่างเชื่อมมาตรฐานสากล)'=>'ทดสอบ/รับรองฝีมือแรงงานนานาชาติ(ช่างเชื่อมมาตรฐานสากล)');
        echo form_dropdown(array('name'=>'category','class'=>'form-control','id'=>'ctg'),$c,set_value('category',isset($standard['category'])?$standard['category']:NULL));?>
      </div>
    </div>

    <hr>

    <div class="form-group"> <?=form_label('ความต้องการหางาน','need_work_status',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php $tt = array(''=>'เลือกรายการ','ไม่ต้องการ'=>'ไม่ต้องการ','ต้องการจัดหางานในประเทศ'=>'ต้องการจัดหางานในประเทศ','ต้องการจัดหางานในต่างประเทศ'=>'ต้องการจัดหางานในต่างประเทศ');
        echo form_dropdown(array('name'=>'need_work_status','class'=>'form-control','id'=>'need_work_status'),$tt,set_value('need_work_status',isset($standard['need_work_status'])?$standard['need_work_status']:NULL));?>
      </div>
    </div>
    <div id="local">
      <div class="form-group"> <?=form_label('ตำแหน่ง/อาชีพ','need_work_position',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'need_work_position','class'=>'form-control'),set_value('need_work_position',isset($standard['need_work_position'])?$standard['need_work_position']:NULL)); ?> </div>
      </div>
      <div class="form-group"> <?=form_label('กลุ่มอุตสาหกรรม','need_work_group',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'need_work_group','class'=>'form-control'),set_value('need_work_group',isset($standard['need_work_group'])?$standard['need_work_group']:NULL)); ?> <p class="help-block">*ให้เลือกกรรณีจัดหางานในประเทศ</p> </div>
      </div>
    </div>
    <div id="abroad">
      <div class="form-group"> <?=form_label('ประเทศที่จะไปทำงาน','need_work_country',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'need_work_country','class'=>'form-control'),set_value('need_work_country',isset($standard['need_work_country'])?$standard['need_work_country']:NULL)); ?> <p class="help-block">*ให้เลือกกรณีจัดหางานในต่างประเทศ</p> </div> </div>
    </div>
    <hr>
    <div id="ctg_ctn">
      <div class="form-group"> <?=form_label('ชื่อบริษัทจัดหางาน/สถานที่ทำงาน','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[agent]','class'=>'form-control'),set_value('work_abroad[agent]',isset($work_abroad['agent'])?$work_abroad['agent']:NULL));?> <p class="help-block">*กรณีทดสอบฝีมือแรงงานเพื่อไปทำงานในต่างประเทศ</p> </div>
      </div>
      <div class="form-group"> <?=form_label('ชื่อบริษัทนายจ้าง','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[company]','class'=>'form-control'),set_value('work_abroad[company]',isset($work_abroad['company'])?$work_abroad['company']:NULL));?> </div>
      </div>
      <div class="form-group"> <?=form_label('เลขที่/หมู่ที่/ชื่อหน่วยงาน','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[address]','class'=>'form-control'),set_value('work_abroad[address]',isset($work_abroad['address'])?$work_abroad['address']:NULL));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[street]','class'=>'form-control'),set_value('work_abroad[street]',isset($work_abroad['street'])?$work_abroad['street']:NULL));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ตำบล','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[tambon]','class'=>'form-control'),set_value('work_abroad[tambon]',isset($work_abroad['tambon'])?$work_abroad['tambon']:NULL));?> </div>
      </div>
      <div class="form-group"> <?=form_label('อำเภอ','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[amphur]','class'=>'form-control'),set_value('work_abroad[amphur]',isset($work_abroad['amphur'])?$work_abroad['amphur']:NULL));?> </div>
      </div>
      <div class="form-group"> <?=form_label('จังหวัด','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[province]','class'=>'form-control'),set_value('work_abroad[province]',isset($work_abroad['province'])?$work_abroad['province']:NULL));?> </div>
      </div>
      <div class="form-group"> <?=form_label('รหัสไปรษณีย์','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[zip]','class'=>'form-control zip'),set_value('work_abroad[zip]',isset($work_abroad['zip'])?$work_abroad['zip']:NULL));?> </div>
      </div>
      <div class="form-group"> <?=form_label('เบอร์โทรศัพท์','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[phone]','class'=>'form-control tel'),set_value('work_abroad[phone]',isset($work_abroad['phone'])?$work_abroad['phone']:NULL));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ประเทศที่จะไปทำงาน','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[country]','class'=>'form-control'),set_value('work_abroad[country]',isset($work_abroad['country'])?$work_abroad['country']:NULL)); ?> </div>
      </div>
      <div class="form-group"> <?=form_label('ระยะเวลาจ้าง(ปี)','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[duration]','class'=>'form-control','id'=>'duration','maxlength'=>'2'),set_value('work_abroad[duration]',isset($work_abroad['duration'])?$work_abroad['duration']:NULL));?> </div>
      </div>
    </div>

    <div class="form-group"> <?=form_label('ประเภทผู้สมัคร','type',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php $c = array(''=>'เลือกรายการ','ผู้รับการฝึกจาก กพร.'=>'ผู้รับการฝึกจาก กพร.','จากสถานศึกษา'=>'จากสถานศึกษา',
        'จากภาครัฐ'=>'จากภาครัฐ','จากภาคเอกชน'=>'จากภาคเอกชน','บุคคลทั่วไป'=>'บุคคลทั่วไป');
        echo form_dropdown(array('name'=>'type','class'=>'form-control'),$c,set_value('type',isset($standard['type'])?$standard['type']:NULL));?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('สภาพร่างกาย','health',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php $h = array(''=>'เลือกรายการ','ปกติ'=>'ปกติ','พิการ'=>'พิการ');
        echo form_dropdown(array('name'=>'health','class'=>'form-control','id'=>'health'),$h,set_value('health',isset($standard['health'])?$standard['health']:NULL));?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('ความพิการ','health_status',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php $hs = array('การมองเห็น'=>'การมองเห็น','การได้ยิน'=>'การได้ยิน','การเคลื่อนไหว'=>'การเคลื่อนไหว');
        echo form_dropdown(array('name'=>'health_status','class'=>'form-control','id'=>'health_status'),$hs,set_value('health_status',isset($standard['health_status'])?$standard['health_status']:NULL));?>
        <p class="help-block">*ให้เลือกกรณีสถาพร่างกายพิการ</p>
      </div>
    </div>
    <div class="form-group"> <?=form_label('เอกสารที่แนบมาด้วย','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[refer]'),'สำเนาวุฒิการศึกษาหรือหนังสือรับรองการทำงาน',set_checkbox('reference[refer]','สำเนาวุฒิการศึกษาหรือหนังสือรับรองการทำงาน',(isset($reference['refer']))));?>สำเนาวุฒิการศึกษาหรือหนังสือรับรองการทำงาน</label> </div>
        <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[copy]'),'สำเนาบัตรประจำตัวประชาชนหรือสำเนาทะเบียนบ้าน',set_checkbox('reference[copy]','สำเนาบัตรประจำตัวประชาชนหรือสำเนาทะเบียนบ้าน',(isset($reference['copy']))));?>สำเนาบัตรประจำตัวประชาชนหรือสำเนาทะเบียนบ้าน</label> </div>
        <p class="help-block"></p>
        <?=form_input(array('name'=>'reference[etc]','class'=>'form-control','placeholder'=>'อื่นๆ'),set_value('reference[etc]',isset($reference['etc'])?$reference['etc']:NULL));?>
        <p class="help-block">*ข้าพเจ้าขอรับรองว่าข้อความข้างต้นเป็นความจริงทุกประการและได้แนบหลักฐานการสมัครมาด้วย</p>
      </div>
    </div>
    <hr>
    <div class="form-group"> <?=form_label('แนบไฟล์เอกสารหลักฐาน','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_upload(array('name'=>'file_1','accept'=>'image/*')); ?> <br>
        <?=($standard['file_1']!='')?img('uploads/'.$standard['file_1'],NULL,array('class'=>'img-responsive','style'=>'width:150px;height:150px;')):NULL;?> <br>
        <?php echo form_upload(array('name'=>'file_2','accept'=>'image/*')); ?> <br>
        <?=($standard['file_2']!='')?img('uploads/'.$standard['file_2'],NULL,array('class'=>'img-responsive','style'=>'width:150px;height:150px;')):NULL;?> <br>
        <?php echo form_upload(array('name'=>'file_3','accept'=>'image/*')); ?> <br>
        <?=($standard['file_3']!='')?img('uploads/'.$standard['file_3'],NULL,array('class'=>'img-responsive','style'=>'width:150px;height:150px;')):NULL;?> <br>
        <?php echo form_upload(array('name'=>'file_4','accept'=>'image/*')); ?> <br>
        <?=($standard['file_4']!='')?img('uploads/'.$standard['file_4'],NULL,array('class'=>'img-responsive','style'=>'width:150px;height:150px;')):NULL;?> <br>
        <p class="help-block">*รองรับไฟล์รูปภาพที่มีขนาดไม่เกิน 2MB</p>
      </div>
    </div>
    <?php if ($standard['approve_status'] !== 'accept') : ?>
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
  var work_category = $('#work_category');
  var ctg = $('#ctg');
  var ctg_ctn = $('#ctg_ctn :input');
  var work_type = $('#work_type');
  var work_status = $('#work_status');
  var work_yes = $('#work_yes :input');
  var need_work_status = $('#need_work_status');
  var local = $('div#local :input');
  var abroad = $('div#abroad :input');
  var health = $('#health');

  <?php if ($standard['work_status'] == 'ผู้มีงานทำ') : ?>
  work_yes.prop('disabled',false);
  $('#work_no').prop('disabled',true);
  <?php if ($work_yes['category'] == 'ทำงานภาครัฐ') : ?>
  $('#work_group').prop('disabled',true);
  <?php else: ?>
  $('#work_group').prop('disabled',false);
  <?php endif; ?>
  <?php elseif ($standard['work_status'] == 'ผู้ไม่มีงานทำ') : ?>
  work_yes.prop('disabled',true);
  $('#work_no').prop('disabled',false);
  <?php else: ?>
  work_yes.prop('disabled',true);
  $('#work_no').prop('disabled',true);
  <?php endif; ?>
  work_status.on('change',function(){
    if (this.value === 'ผู้มีงานทำ') {
      work_yes.prop('disabled',false);
      $('#work_no').prop('disabled',true);
      $('#work_group').prop('disabled',false);
    } else if (this.value === 'ผู้ไม่มีงานทำ') {
      work_yes.prop('disabled',true);
      $('#work_no').prop('disabled',false);
      $('#work_group').prop('disabled',true);
    } else {
      work_yes.prop('disabled',true);
      $('#work_no').prop('disabled',true);
      $('#work_group').prop('disabled',true);
    }
  });

  work_category.on('change',function(){
    $.post('../get_work_type/'+this.value,function(data) {
      work_type.empty();
      $.each(data,function(key,value) {
        work_type.append('<option value="'+key+'">'+value+'</option>');
      });
    });
    if (this.value !== 'ทำงานภาครัฐ') {
      $('#work_group').prop('disabled',false);
    } else {
      $('#work_group').prop('disabled',true);
    }
  });

  <?php if ($standard['need_work_status'] == 'ไม่ต้องการ') : ?>
  local.prop('disabled',true);
  abroad.prop('disabled',true);
  <?php elseif ($standard['need_work_status'] == 'ต้องการจัดหางานในประเทศ') : ?>
  local.prop('disabled',false);
  abroad.prop('disabled',true);
  <?php else: ?>
  local.prop('disabled',true);
  abroad.prop('disabled',false);
  <?php endif; ?>
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

  $('#work_no').editableSelect();
  $('#work_group').editableSelect();
  $('#health_status').editableSelect();

  $('#id_card').inputmask('9999999999999');
  $('.zip').inputmask('99999');
  $('.tel').inputmask('9999999999');
});
</script>
