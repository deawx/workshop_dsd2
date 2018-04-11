<div class="form-group"> <?=form_label('ระดับการศึกษาสูงสุด*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?php $e = array(''=>'เลือกรายการ',
      'ประถมศึกษา'=>'ประถมศึกษา','ม.3'=>'ม.3','ม.6'=>'ม.6','ปก.ศ.ต้น'=>'ปก.ศ.ต้น',
      'ปก.ศ.สูง/อนุปริญญา'=>'ปก.ศ.สูง/อนุปริญญา','ปวช.'=>'ปวช.','ปวท.'=>'ปวท.','ปวส.'=>'ปวส.',
      'ปริญญาตรี'=>'ปริญญาตรี','ปริญญาโท'=>'ปริญญาโท','ปริญญาเอก'=>'ปริญญาเอก');
    echo form_dropdown(array('name'=>'education[degree]','class'=>'form-control'),$e,set_value('education[degree]'));?>
  </div>
</div>
<div class="form-group"> <?=form_label('สาขา*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'education[branch]','class'=>'form-control'),set_value('education[branch]'));?> </div>
</div>
<div class="form-group"> <?=form_label('สถานศึกษา*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'education[place]','class'=>'form-control'),set_value('education[place]'));?> </div>
</div>
<div class="form-group"> <?=form_label('อาชีพ*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'work[career]','class'=>'form-control'),set_value('work[career]'));?> </div>
</div>
<div class="form-group"> <?=form_label('สถานที่ทำงาน*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'work[place]','class'=>'form-control'),set_value('work[place]'));?> </div>
</div>
<div class="form-group">
  <?=form_label('มีความประสงค์จะขอหนังสือรับรองความรู้ความสามารถ ในสาขาอาชีพ*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?=form_input(array('name'=>'career[1]','class'=>'form-control','id'=>'career1','placeholder'=>'สาขาอาชีพ..'),set_value('career[1]'));?>
    <p class="help-block"></p>
    <?=form_input(array('name'=>'career[2]','class'=>'form-control','id'=>'career2','placeholder'=>'สาขาอาชีพ..'),set_value('career[2]'));?>
    <p class="help-block"></p>
    <?=form_input(array('name'=>'career[3]','class'=>'form-control','id'=>'career3','placeholder'=>'สาขาอาชีพ..'),set_value('career[3]'));?>
    <p class="help-block"></p>
    <?=form_input(array('name'=>'career[4]','class'=>'form-control','id'=>'career4','placeholder'=>'สาขาอาชีพ..'),set_value('career[4]'));?>
    <p class="help-block"></p>
    <?=form_input(array('name'=>'career[5]','class'=>'form-control','id'=>'career5','placeholder'=>'สาขาอาชีพ..'),set_value('career[5]'));?>
    <p class="help-block"></p>
  </div>
</div>
