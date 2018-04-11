<div class="form-group"> <?=form_label('คำนำหน้าชื่อ*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'profile[title]','class'=>'form-control','value'=>$user['title'],'readonly'=>TRUE));?> </div>
</div>
<div class="form-group"> <?=form_label('ชื่อ*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'profile[firstname]','class'=>'form-control','value'=>$user['firstname'],'readonly'=>TRUE));?> </div>
</div>
<div class="form-group"> <?=form_label('นามสกุล*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'profile[lastname]','class'=>'form-control','value'=>$user['lastname'],'readonly'=>TRUE));?> </div>
</div>
<div class="form-group"> <?=form_label('ชื่อเต็ม(ภาษาอังกฤษ)*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'profile[englishname]','class'=>'form-control','value'=>$user['englishname'],'readonly'=>TRUE));?> </div>
</div>
<div class="form-group"> <?=form_label('ศาสนา*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'profile[religion]','class'=>'form-control','value'=>$user['religion'],'readonly'=>TRUE));?> </div>
</div>
<div class="form-group"> <?=form_label('สัญชาติ*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'profile[nationality]','class'=>'form-control','value'=>$user['nationality'],'readonly'=>TRUE));?> </div>
</div>
<div class="form-group"> <?=form_label('หมายเลขบัตรประชาชน*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'profile[id_card]','class'=>'form-control','id'=>'id_card','value'=>$user['id_card'],'readonly'=>TRUE));?> </div>
</div>
<div class="form-group"> <?=form_label('ว/ด/ป เกิด*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-2">
    <?php $d = array(''=>'วัน');
    foreach (range('1','31') as $value) $d[$value] = $value;
    echo form_dropdown(array('name'=>'d','class'=>'form-control','disabled'=>TRUE),$d,set_value('d',explode('-',$user['birthdate'])[2]));?>
  </div>
  <div class="col-md-3">
    <?=form_dropdown(array('name'=>'m','class'=>'form-control','disabled'=>TRUE),dropdown_month(),set_value('m',explode('-',$user['birthdate'])[1]));?>
  </div>
  <div class="col-md-3">
    <?php $y = array(''=>'ปี พ.ศ.');
    foreach (range('2500',(date('Y')+543)) as $value) $y[$value] = $value;
    echo form_dropdown(array('name'=>'y','class'=>'form-control','disabled'=>TRUE),$y,set_value('y',explode('-',$user['birthdate'])[0]));?>
  </div>
</div>
<div class="form-group"> <?=form_label('ที่อยู่เลขที่(ปัจจุบัน)*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address_current[address]','class'=>'form-control','readonly'=>TRUE,'value'=>$address_current['address']));?> </div>
</div>
<div class="form-group"> <?=form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address_current[street]','class'=>'form-control','readonly'=>TRUE,'value'=>$address_current['street']));?> </div>
</div>
<div class="form-group"> <?=form_label('ตำบล','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address_current[tambon]','class'=>'form-control','readonly'=>TRUE,'value'=>$address_current['tambon']));?> </div>
</div>
<div class="form-group"> <?=form_label('อำเภอ','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address_current[amphur]','class'=>'form-control','readonly'=>TRUE,'value'=>$address_current['amphur']));?> </div>
</div>
<div class="form-group"> <?=form_label('จังหวัด*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address_current[province]','class'=>'form-control','readonly'=>TRUE,'value'=>$address_current['province']));?> </div>
</div>
<div class="form-group"> <?=form_label('รหัสไปรษณีย์*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address_current[zip]','class'=>'form-control zip','readonly'=>TRUE,'value'=>$address_current['zip']));?> </div>
</div>
<div class="form-group"> <?=form_label('อีเมล์*','email',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_email(array('name'=>'address_current[email]','class'=>'form-control','readonly'=>TRUE,'value'=>$user['email']));?> </div>
</div>
<div class="form-group"> <?=form_label('โทรศัพท์*','phone',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address_current[phone]','class'=>'form-control tel','max_length'=>'10','readonly'=>TRUE,'value'=>$user['phone']));?> </div>
</div>
<div class="form-group"> <?=form_label('โทรสาร','fax',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address_current[fax]','class'=>'form-control tel','max_length'=>'10','readonly'=>TRUE,'value'=>$user['fax']));?> </div>
</div>
