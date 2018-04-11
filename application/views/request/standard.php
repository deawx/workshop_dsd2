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
    <li role="presentation">
      <a href="#5" data-toggle="tab" aria-controls="5" role="tab"><span class="badge">5</span></a>
    </li>
  </ul>
</div>

<div class="panel panel-success">
  <div class="panel-heading"> <h3 class="panel-title"> </h3> </div>
  <?=form_open(uri_string(),array('class'=>'form-horizontal','autocomplete'=>'off'));?>
  <?=form_hidden('user_id',$this->session->user_id);?>
  <div class="panel-body">
    <div class="tab-content">
      <div id="1" class="tab-pane fade in active">
        <?php $this->load->view('request/_standard_1'); ?>
      </div>
      <div id="2" class="tab-pane fade">
        <?php $this->load->view('request/_standard_2'); ?>
      </div>
      <div id="3" class="tab-pane fade">
        <?php $this->load->view('request/_standard_3'); ?>
      </div>
      <div id="4" class="tab-pane fade">
        <?php $this->load->view('request/_standard_4'); ?>
      </div>
      <div id="5" class="tab-pane fade">
        <?php $this->load->view('request/_standard_5'); ?>
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
  $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
    var $target = $(e.target);
    if ($target.parent().hasClass('disabled')) {
      return false;
    }
  });
  $(".next-step").click(function (e) {
    var $active = $('.nav-pills li.active');
    // $active.next().addClass('active');
    nextTab($active);
  });
  $(".prev-step").click(function (e) {
    var $active = $('.nav-pills li.active');
    prevTab($active);
  });

  var work_category = $('#work_category');
  var ctg = $('#ctg');
  var ctg_ctn = $('#ctg_ctn :input');
  var work_type = $('#work_type');
  var work_status = $('#work_status');
  var work_yes = $('#work_yes :input');
  var need_work_status = $('#need_work_status');
  var local = $('div#local :input');
  var abroad = $('div#abroad :input');
  var health = $('#health');
  var tf = $('#tf');
  var tf_t = $('.tf_t');
  var tf_f = $('.tf_f');

  tf_t.prop('disabled',true);
  tf_f.prop('disabled',true);
  tf.on('change',function(){
    if (this.value === 'เคย') {
      tf_t.prop('disabled',false);
      tf_f.prop('disabled',true);
    } else if(this.value === 'ไม่เคย') {
      tf_t.prop('disabled',true);
      tf_f.prop('disabled',false);
    } else {
      tf_t.prop('disabled',true);
      tf_f.prop('disabled',true);
    }
  });

  <?php if (isset($work['work_status']) && $work['work_status']=='ผู้มีงานทำ') : ?>
    $('#work_no').prop('disabled',true);
  <?php else: ?>
    work_yes.prop('disabled',true);
  <?php endif; ?>
  work_status.on('change',function(){
    if (this.value === 'ผู้มีงานทำ') {
      work_yes.prop('disabled',false);
      $('#work_no').prop('disabled',true);
      $('#work_group').prop('disabled',false);
    } else if (this.value === 'ผู้ไม่มีงานทำ') {
      work_yes.prop('disabled',true);
      $('#work_no').prop('disabled',false);
      $('#work_group').prop('disabled',true);
    } else {
      work_yes.prop('disabled',true);
      $('#work_no').prop('disabled',true);
      $('#work_group').prop('disabled',true);
    }
  });

  work_category.on('change',function(){
    $.post('get_work_type/'+this.value,function(data) {
      work_type.empty();
      $.each(data,function(key,value) {
        work_type.append('<option value="'+key+'">'+value+'</option>');
      });
    });
    if (this.value !== 'ทำงานภาครัฐ') {
      $('#work_group').prop('disabled',false);
    } else {
      $('#work_group').prop('disabled',true);
    }
  });

  local.prop('disabled',true);
  abroad.prop('disabled',true);
  need_work_status.on('change',function(){
    if (this.value === 'ไม่ต้องการ') {
      local.prop('disabled',true);
      abroad.prop('disabled',true);
    } else if(this.value === 'ต้องการจัดหางานในประเทศ') {
      local.prop('disabled',false);
      abroad.prop('disabled',true);
    } else if(this.value === 'ต้องการจัดหางานในต่างประเทศ') {
      local.prop('disabled',true);
      abroad.prop('disabled',false);
    } else {
      local.prop('disabled',true);
      abroad.prop('disabled',true);
    }
  });

  ctg_ctn.prop('disabled',true);
  ctg.on('change',function(){
    if (this.value === 'ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ') {
      ctg_ctn.prop('disabled',false);
    } else {
      ctg_ctn.prop('disabled',true);
    }
  });

  $('#health_status').prop('disabled',true);
  health.on('change',function(){
    if (this.value == 'พิการ') {
      $('#health_status').prop('disabled',false);
    } else {
      $('#health_status').prop('disabled',true);
    }
  });

  $('#work_no').editableSelect();
  $('#work_group').editableSelect();
  $('#health_status').editableSelect();

  $('#age').inputmask('99');
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
