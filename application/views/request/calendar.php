<?php echo $calendar; ?>
<br>
<p>*การสอบมาตรฐานฝีมือแรงงานแห่งชาติ 26คน/วัน แบ่งเป็น เช้า13คน/บ่าย13คน</p>
<p>*การสอบรับรองความรู้ความสามารถ 15คน/วัน</p>
<p>*สามารถเข้าสอบได้เพียง 1 รายการต่อวันเท่านั้น</p>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <?=form_input(array('id'=>'input','hidden'=>TRUE));?>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    </div>
  </div>
</div>

<script type="text/javascript">
$(function(){
  var modal = $('#modal');
  modal.on('show.bs.modal',function(e) {
    var related = $(e.relatedTarget);
    var date = $('input#input').val();
    var modal = $(this);
    modal.find('.modal-content').empty();
    $.post('get_events/'+date,function(d) {
      modal.find('.modal-content').html(d);
    });
  });
});
</script>
