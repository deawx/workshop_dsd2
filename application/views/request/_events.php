<div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h4 class="modal-title">กำหนดตารางวันสอบของท่าน</h4> </div>
<div class="modal-body">
  <?php if (count($requests)>0) : ?>
    <?=form_open('account/request/calendar',array('class'=>'form-horizontal'));?>
    <div class="form-group"> <?=form_label('รายการคำร้อง','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9">
        <?php foreach ($requests as $key => $value) :
          $category = isset($value['category']) ? $value['category'] : 'ใบรับรองความรู้ความสามารถ';
          $type = isset($value['category']) ? 'standard' : 'skill'; ?>
          <label><?=form_radio('code',$value['date_create'],set_radio('code',$value['date_create']),array('data-type'=>$type));?><?=$category;?></label>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('วันที่เลือกสอบ','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9"> <?=form_input(array('name'=>'approve_schedule','class'=>'form-control','readonly'=>TRUE,'value'=>$approve_schedule));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ช่วงเวลาสอบ','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9">
        <?=form_dropdown(array('name'=>'approve_time','class'=>'form-control'),array(''=>'เลือกรายการ','ช่วงเช้า 09.00 - 12.00 น.'=>'ช่วงเช้า 09.00 - 12.00 น.','ช่วงบ่าย 13.00 - 16.00 น.'=>'ช่วงบ่าย 13.00 - 16.00 น.'));?>
        <p class="help-block">*ให้เลือกในกรณีสอบมาตรฐานฝีมือแรงงาน</p>
      </div>
    </div>
    <div class="form-group"> <?=form_label('','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9"> <?=form_submit('','บันทึกข้อมูล',array('class'=>'btn btn-primary btn-block'));?> </div>
    </div>
    <?=form_close();?>
  <?php else: ?>
    <h4>ท่านยังไม่มีรายการเลือกวันสอบ</h4>
  <?php endif; ?>
</div>
<ul>
  <li>ผู้เข้าสอบมาตรฐานฝีมือแรงงานแห่งชาติจำนวน <?=$standard;?> รายการ (ช่วงเช้า <?=$morning;?> / ช่วงบ่าย <?=$afternoon;?>)</li>
  <li>ผู้เข้าสอบรับรองความรู้ความสามารถจำนวน <?=$skill;?> รายการ</li>
</ul>
<div class="modal-footer" style="padding:0;">
  <table class="table table-bordered">
    <thead> <tr> <th class="text-center">ผู้เข้าสอบ</th> <th class="text-center">ประเภท</th> <th class="text-center">ช่วงเวลา</th> </tr> </thead>
    <tbody>
      <?php if (count($events)>0) :
        foreach ($events as $key => $value) : ?>
          <tr>
            <td class="text-left"><?=$value['name'];?></td>
            <td style="width:30%;"><?=$value['job'];?></td>
            <td style="width:25%;"><?=$value['time'];?></td>
          </tr>
        <?php endforeach;
      endif; ?>
    </tbody>
  </table>
</div>
