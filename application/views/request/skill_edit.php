<?php
$profile = unserialize($skill['profile']);
$address = unserialize($skill['address']);
$address_current = unserialize($skill['address_current']);
$education = unserialize($skill['education']);
$work = unserialize($skill['work']);
$reference = unserialize($skill['reference']);
?>
<?php $this->load->view('_partials/messages'); ?>
*หมายเหตุจากผู้อนุมัติ : <p class="text-warning"> <?=$skill['approve_remark'];?></p>
<div class="panel panel-warning">
  <div class="panel-heading"> <h3 class="panel-title"> แก้ไขข้อมูลรายการขอสอบรับรองความรู้ความสามารถ </h3> </div>
  <?=form_open(uri_string(),array('name'=>'skill','class'=>'form-horizontal','autocomplete'=>'off'));?>
  <?=form_hidden('id',$skill['id']);?>
  <div class="panel-body">
    <div class="form-group"> <?=form_label('คำนำหน้าชื่อ','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php $tt = array(''=>'เลือกรายการ','นาย'=>'นาย','นาง'=>'นาง','นางสาว'=>'นางสาว');
        echo form_dropdown(array('name'=>'profile[title]','class'=>'form-control'),$tt,set_value('title',$profile['title']));?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('ชื่อ','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'profile[firstname]','class'=>'form-control'),set_value('firstname',isset($profile['firstname'])?$profile['firstname']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('นามสกุล','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'profile[lastname]','class'=>'form-control'),set_value('lastname',isset($profile['lastname'])?$profile['lastname']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ว/ด/ป เกิด','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-2">
        <?php $d = array(''=>'วัน'); foreach (range('1','31') as $value) $d[$value] = $value;
        echo form_dropdown(array('name'=>'d','class'=>'form-control'),$d,set_value('d',($profile['birthdate']) ? date('d',($profile['birthdate'])) : NULL));?>
      </div>
      <div class="col-md-3">
        <?=form_dropdown(array('name'=>'m','class'=>'form-control'),dropdown_month(),set_value('m',($profile['birthdate']) ? date('m',$profile['birthdate']) : NULL));?>
      </div>
      <div class="col-md-3"> <?php $y = array(''=>'ปี พ.ศ.'); foreach (range('2500',(date('Y')+543)) as $value) $y[$value] = $value;
        echo form_dropdown(array('name'=>'y','class'=>'form-control'),$y,set_value('y',($profile['birthdate']) ? date('Y',$profile['birthdate'])+543 : NULL));?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('สัญชาติ','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'profile[nationality]','class'=>'form-control'),set_value('nationality',isset($profile['nationality'])?$profile['nationality']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('หมู่โลหิต','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'profile[blood]','class'=>'form-control'),set_value('blood',isset($profile['blood'])?$profile['blood']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('หมายเลขบัตรประชาชน','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'profile[id_card]','class'=>'form-control','id'=>'id_card'),set_value('id_card',isset($profile['id_card'])?$profile['id_card']:NULL));?> </div>
    </div>

    <div class="form-group"> <?=form_label('ที่อยู่เลขที่(ตามทะเบียนบ้าน)','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[address]','class'=>'form-control'),set_value('address[address]',isset($address['address'])?$address['address']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[street]','class'=>'form-control'),set_value('address[street]',isset($address['street'])?$address['street']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ตำบล','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[tambon]','class'=>'form-control'),set_value('address[tambon]',isset($address['tambon'])?$address['tambon']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('หมู่','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[moo]','class'=>'form-control'),set_value('address[moo]',isset($address['moo'])?$address['moo']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ซอย','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[soi]','class'=>'form-control'),set_value('address[soi]',isset($address['soi'])?$address['soi']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('อำเภอ','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[amphur]','class'=>'form-control'),set_value('address[amphur]',isset($address['amphur'])?$address['amphur']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('จังหวัด','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[province]','class'=>'form-control'),set_value('address[province]',isset($address['province'])?$address['province']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('รหัสไปรษณีย์','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[zip]','class'=>'form-control zip','maxlength'=>'5'),set_value('address[zip]',isset($address['zip'])?$address['zip']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('โทรศัพท์','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[phone]','class'=>'form-control tel'),set_value('address[phone]',isset($address['phone'])?$address['phone']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('โทรสาร','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[fax]','class'=>'form-control tel'),set_value('address[fax]',isset($address['fax'])?$address['fax']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('อีเมล์','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[email]','class'=>'form-control'),set_value('address[email]',isset($address['email'])?$address['email']:NULL));?> </div>
    </div>
    <hr>
    <div class="form-group"> <?=form_label('ที่อยู่เลขที่(ปัจจุบัน)','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[address]','class'=>'form-control'),set_value('address_current[address]',isset($address_current['address'])?$address_current['address']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[street]','class'=>'form-control'),set_value('address_current[street]',isset($address_current['street'])?$address_current['street']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ตำบล','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[tambon]','class'=>'form-control'),set_value('address_current[tambon]',isset($address_current['tambon'])?$address_current['tambon']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('หมู่','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[moo]','class'=>'form-control'),set_value('address_current[moo]',isset($address_current['moo'])?$address_current['moo']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ซอย','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[soi]','class'=>'form-control'),set_value('address_current[soi]',isset($address_current['soi'])?$address_current['soi']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('อำเภอ','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[amphur]','class'=>'form-control'),set_value('address_current[amphur]',isset($address_current['amphur'])?$address_current['amphur']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('จังหวัด','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[province]','class'=>'form-control'),set_value('address_current[province]',isset($address_current['province'])?$address_current['province']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('รหัสไปรษณีย์','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[zip]','class'=>'form-control zip','maxlength'=>'5'),set_value('address_current[zip]',isset($address_current['zip'])?$address_current['zip']:NULL));?> </div>
    </div>
    <hr>
    <div class="form-group"> <?=form_label('โทรศัพท์','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[phone]','class'=>'form-control tel'),set_value('address_current[phone]',isset($address_current['phone'])?$address_current['phone']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('โทรสาร','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[fax]','class'=>'form-control tel'),set_value('address_current[fax]',isset($address_current['fax'])?$address_current['fax']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('อีเมล์','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[email]','class'=>'form-control'),set_value('address_current[email]',isset($address_current['email'])?$address_current['email']:NULL));?> </div>
    </div>

    <div class="form-group"> <?=form_label('วุฒิการศึกษา','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'education[degree]','class'=>'form-control'),set_value('education[degree]',isset($education['degree'])?$education['degree']:NULL));?> </div>
    </div>
    <div class="form-group">
      <?=form_label('สาขา','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'education[branch]','class'=>'form-control'),set_value('education[branch]',isset($education['branch'])?$education['branch']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('สถานศึกษา','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'education[place]','class'=>'form-control'),set_value('education[place]',isset($education['place'])?$education['place']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('อาชีพ','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'work[career]','class'=>'form-control'),set_value('work[career]',isset($work['career'])?$work['career']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('สถานที่ทำงาน','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'work[place]','class'=>'form-control'),set_value('work[place]',isset($work['place'])?$work['place']:NULL));?> </div>
    </div>
    <div class="form-group"> <?=form_label('มีความประสงค์จะขอหนังสือรับรองความรู้ความสามารถ ในสาขาอาชีพ','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?=form_input(array('name'=>'career[1]','class'=>'form-control','id'=>'career1','placeholder'=>'สาขาอาชีพ..'),set_value('career[1]',isset($skill['career1'])?$skill['career1']:NULL));?>
        <p class="help-block"></p>
        <?=form_input(array('name'=>'career[2]','class'=>'form-control','id'=>'career2','placeholder'=>'สาขาอาชีพ..'),set_value('career[2]',isset($skill['career2'])?$skill['career2']:NULL));?>
        <p class="help-block"></p>
        <?=form_input(array('name'=>'career[3]','class'=>'form-control','id'=>'career3','placeholder'=>'สาขาอาชีพ..'),set_value('career[3]',isset($skill['career3'])?$skill['career3']:NULL));?>
        <p class="help-block"></p>
        <?=form_input(array('name'=>'career[4]','class'=>'form-control','id'=>'career4','placeholder'=>'สาขาอาชีพ..'),set_value('career[4]',isset($skill['career4'])?$skill['career4']:NULL));?>
        <p class="help-block"></p>
        <?=form_input(array('name'=>'career[5]','class'=>'form-control','id'=>'career5','placeholder'=>'สาขาอาชีพ..'),set_value('career[5]',isset($skill['career5'])?$skill['career5']:NULL));?>
        <p class="help-block"></p>
      </div>
    </div>

    <div class="form-group"> <?=form_label('เอกสารหลักฐานประกอบการยื่นคำขอ','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[picture]'),'picture',set_checkbox('reference[picture]','picture',isset($reference['picture'])));?>(1)รูปถ่ายหน้าตรง ขนาด 1 X 1.5 นิ้ว พื้นหลังสีขาว ซึ่งถ่ายมาแล้วไม่เกินหกเดือน จำนวน 2 รูป</label> </div>
        <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[copy]'),'copy',set_checkbox('reference[copy]','copy',isset($reference['copy'])));?>(2)สำเนาบัตรประจำตัวประชาชน</label> </div>
        <p class="help-block"></p>
        <?=form_input(array('name'=>'reference[etc]','class'=>'form-control','placeholder'=>'(๓)เอกสารอื่นๆ โปรดระบุ'),set_value('reference[copy]',$reference['etc']));?>
        <p class="help-block">*ข้าพเจ้าขอรับรองว่าข้อความดังกล่าวข้างต้นและเอกสารหลักฐานที่แนบคำขอถูกต้องและเป็นความจริงทุกประการ</p>
      </div>
    </div>
    <div class="form-group"> <?=form_label('','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?=form_submit('','ยืนยัน',array('class'=>'btn btn-primary'));?>
        <?=form_button('','ปิดหน้านี้',array('class'=>'btn btn-default','onclick'=>'window.close()'));?>
      </div>
    </div>

  </div>
  <div class="panel-footer"> </div>
  <?=form_close();?>
</div>

<script type="text/javascript">
$(function(){
  $('#id_card').inputmask('9999999999999');
  $('.zip').inputmask('99999');
  $('.tel').inputmask('9999999999');
});
</script>
