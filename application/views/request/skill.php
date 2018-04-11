<div class="well well-sm">
  <ul class="nav nav-pills">
    <li role="presentation" class="active">
      <a href="#1" data-toggle="tab" aria-controls="1" role="tab"><span class="badge">1</span></a>
    </li>
    <li role="presentation">
      <a href="#2" data-toggle="tab" aria-controls="2" role="tab"><span class="badge">2</span></a>
    </li>
    <li role="presentation">
      <a href="#3" data-toggle="tab" aria-controls="3" role="tab"><span class="badge">3</span></a>
    </li>
    <li role="presentation">
      <a href="#4" data-toggle="tab" aria-controls="4" role="tab"><span class="badge">4</span></a>
    </li>
  </ul>
</div>

<div class="panel panel-success">
  <div class="panel-heading"> <h3 class="panel-title"> </h3> </div>
  <?=form_open(uri_string(),array('name'=>'skill','class'=>'form-horizontal','autocomplete'=>'off'));?>
  <?=form_hidden('user_id',$this->session->user_id);?>
  <div class="panel-body">
    <div class="tab-content">
      <div id="1" class="tab-pane fade in active">
        <?php $this->load->view('request/_skill_1'); ?>
      </div>
      <div id="2" class="tab-pane fade">
        <?php $this->load->view('request/_skill_2'); ?>
      </div>
      <div id="3" class="tab-pane fade">
        <?php $this->load->view('request/_skill_3'); ?>
      </div>
      <div id="4" class="tab-pane fade">
        <?php $this->load->view('request/_skill_4'); ?>
      </div>
    </div>
  </div>
  <div class="panel-footer">
    <nav aria-label="">
      <ul class="pager">
        <li class="previous"> <a href="#" class="prev-step"><span aria-hidden="true">&larr; ก่อนหน้า</span></a> </li>
        <li class="next"> <a href="#" class="next-step"><span aria-hidden="true">ถัดไป &rarr;</span></a> </li>
      </ul>
    </nav>
  </div>
  <?=form_close();?>
</div>

<script type="text/javascript">
$(function() {
  $('a[data-toggle="tab"]').on('show.bs.tab',function(e) {
    var $target = $(e.target);
    console.log($target);
    if ($target.parent().hasClass('disabled')) {
      return false;
    }
  });
  $(".next-step").click(function(e) {
    var $active = $('.nav-pills li.active');
    nextTab($active);
  });
  $(".prev-step").click(function(e) {
    var $active = $('.nav-pills li.active');
    prevTab($active);
  });

  var exist = $('#exist');
  var exist_ctn = $('div#exist_ctn :input');
  exist.prop('checked',true);
  exist_ctn.prop('disabled',true);
  exist.on('change',function(){
    if (this.checked) {
      exist_ctn.prop('disabled',true);
    } else {
      exist_ctn.prop('disabled',false);
    }
  });

  $('#id_card').inputmask('9999999999999');
  $('.zip').inputmask('99999');
  $('.tel').inputmask('9999999999');

});

function nextTab(elem) {
  $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
  $(elem).prev().find('a[data-toggle="tab"]').click();
}
</script>
