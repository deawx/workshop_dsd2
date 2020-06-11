<div class="panel panel-success">
  <div class="panel-heading"> <h3 class="panel-title">รายการคำร้องที่ดำเนินการอยู่ <?=count($requests);?> รายการ</h3> </div>
  <div class="panel-body"> </div>
  <table class="table table-hover">
    <thead> <tr> <th>ประเภทรายการ</th> <th>วันที่เข้าสอบ</th> <th>บัตรคิว</th> <th>ผลการสอบ</th> </tr> </thead>
    <tbody>
      <?php foreach ($requests as $key => $value) : ?>
        <tr class="rows">
          <td><?=isset($value['category']) ? $value['category'] : 'หนังสือรับรองความรู้ความสามารถ';?></td>
          <td><?=($value['approve_schedule']!='0000-00-00') ? date('d-m-Y',strtotime($value['approve_schedule'])) : 'รอ';?></td>
          <td><?=($value['approve_schedule']!='0000-00-00') ? anchor_popup('account/request/queue/'.$value['user_id'].'/'.(isset($value['category']) ? 'standards' : 'skills'),'ดู',array('class'=>'btn btn-info btn-sm')) : 'รอ';?></td>
          <td><?=($value['approve_schedule']!='0000-00-00') ? $value['status'] : 'รอ';?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<p>* เมื่อสอบผ่านแล้วกรุณามารับเอกสารภายใน 15 วัน</p>
