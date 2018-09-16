<div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h4 class="modal-title">กำหนดตารางวันสอบของท่าน</h4> </div>
<div class="modal-body">
  <?php if ( ! empty($requests)) : ?>
    <?=form_open('account/request/calendars',array('class'=>'form-horizontal'));?>
    <div class="form-group"> <?=form_label('รายการคำร้อง','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9">
        <?php foreach ($requests as $key => $value) :
          $category = isset($value['category']) ? $value['category'] : 'ใบรับรองความรู้ความสามารถ';
          $type = isset($value['category']) ? 'standards' : 'skills'; ?>
          <label><?=form_radio('type',$type,NULL,array('data-type'=>$type));?><?=$category;?></label>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('วันที่เลือกสอบ','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-6"> <?=form_input(array('name'=>'approve_schedule','class'=>'form-control','readonly'=>TRUE,'value'=>$approve_schedule));?> </div>
      <div class="col-md-3"> <?=form_submit('','บันทึกข้อมูล',array('class'=>'btn btn-primary btn-block'));?> </div>
    </div>
    <?=form_close();?>
  <?php else: ?>
    <h4>ท่านยังไม่มีรายการเลือกวันสอบ</h4>
  <?php endif; ?>
</div>
<hr>
<ul>
  <li>ผู้เข้าสอบมาตรฐานฝีมือแรงงานแห่งชาติจำนวน <?=$standard;?> รายการ</li>
  <li>ผู้เข้าสอบรับรองความรู้ความสามารถจำนวน <?=$skill;?> รายการ</li>
</ul>
<div class="modal-footer" style="padding-left:0px;padding-right:0px;">
  <table class="table table-bordered" style="margin-bottom:0px;">
    <thead> <tr> <th class="text-center" style="width:5%;">ที่</th> <th class="text-center" style="width:40%;">ประเภท</th> <th class="text-center">ผู้เข้าสอบ</th> </tr> </thead>
    <tbody>
      <?php if (count($events)>0) :
        foreach ($events as $key => $value) : ?>
          <tr>
            <td class="text-center"><?=++$key;?></td>
            <td class="text-left"><?=$value['job'];?></td>
            <td class="text-left"><?=$value['name'].' ('.$value['englishname'].')';?></td>
          </tr>
        <?php endforeach;
      endif; ?>
    </tbody>
  </table>
</div>
