<div class="" id="calendar"> </div>
<br>
<p>*การสอบมาตรฐานฝีมือแรงงานแห่งชาติ 26คน/วัน</p>
<p>*การสอบรับรองความรู้ความสามารถ 15คน/วัน</p>
<p>*สามารถเข้าสอบได้เพียง 1 รายการต่อวันเท่านั้น</p>

<div class="modal fade" id="dayClick" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <?=form_input(array('id'=>'dayTime','hidden'=>TRUE));?>
  <div class="modal-dialog modal-lg" id="modal_dialog">
    <div class="modal-content"> </div>
  </div>
</div>

<script type="text/javascript">
$(function(){
  $.fullCalendar.locale("th", {
    buttonText: {
      month: "เดือน",
      week: "สัปดาห์",
      day: "วัน",
      list: "แผนงาน"
    },
    allDayText: "ตลอดวัน",
    eventLimitText: "เพิ่มเติม",
    noEventsMessage: "ไม่มีกิจกรรมที่จะแสดง"
  });

  var calendar = $('#calendar');
  var modal = $('#dayClick');

  calendar.fullCalendar({
    header: { left: 'title', right: 'today,prev,next' },
    defaultView: 'month',
    eventLimit: true,
    eventLimit: 1,
    validRange: function(nowDate){
      return {
        start: nowDate.add(1,'day'),
        end: nowDate.clone().add(6,'months')
      };
    },
    hiddenDays: [ 0,6 ],
    businessHours: [{ dow: [ 1,2,3,4,5 ], start: '08:00', end: '17:00' }],
    events: [
      <?php foreach ($schedule as $value) : ?>
      {
        title: '<?=$value["title"]?>',
        start: '<?=$value["start"]?>',
        rendering: 'background'
      },
      <?php endforeach; ?>
    ],
    dayClick: function(date,jsEvent,view) {
      $("input#dayTime").val(date.format('DD-MM-YYYY'));
      modal.modal('show');
    }
  });

  modal.on('show.bs.modal',function(e) {
    var related = $(e.relatedTarget);
    var date = $('input#dayTime').val();
    var modal = $(this);
    modal.find('.modal-content').empty();
    $.post('get_events/'+date,function(d) {
      modal.find('.modal-content').html(d);
    });
  });

});
</script>
