<?php
$education = unserialize($user['education']);
?>
<?php $this->load->view('_partials/messages'); ?>
<div class="panel panel-success">
  <div class="panel-heading"> <h3 class="panel-title"> แก้ไขข้อมูลการศึกษา <small><?=lang('edit_user_subheading');?></small> </h3> </div>
  <div class="panel-body">
    <?=form_open(uri_string(),array('class'=>'form-horizontal'));?>
    <?=form_hidden('id',$user['id']);?>
    <div class="form-group"> <?=form_label('ระดับการศึกษาสูงสุด*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php $e = array(''=>'เลือกรายการ',
          'ประถมศึกษา'=>'ประถมศึกษา',
          'ม.3'=>'ม.3',
          'ม.6'=>'ม.6',
          'ปก.ศ.ต้น'=>'ปก.ศ.ต้น',
          'ปก.ศ.สูง/อนุปริญญา'=>'ปก.ศ.สูง/อนุปริญญา',
          'ปวช.'=>'ปวช.',
          'ปวท.'=>'ปวท.',
          'ปวส.'=>'ปวส.',
          'ปริญญาตรี'=>'ปริญญาตรี',
          'ปริญญาโท'=>'ปริญญาโท',
          'ปริญญาเอก'=>'ปริญญาเอก');
        echo form_dropdown(array('name'=>'education[degree]','class'=>'form-control'),$e,set_value('education[degree]',$education['degree']));?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('สาขาวิชา*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'education[department]','class'=>'form-control'),set_value('education[department]',$education['department']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('สถานศึกษา*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'education[place]','class'=>'form-control'),set_value('education[place]',$education['place']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('จังหวัด*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_dropdown(array('name'=>'education[province]','class'=>'form-control'),dropdown_province(),set_value('education[province]',$education['province']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ปี พ.ศ.ที่สำเร็จ*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php $y = array(''=>'ปี');
        foreach (range((date('Y')+543),'2520') as $value) $y[$value] = $value;
        echo form_dropdown(array('name'=>'education[year]','class'=>'form-control'),$y,set_value('education[year]',$education['year']));?>
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
});
</script>
