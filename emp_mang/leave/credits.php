
<div class="Credits switch-tab">
   <div id="credits_section"></div>
   <div class="form-row justify-content-between mt-4 ">

  <div class="form-inline">
    <input type="number" min="1900" max="2099" step="1" value="<?php echo date("Y");?>" class="form-control text-input" id="input-date" />
    <input type="hidden" value="<?php echo $emp_id ?>" id="emp_id_for_credits">
    <button id="date-submit" class="btn button-1">Search</button>
  </div>

  <div>
    <button class="btn button-1" id="forward_balance">Forward Balance</button>
    <a href="" id="print_leave_credits" class="btn button-1">Print</a>
  </div>

</div>
 </div>

 <script>
     $('#print_leave_credits').on('click', function () {
    var year = $('#input-date').val();
    var url = '../includes/export_excel.php?leave_credits=';
    var emp_id = $('#emp_id_for_credits').val();
    var query = '&emp_id='+emp_id ; 
    var newHref = url+year+query;
    console.log(newHref);
    $('#print_leave_credits').attr('href', newHref);
  });
</script>