<?php $parent = isset($parent) ? $parent : ''; ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand <?=($parent === 'home') ? 'active' : '';?>" href="<?=site_url();?>">หน้าหลัก</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <?php if ( ! in_array('account',$this->uri->segment_array())) : ?>
          <li class="<?=($parent === 'about') ? 'active' : '';?>"> <a href="<?=site_url('welcome/about');?>">เกี่ยวกับเรา</a> </li>
          <li class="<?=($parent === 'contact') ? 'active' : '';?>"> <a href="<?=site_url('welcome/contact');?>">ติดต่อเรา</a> </li>
          <li class="<?=($parent === 'news') ? 'active' : '';?>"> <a href="<?=site_url('welcome/news');?>">ข่าวสาร</a> </li>
        <?php endif; ?>
        <?php if ( ! $this->session->has_userdata('is_login')) : ?>
          <li> <a href="<?=site_url('auth/login');?>">เข้าสู่ระบบ/สมัครสมาชิก</a> </li>
        <?php else: ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">บัญชีของคุณ <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li class="text-center">
                <?php if ($this->session->has_userdata('avatar')) : ?>
                  <?=img('uploads/profiles/'.$this->session->avatar,'',array('class'=>'img-circle','style'=>'width:100px;height:100px;'));?>
                <?php else: ?>
                  <i class="fa fa-user fa-2x"></i>
                <?php endif; ?>
              </li>
              <li class="divider"></li>
              <?php if ($this->session->has_userdata('is_admin')) : ?>
                <li> <a href="<?=site_url('admin/news');?>">เข้าระบบผู้ดูแล</a> </li>
                <li class="divider"></li>
              <?php else: ?>
                <li> <a href="<?=site_url('account/profile');?>">ข้อมูลส่วนตัว</a> </li>
                <li class="divider"></li>
                <li> <a href="<?=site_url('account/request');?>">ข้อมูลการสอบ</a> </li>
                <li class="divider"></li>
              <?php endif; ?>
              <li> <a href="<?=site_url('auth/logout');?>">ออกจากระบบ</a> </li>
            </ul>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
