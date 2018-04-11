<div class="panel panel-default">
  <div class="panel-heading"> <h3 class="panel-title">ข้อมูลการโพสต์ข่าวสาร</h3> </div>
  <div class="panel-body">
    <?=form_open(uri_string(),array('class'=>'form-horizontal'));?>
    <?=form_hidden('id',$news['id']);?>
    <div class="form-group"> <?=form_label('หัวข้อข่าวสาร','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9"> <?=form_input(array('name'=>'title','class'=>'form-control','maxlength'=>'100'),set_value('title',$news['title']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('หมวดหมู่ข่าวสาร','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9"> <?=form_dropdown(array('name'=>'category','class'=>'form-control'),array(''=>'เลือกรายการ','ประชาสัมพันธ์'=>'ประชาสัมพันธ์','ข่าวสารทั่วไป'=>'ข่าวสารทั่วไป','ประกาศผลการสอบ'=>'ประกาศผลการสอบ',),set_value('category',$news['category']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('วันที่โพสต์','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9"> <?=form_input(array('name'=>'date_create','class'=>'form-control','disabled'=>TRUE,'value'=>($news['date_create']) ? date('d-m-Y',$news['date_create']) : ''));?> </div>
    </div>
    <div class="form-group"> <?=form_label('วันที่แก้ไข','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9"> <?=form_input(array('name'=>'date_update','class'=>'form-control','disabled'=>TRUE,'value'=>($news['date_update']) ? date('d-m-Y',$news['date_update']) : ''));?> </div>
    </div>
    <div class="form-group"> <?=form_label('เนื้อหาข่าวสาร','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9"> <?=form_textarea(array('name'=>'detail','class'=>'form-control','id'=>'summernote','value'=>$news['detail']),set_value('detail'));?> </div>
    </div>
    <div class="form-group"> <?=form_label('','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9">
        <?=form_submit('','ยืนยัน',array('class'=>'btn btn-primary'));?>
        <?=anchor('admin/news','ย้อนกลับ',array('class'=>'btn btn-default'));?>
        <?php if (count($news['id']) > 0) : ?>
          <?=anchor('#','แนบไฟล์เอกสาร',array('class'=>'btn btn-link pull-right','data-toggle'=>'modal','data-target'=>'#attachment'));?>
        <?php endif; ?>
      </div>
    </div>
    <?=form_close();?>
  </div>
  <div class="panel-footer"> <?php $this->load->view('_partials/messages'); ?> </div>
</div>

<div class="modal fade" id="attachment" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?=form_open('admin/news/attachment/').form_hidden('id',$news['id']);?>
      <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h4 class="modal-title">รายการแนบไฟล์เอกสาร</h4> </div>
      <div class="modal-body" style="padding:0px;">
        <table class="table table-hover">
          <thead> <tr> <th>#</th> <th>ชื่อไฟล์</th> <th>ขนาดไฟล์</th> <th></th> </tr> </thead>
          <tbody>
            <?php $assets_id = unserialize($news['assets_id']);
              foreach ($assets as $asset) : ?>
              <tr>
                <td><?=form_checkbox(array('name'=>'assets_id[]'),$asset['id'],set_checkbox('assets_id',$asset['id'],(any_in_array($asset['id'],$assets_id))));?></td>
                <td><?=$asset['client_name'];?></td>
                <td><?=byte_format($asset['file_size']);?></td>
                <td><?=anchor('uploads/attachments/'.$asset['file_name'],'ดู',array('class'=>'label label-info','target'=>'_blank'));?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer"> <button type="submit" class="btn btn-primary btn-block">ยืนยัน</button> </div>
      <?=form_close();?>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function(){
  $('#summernote').summernote({
    lang: 'th-TH',
    height: 300,
    minHeight: null,
    maxHeight: null,
    focus: true
  });
});
</script>
