<div class="panel panel-success">
  <div class="panel-heading"> <h3 class="panel-title">ประวัติการลงทะเบียนคำร้อง</h3> </div>
  <div class="panel-body">
    <p>*ระยะเวลาอนุมัติคำร้องภายในไม่เกิน 30 วัน</p>
    <p>*ตรวจสอบข้อมูลส่วนบุคคล, ที่อยู่อาศัย, การศึกษา, และการทำงานให้ครบถ้วน</p>
    <p>*ตรวจสอบการนำเข้าไฟล์เอกสารประกอบคำร้องให้ครบถ้วน</p>
    <p>*การยื่นคำร้องขอสอบรับรองความรู้ความสามารถต้องผ่านการสอบรับรองมาตรฐานฝีมือแรงงานก่อน</p>
  </div>
  <table class="table table-hover">
    <thead> <tr> <th>ประเภทรายการ</th> <th>ยื่นคำร้อง</th> <th>หมดอายุ</th> <th>สถานะ</th> <th></th> </tr> </thead>
    <tbody>
      <?php if ($standard) : ?>
        <tr>
          <td><?=$standard['category'];?></td>
          <td><?=$standard['date_create'];?></td>
          <td><?=date('Y-m-d',strtotime('+30 days',strtotime($standard['date_create'])));?></td>
          <td><?=$standard['approve_status'];?></td>
          <td><?=anchor_popup('account/request/standard/'.$standard['id'],'ดู');?></td>
        </tr>
      <?php endif; ?>
      <?php if ($skill) : ?>
        <tr>
          <td>สอบใบรับรองความรู้ความสามารถ</td>
          <td><?=$skill['date_create'];?></td>
          <td><?=date('Y-m-d',strtotime('+30 days',strtotime($skill['date_create'])));?></td>
          <td><?=$skill['approve_status'];?></td>
          <td><?=anchor_popup('account/request/skill/'.$skill['id'],'ดู');?></td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
  <div class="panel-footer"> </div>
</div>
