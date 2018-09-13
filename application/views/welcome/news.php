<?php
$pnn = array();
$org = array();
foreach ($news as $value) :
  if ($value['pinned'] === '1') :
    $pnn[] = $value;
  else:
    $org[] = $value;
  endif;
endforeach;
?>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-success">
      <div class="panel-body"> <h4>รายการปักหมุด (<?=count($pnn);?>)</h4> </div>
      <ul class="list-group">
        <?php foreach ($pnn as $value) : ?>
          <li class="list-group-item">
            <h4 class="list-group-item-heading"><?=mb_substr(strip_tags($value['title']),0,100,'UTF-8');?>
              <small><?=anchor('welcome/read/'.$value['id'],'อ่านต่อ',array('class'=>'btn btn-primary btn-sm'));?></small>
            </h4>
            วันที่ประกาศ : <span class="btn btn-info btn-sm"><?=$value['date_create'];?></span>
            วันที่แก้ไข : <span class="btn btn-warning btn-sm"><?$value['date_update'];?></span>
            จำนวนผู้เข้าชม : <span class="btn btn-default btn-sm"><?=$value['views'];?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-body"> <h4>รายการทั้งหมด (<?=count($org);?>)</h4> </div>
      <ul class="list-group">
        <?php foreach ($org as $value) : ?>
          <li class="list-group-item">
            <h4 class="list-group-item-heading"><?=mb_substr(strip_tags($value['title']),0,100,'UTF-8');?></h4>
            <p class="list-group-item-text"><?=mb_substr(strip_tags($value['detail']),0,200,'UTF-8');?></p>
            <?=anchor('welcome/read/'.$value['id'],'อ่านต่อ',array('class'=>'btn btn-primary btn-sm'));?>
            <hr>
            วันที่ประกาศ : <span class="btn btn-info btn-sm"><?=$value['date_create'];?></span>
            วันที่แก้ไข : <span class="btn btn-warning btn-sm"><?=$value['date_update'];?></span>
            จำนวนผู้เข้าชม : <span class="btn btn-default btn-sm"><?=$value['views'];?></span>
          </li>
        <?php endforeach; ?>
      </ul>
      <div class="panel-footer"> <?=$this->pagination->create_links();?> </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading"> <h3 class="panel-title">หมวดหมู่ข้อมูลข่าวสาร</h3> </div>
      <div class="list-group">
        <?=anchor('welcome/news','ทั้งหมด',array('class'=>'list-group-item '.(!$this->input->get('category')?'active':'')));?>
        <?=anchor('welcome/news?category=ข่าวสารทั่วไป','ข่าวสารทั่วไป',array('class'=>'list-group-item '.($this->input->get('category')=='ข่าวสารทั่วไป'?'active':'')));?>
        <?=anchor('welcome/news?category=ประชาสัมพันธ์','ประชาสัมพันธ์',array('class'=>'list-group-item '.($this->input->get('category')=='ประชาสัมพันธ์'?'active':'')));?>
        <?=anchor('welcome/news?category=ประกาศผลการสอบ','ประกาศผลการสอบ',array('class'=>'list-group-item '.($this->input->get('category')=='ประกาศผลการสอบ'?'active':'')));?>
      </div>
    </div>
  </div>
</div>
