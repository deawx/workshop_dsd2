<?=$this->pagination->create_links();?>
<?php $this->load->view('_partials/messages'); ?>
<div class="panel panel-default">
  <div class="panel-heading"> <h3 class="panel-title">ข้อมูลสมาชิกทั้งหมด <?=count($users);?> รายการ</h3> </div>
  <div class="panel-body">
    <?=form_open(uri_string(),array('method'=>'get','class'=>'form-inline pull-right'));?>
    <div class="form-group"> <?=form_input(array('name'=>'q','class'=>'form-control','placeholder'=>'ค้นหาเลขบัตรประชาชน','value'=>$this->input->get('q')));?> </div>
    <div class="form-group"> <?=form_submit('','ค้นหา',array('class'=>'btn btn-default pull-right'));?> </div>
    <?=form_close();?>
  </div>
  <table class="table table-condensed table-hover">
    <thead> <tr> <th>ชื่อ-นามสกุล</th> <th>ชื่อสกุลภาษาอังกฤษ</th> <th>ชื่อล็อกอิน/เลขบัตรประชาชน</th> <th>วันที่สมัคร</th> <th style="width:10%"></th> </tr> </thead>
    <tbody>
      <?php foreach ($users as $value) : ?>
        <tr>
          <td><?=$value['title'].nbs().$value['firstname'].nbs().$value['lastname'];?></td>
          <td><?=$value['englishname'];?></td>
          <td><?=$value['username'];?></td>
          <td><?=date('d-m-Y',strtotime($value['date_create']));?></td>
          <td style="width:15%">
            <?=anchor('admin/user/edit/'.$value['id'],'แก้ไข',array('class'=>'btn btn-info btn-sm'));?>
            <?=anchor('admin/user/delete/'.$value['id'],'ลบ',array('class'=>'btn btn-danger btn-sm','onclick'=>"return confirm('ยืนยันการลบ?');"));?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
