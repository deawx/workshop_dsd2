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
  <div class="form-group"> <?=form_label('ระยะเวลาจ้าง(ปี)*','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[duration]','class'=>'form-control','id'=>'duration','maxlength'=>'2'),set_value('work_abroad[duration]'));?> </div>
  </div>
</div>
