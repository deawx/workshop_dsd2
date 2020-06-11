<div class="list-group">
  <a href="<?=site_url('account/request/standard');?>" class="list-group-item <?=($menu=='standard')?'active':'';?>">ขอสอบมาตรฐานฝีมือแรงงาน</a>
  <a href="<?=site_url('account/request/skill');?>" class="list-group-item <?=($menu=='skill')?'active':'';?>">
    ขอสอบรับรองความรู้ความสามารถ <span class="text-muted">(ผู้สมัครต้องผ่านการสอบมาตรฐานฝีมือแรงงานมาแล้วเท่านั้น)</span>
  </a>
</div>
<div class="list-group">
  <a href="<?=site_url('account/request/index');?>" class="list-group-item <?=($menu === 'index') ? 'active' : '';?>">ประวัติการยื่นคำร้อง</a>
  <!-- <a href="<?=site_url('account/request/calendars');?>" class="list-group-item <?=($menu === 'calendar') ? 'active' : '';?>">
    ตารางเลือกวันสอบ <span class="text-muted">(ผู้สมัครสามารถเลือกวันเข้าสอบได้หลังจากผ่านการอนุมัติคำร้องเรียบร้อยแล้ว)</span>
  </a> -->
  <a href="<?=site_url('account/request/result');?>" class="list-group-item <?=($menu === 'result') ? 'active' : '';?>">
    รายการตรวจผลการสอบ
  </a>
</div>
<?php $this->load->view('_partials/messages'); ?>
