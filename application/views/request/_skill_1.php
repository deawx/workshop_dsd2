<div class="form-group"> <?=form_label('คำนำหน้าชื่อ*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_dropdown(array('name'=>'profile[title]','class'=>'form-control'),dropdown_title(),set_value('profile[title]',$user['title']));?>
  </div>
</div>
<div class="form-group"> <?=form_label('ชื่อ*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'profile[firstname]','class'=>'form-control'),set_value('profile[firstname]',$user['firstname']));?> </div>
</div>
<div class="form-group"> <?=form_label('นามสกุล*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'profile[lastname]','class'=>'form-control'),set_value('profile[lastname]',$user['lastname']));?> </div>
</div>
<div class="form-group"> <?=form_label('ว/ด/ป เกิด*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-2"> <?php $d = array(''=>'วัน');
    foreach (range('1','31') as $value) $d[$value] = $value;
    echo form_dropdown(array('name'=>'d','class'=>'form-control'),$d,set_value('d',($user['birthdate']) ? date('d',($user['birthdate'])) : NULL));?>
  </div>
  <div class="col-md-3">
    <?=form_dropdown(array('name'=>'m','class'=>'form-control'),dropdown_month(),set_value('m',($user['birthdate']) ? date('m',$user['birthdate']) : NULL));?>
  </div>
  <div class="col-md-3"> <?php $y = array(''=>'ปี พ.ศ.');
    foreach (range('2500',(date('Y')+543)) as $value) $y[$value] = $value;
    echo form_dropdown(array('name'=>'y','class'=>'form-control'),$y,set_value('y',($user['birthdate']) ? date('Y',$user['birthdate'])+543 : NULL));?>
  </div>
</div>
<div class="form-group"> <?=form_label('สัญชาติ*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'profile[nationality]','class'=>'form-control'),set_value('profile[nationality]',$user['nationality']));?> </div>
</div>
<div class="form-group"> <?=form_label('หมู่โลหิต','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'profile[blood]','class'=>'form-control'),set_value('profile[blood]'));?> </div>
</div>
<div class="form-group"> <?=form_label('หมายเลขบัตรประชาชน*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'profile[id_card]','class'=>'form-control','id'=>'id_card'),set_value('profile[id_card]',$user['id_card']));?> </div>
</div>
