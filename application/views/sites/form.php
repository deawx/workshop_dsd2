<div class="col-md-10 col-md-offset-1" style="margin-top:1em;">
  <?php $this->load->view('_partials/messages'); ?>
  <div class="panel panel-default">
    <div class="panel-heading"> <h3 class="panel-title">แก้ไขข้อมูล</h3> </div>
    <?=form_open(uri_string(),array('class'=>'form-horizontal'));?>
    <?=form_hidden('id',$site['id']);?>
    <div class="panel-body">
      <div class="form-group">
        <?=form_label('','',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9">
          <input type="text" name="name" class="form-control" value="<?=set_value('name',$site['name']);?>" disabled>
        </div>
      </div>
      <div class="form-group">
        <?=form_label('','',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_textarea(array('name'=>'body','class'=>'form-control','id'=>'summernote','value'=>$site['body']),set_value('body'));?> </div>
      </div>
    </div>
    <div class="form-group"> <?=form_label('','',array('class'=>'control-label col-md-3'));?>
    <div class="col-md-9">
      <?=form_submit('','บันทึก',array('class'=>'btn btn-primary'));?>
      <?=anchor('admin/sites','ย้อนกลับ',['class'=>'btn btn-default']);?>
    </div>
  </div>
  <?=form_close();?>
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
