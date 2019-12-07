<?php
$address = unserialize($user['address']);
$address_current = unserialize($user['address_current']);
?>
<?php $this->load->view('_partials/messages'); ?>
<div class="panel panel-success">
  <div class="panel-heading"> <h3 class="panel-title"> แก้ไขข้อมูลที่อยู่ <small><?=lang('edit_user_subheading');?></small> </h3> </div>
  <div class="panel-body">
    <?=form_open(uri_string(),array('class'=>'form-horizontal'));?>
    <?=form_hidden('id',$user['id']);?>
    <div class="form-group"> <?=form_label('ที่อยู่เลขที่(ตามทะเบียนบ้าน)*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[address]','class'=>'form-control'),set_value('address[address]',$address['address']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[street]','class'=>'form-control'),set_value('address[street]',($address['street'] != '' ? $address['street'] : '-')));?> </div>
    </div>
    <div class="form-group"> <?=form_label('จังหวัด*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_dropdown(array('name'=>'address[province]','class'=>'form-control','id'=>'province'),dropdown_province(),set_value('address[province]',$address['province']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('อำเภอ','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_dropdown(array('name'=>'address[amphur]','class'=>'form-control','id'=>'amphur'),dropdown_amphur(),set_value('address[amphur]',$address['amphur']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ตำบล','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_dropdown(array('name'=>'address[tambon]','class'=>'form-control','id'=>'district'),dropdown_district(),set_value('address[tambon]',$address['tambon']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('รหัสไปรษณีย์*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[zip]','class'=>'form-control zip','maxlength'=>'5'),set_value('address[zip]',$address['zip']));?> </div>
    </div>
    <hr>
    <div class="form-group"> <?=form_label('','exist',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <div class="checkbox"> <label> <?=form_checkbox(array('name'=>'exist','id'=>'exist'),'1',set_checkbox('exist','1',($user['address_current'])));?> ใช้ที่อยู่ตามทะเบียนบ้าน </label> </div>
      </div>
    </div>
    <div id="exist_ctn">
      <div class="form-group"> <?=form_label('ที่อยู่เลขที่(ปัจจุบัน)','address_current',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[address]','class'=>'form-control'),set_value('address_current[address]',$address_current['address']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'address_current[street]','class'=>'form-control'),set_value('address_current[street]',$address_current['street']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('จังหวัด','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_dropdown(array('name'=>'address_current[province]','class'=>'form-control','id'=>'province_current'),dropdown_province(),set_value('address_current[province]',$address_current['province']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('อำเภอ','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_dropdown(array('name'=>'address_current[amphur]','class'=>'form-control','id'=>'amphur_current'),dropdown_amphur(),set_value('address_current[amphur]',$address_current['amphur']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ตำบล','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_dropdown(array('name'=>'address_current[tambon]','class'=>'form-control','id'=>'district_current'),dropdown_district(),set_value('address_current[tambon]',$address_current['tambon']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('รหัสไปรษณีย์','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'address_current[zip]','class'=>'form-control zip','maxlength'=>'5'),set_value('address_current[zip]',$address_current['zip']));?> </div>
      </div>
    </div>
    <div class="form-group"> <?=form_label('','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?=form_submit('','ยืนยัน',array('class'=>'btn btn-primary'));?>
        <?=form_reset('','ล้าง',array('class'=>'btn btn-default'));?>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>

<script type="text/javascript">
$(function(){
  var exist = $('#exist');
  var exist_ctn = $('div#exist_ctn :input');
  var province = $('#province');
  var amphur = $('#amphur');
  var district = $('#district');
  var province_current = $('#province_current');
  var amphur_current = $('#amphur_current');
  var district_current = $('#district_current');
  var zip = $('.zip');

  <?php if ( ! $user['address_current']) : ?>
    exist.prop('checked',true);
    exist_ctn.prop('disabled',true);
  <?php endif; ?>
  exist.on('change',function(){
    if (this.checked) {
      exist_ctn.prop('disabled',true);
    } else {
      exist_ctn.prop('disabled',false);
    }
  });

  zip.inputmask('99999');

  province.on('change',function(){
    amphur.empty();
    district.empty();
    $.post('get_address/amphur/'+this.value,function(data){
      $.each(data,function(key,value) {
        amphur.append('<option value="'+value.id+'">'+value.name+'</option>');
      });
    });
  });

  amphur.on('change',function(){
    district.empty();
    $.post('get_address/district/'+this.value,function(data){
      $.each(data,function(key,value) {
        district.append('<option value="'+value.id+'">'+value.name+'</option>');
      });
    });
  });

  province_current.on('change',function(){
    amphur_current.empty();
    district_current.empty();
    $.post('get_address/amphur/'+this.value,function(data){
      $.each(data,function(key,value) {
        amphur_current.append('<option value="'+value.id+'">'+value.name+'</option>');
      });
    });
  });

  amphur_current.on('change',function(){
    district_current.empty();
    $.post('get_address/district/'+this.value,function(data){
      $.each(data,function(key,value) {
        district_current.append('<option value="'+value.id+'">'+value.name+'</option>');
      });
    });
  });
});
</script>
