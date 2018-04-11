<div class="panel panel-default">
  <div class="panel-heading"> <h3 class="panel-title">ข้อมูลข่าวสารทั้งหมด <?=count($news);?> รายการ</h3> </div>
  <div class="panel-body">
    <?=anchor('admin/news/post','เพิ่มโพสต์',array('class'=>'btn btn-default'));?>
    <?=form_open(uri_string(),array('method'=>'get','class'=>'form-inline pull-right'));?>
    <div class="form-group"> <?=form_input(array('name'=>'title','class'=>'form-control','placeholder'=>'ค้นหาหัวข้อ'));?> </div>
    <div class="form-group"> <?=form_submit('','ค้นหา',array('class'=>'btn btn-default pull-right'));?> </div>
    <?=form_close();?>
  </div>
  <table class="table table-condensed table-hover">
    <thead> <tr> <th>หัวข้อเรื่อง</th> <th>หมวดหมู่โพสต์</th> <th>วันที่โพสต์</th> <th>วันที่แก้ไข</th> <th></th> </tr> </thead>
    <tbody>
      <?php foreach ($news as $value) : ?>
        <tr class="rows" style="display:none;">
          <td><?=mb_substr(strip_tags($value['title']),0,150,'UTF-8');?></td>
          <td><?=$value['category'];?></td>
          <td><?=($value['date_create']) ? date('d-m-Y',$value['date_create']) : 'N/A';?></td>
          <td><?=($value['date_update']) ? date('d-m-Y',$value['date_update']) : 'N/A';?></td>
          <td class="text-right">
            <?php if ($value['pinned'] === '1') : ?>
              <?=anchor('admin/news/pinned/'.$value['id'],'ถอดหมุด',array('class'=>'label label-default'));?>
            <?php else: ?>
              <?=anchor('admin/news/pinned/'.$value['id'],'ปักหมุด',array('class'=>'label label-default'));?>
            <?php endif; ?>
            <?=anchor('admin/news/post/'.$value['id'],'แก้ไข',array('class'=>'label label-info'));?>
            <?=anchor('admin/news/delete/'.$value['id'],'ลบ',array('class'=>'label label-danger','onclick'=>"return confirm('ยืนยันการลบ?');"));?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="panel-footer"> <?=anchor('#','ก่อนหน้า',array('class'=>'label label-default','id'=>'more'));?> </div>
</div>

<script type="text/javascript">
$(function(){
  var rows = $('.rows');
  var more = $('#more');

  rows.slice(0,10).show();

  if ($('.rows:hidden').length < 10) {
    more.hide();
  }

  more.on('click',function(e){
    e.preventDefault();
    $('.rows:hidden').slice(0,5).fadeIn('slow');
    if ($('.rows:hidden').length == 0) {
      more.fadeOut('slow');
    }
  });
});
</script>
