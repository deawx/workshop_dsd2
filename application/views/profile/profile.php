<?php $this->load->view('_partials/messages'); ?>
<div class="panel panel-success">
  <div class="panel-heading"> <h3 class="panel-title"> แก้ไขข้อมูลส่วนตัว <small><?=lang('edit_user_subheading');?></small> </h3> </div>
  <div class="panel-body">
    <?=form_open(uri_string(),array('class'=>'form-horizontal'));?>
    <?=form_hidden('id',$user['id']);?>
    <div class="form-group">
      <?=form_label('คำนำหน้าชื่อ*','title',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_dropdown(array('name'=>'title','class'=>'form-control'),dropdown_title(),set_value('title',$user['title']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ชื่อ*','firstname',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'firstname','class'=>'form-control'),set_value('firstname',$user['firstname']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('นามสกุล*','lastname',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'lastname','class'=>'form-control'),set_value('lastname',$user['lastname']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ชื่อ-นามสกุล(ภาษาอังกฤษ)*','lastname',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'englishname','class'=>'form-control','oninput'=>"this.value = this.value.replace(/[^A-aZ-z .]/g, '').replace(/(\..*)\./g, '$1');"),set_value('englishname',$user['englishname']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('สัญชาติ*','nationality',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'nationality','class'=>'form-control'),set_value('nationality',$user['nationality']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ศาสนา*','religion',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'religion','class'=>'form-control'),set_value('religion',$user['religion']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('หมายเลขบัตรประชาชน*','id_card',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=
      form_input(
        array('name'=>'id_card','class'=>'form-control','id'=>'id_card','maxlength'=>'13','required'=>TRUE,'digits'=>TRUE),
        set_value('id_card',$user['id_card'])
      );?> </div>
    </div>
    <div class="form-group"> <?=form_label('ว/ด/ป เกิด*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-2">
        <?php $d = array(''=>'วัน');
        foreach (range('1','31') as $value) $d[$value] = $value;
        echo form_dropdown(array('name'=>'d','class'=>'form-control'),$d,set_value('d',explode('-',$user['birthdate'])[2]));?>
      </div>
      <div class="col-md-3">
        <?=form_dropdown(array('name'=>'m','class'=>'form-control'),dropdown_month(),set_value('m',explode('-',$user['birthdate'])[1]));?>
      </div>
      <div class="col-md-3">
        <?php $y = array(''=>'ปี พ.ศ.');
        foreach (range('2500',(date('Y')+543)) as $value) $y[$value] = $value;
        echo form_dropdown(array('name'=>'y','class'=>'form-control'),$y,set_value('y',explode('-',$user['birthdate'])[0]));?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('หมู่โลหิต*','blood',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'blood','class'=>'form-control'),set_value('blood',$user['blood']));?> </div>
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
  $('#id_card').inputmask('9999999999999');
});
</script>
