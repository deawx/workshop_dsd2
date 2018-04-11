<?php
$address = unserialize($user['address']);
$address_current = unserialize($user['address_current']);
?>
<div class="form-group"> <?=form_label('ที่อยู่เลขที่(ตามทะเบียนบ้าน)*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address[address]','class'=>'form-control'),set_value('address[address]',$address['address']));?> </div>
</div>
<div class="form-group"> <?=form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address[street]','class'=>'form-control'),set_value('address[street]',$address['street']));?> </div>
</div>
<div class="form-group"> <?=form_label('ตำบล*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address[tambon]','class'=>'form-control'),set_value('address[tambon]',$address['tambon']));?> </div>
</div>
<div class="form-group"> <?=form_label('หมู่','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address[moo]','class'=>'form-control'),set_value('address[moo]'));?> </div>
</div>
<div class="form-group"> <?=form_label('ซอย','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address[soi]','class'=>'form-control'),set_value('address[soi]'));?> </div>
</div>
<div class="form-group"> <?=form_label('อำเภอ*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address[amphur]','class'=>'form-control'),set_value('address[amphur]',$address['amphur']));?> </div>
</div>
<div class="form-group"> <?=form_label('จังหวัด*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address[province]','class'=>'form-control'),set_value('address[province]',$address['province']));?> </div>
</div>
<div class="form-group"> <?=form_label('รหัสไปรษณีย์*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address[zip]','class'=>'form-control zip','maxlength'=>'5'),set_value('address[zip]',$address['zip']));?> </div>
</div>
<div class="form-group"> <?=form_label('โทรศัพท์*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address[phone]','class'=>'form-control tel'),set_value('address[phone]',$user['phone']));?> </div>
</div>
<div class="form-group"> <?=form_label('โทรสาร','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address[fax]','class'=>'form-control tel'),set_value('address[fax]',$user['fax']));?> </div>
</div>
<div class="form-group"> <?=form_label('อีเมล์*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address[email]','class'=>'form-control'),set_value('address[email]',$user['email']));?> </div>
</div>
<hr>
<div class="form-group"> <?=form_label('','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <div class="checkbox"> <label> <?=form_checkbox(array('name'=>'exist','id'=>'exist'));?>ใช้ที่อยู่ตามทะเบียนบ้าน </label> </div> </div>
</div>
<div id="exist_ctn">
  <div class="form-group"> <?=form_label('ที่อยู่เลขที่(ปัจจุบัน)','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address_current[address]','class'=>'form-control'),set_value('address_current[address]',$address_current['address']));?> </div>
  </div>
  <div class="form-group"> <?=form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'address_current[street]','class'=>'form-control'),set_value('address_current[street]',$address_current['street']));?> </div>
  </div>
  <div class="form-group"> <?=form_label('ตำบล','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'address_current[tambon]','class'=>'form-control'),set_value('address_current[tambon]',$address_current['tambon']));?> </div>
  </div>
  <div class="form-group"> <?=form_label('หมู่','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'address_current[moo]','class'=>'form-control'),set_value('address_current[moo]'));?> </div>
  </div>
  <div class="form-group"> <?=form_label('ซอย','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'address_current[soi]','class'=>'form-control'),set_value('address_current[soi]'));?> </div>
  </div>
  <div class="form-group"> <?=form_label('อำเภอ','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'address_current[amphur]','class'=>'form-control'),set_value('address_current[amphur]',$address_current['amphur']));?> </div>
  </div>
  <div class="form-group"> <?=form_label('จังหวัด','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'address_current[province]','class'=>'form-control'),set_value('address_current[province]',$address_current['province']));?> </div>
  </div>
  <div class="form-group"> <?=form_label('รหัสไปรษณีย์','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'address_current[zip]','class'=>'form-control zip','maxlength'=>'5'),set_value('address_current[zip]',$address_current['zip']));?> </div>
  </div>
  <div class="form-group"> <?=form_label('โทรศัพท์','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'address_current[phone]','class'=>'form-control tel'),set_value('address_current[phone]'));?> </div>
  </div>
  <div class="form-group"> <?=form_label('โทรสาร','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'address_current[fax]','class'=>'form-control tel'),set_value('address_current[fax]'));?> </div>
  </div>
  <div class="form-group"> <?=form_label('อีเมล์','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'address_current[email]','class'=>'form-control'),set_value('address_current[email]'));?> </div>
  </div>
</div>
