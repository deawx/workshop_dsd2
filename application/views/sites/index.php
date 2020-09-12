<?php $this->load->view('_partials/messages'); ?>
<div class="panel panel-default">
  <div class="panel-heading"> <h3 class="panel-title">ข้อมูลรายละเอียดหน้าเว็บทั้งหมด <?=count($sites);?> รายการ</h3> </div>
  <div class="panel-body"> </div>
  <table class="table table-condensed table-hover">
    <thead>
      <tr>
        <th style="width: 25%;">ชื่อไซต์</th>
        <th style="width: 65%;">รายละเอียด</th>
        <th style="width: 10%"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($sites as $key => $value) : ?>
        <tr>
          <td><?=$value['name'];?></td>
          <td><?=character_limiter($value['body'], 100);?></td>
          <td>
            <?=anchor('admin/sites/edit/'.$value['id'],'แก้ไข',array('class'=>'btn btn-info btn-sm'));?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
