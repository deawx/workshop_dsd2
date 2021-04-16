<?php $this->load->view('_partials/messages'); ?>
<?php
$news_id = isset($news['id']) ? $news['id'] : [];
?>
<div class="panel panel-default">
  <div class="panel-heading"> <h3 class="panel-title">ข้อมูลการโพสต์ข่าวสาร</h3> </div>
  <div class="panel-body">
    <?=form_open_multipart(uri_string(),array('class'=>'form-horizontal'));?>
    <?=form_hidden('id',$news_id);?>
    <div class="form-group"> <?=form_label('หัวข้อข่าวสาร','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9"> <?=form_input(array('name'=>'title','class'=>'form-control','maxlength'=>'100'),set_value('title',$news['title']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('หมวดหมู่ข่าวสาร','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9"> <?=form_dropdown(array('name'=>'category','class'=>'form-control'),array(''=>'เลือกรายการ','ประชาสัมพันธ์'=>'ประชาสัมพันธ์','ข่าวสารทั่วไป'=>'ข่าวสารทั่วไป','ประกาศผลการสอบ'=>'ประกาศผลการสอบ',),set_value('category',$news['category']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('วันที่โพสต์','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9"> <?=form_input(array('name'=>'date_create','class'=>'form-control','disabled'=>TRUE,'value'=>($news['date_create']) ? date('d-m-Y',strtotime($news['date_create'])) : ''));?> </div>
    </div>
    <div class="form-group"> <?=form_label('วันที่แก้ไข','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9"> <?=form_input(array('name'=>'date_update','class'=>'form-control','disabled'=>TRUE,'value'=>($news['date_update']) ? date('d-m-Y',strtotime($news['date_update'])) : ''));?> </div>
    </div>
    <div class="form-group"> <?=form_label('เนื้อหาข่าวสาร','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9"> <?=form_textarea(array('name'=>'detail','class'=>'form-control','value'=>$news['detail']),set_value('detail'));?> </div>
    </div>
    <?php if ($news['file_1'] == '') : ?>
    <div class="form-group"> <?=form_label('รูปภาพที่1','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9"> <?=form_upload(array('name'=>'file_1','class'=>'form-control'));?> </div>
    </div>
    <?php else : ?>
      <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
          <div class="text-right"> <a href="<?=site_url('admin/news/remove_upload/'.$news['id'].'/file_1/'.$news['file_1']);?>" onclick='return confirm("ยืนยันการลบรูปภาพนี้?");'>ลบ</a> </div>
          <img src="<?=base_url('uploads/'.$news['file_1']);?>" class="img-thumbnail">
        </div>
      </div>
    <?php endif; ?>
    <?php if ($news['file_2'] == '') : ?>
    <div class="form-group"> <?=form_label('รูปภาพที่2','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9"> <?=form_upload(array('name'=>'file_2','class'=>'form-control'));?> </div>
    </div>
    <?php else : ?>
      <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
          <div class="text-right"> <a href="<?=site_url('admin/news/remove_upload/'.$news['id'].'/file_2/'.$news['file_2']);?>" onclick='return confirm("ยืนยันการลบรูปภาพนี้?");'>ลบ</a> </div>
          <img src="<?=base_url('uploads/'.$news['file_2']);?>" class="img-thumbnail">
        </div>
      </div>
    <?php endif; ?>
    <?php if ($news['file_3'] == '') : ?>
    <div class="form-group"> <?=form_label('รูปภาพที่3','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9"> <?=form_upload(array('name'=>'file_3','class'=>'form-control'));?> </div>
    </div>
    <?php else : ?>
      <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
          <div class="text-right"> <a href="<?=site_url('admin/news/remove_upload/'.$news['id'].'/file_3/'.$news['file_3']);?>" onclick='return confirm("ยืนยันการลบรูปภาพนี้?");'>ลบ</a> </div>
          <img src="<?=base_url('uploads/'.$news['file_3']);?>" class="img-thumbnail">
        </div>
      </div>
    <?php endif; ?>
    <div class="form-group"> <?=form_label('','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9">
        <?=form_submit('','ยืนยัน',array('class'=>'btn btn-primary'));?>
        <?=anchor('admin/news','ย้อนกลับ',array('class'=>'btn btn-default'));?>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>
