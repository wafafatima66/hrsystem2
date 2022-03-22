

<style>
    .date-input {
        font-size: 12px;
    }

    .responsive-label {
        font-size: 12px;
        color: #54A04B;
    }

    @media (max-width:768px) {
        .responsive-label {
            font-size: 12px;
        }

        .date-input {
            font-size: 7px;
        }
    }
</style>

<div class="Summary switch-tab" style="display: block;">

    <div id="summary_section"></div>
    <div class="form-row justify-content-between mt-4 ">

        <div class="form-inline">
            <input type="number" min="1900" max="2099" step="1" value="<?php echo date("Y");
                                                                ?>" class="form-control text-input" id="summary-date" />
            <input type="hidden" value="<?php echo $emp_id ?>" id="emp_id_for_summary">
            <button id="date-summary" class="btn button-1">Search</button>
        </div>

        <div>
            <a href="" id="print_leave_summary" class="btn button-1">Print</a>
            <!-- <button class="btn button-1" id="forward_balance">Forward Balance</button> -->
        </div>

    </div>
</div>

<script>
     $('#print_leave_summary').on('click', function () {
    var year = $('#summary-date').val();
    var url = '../includes/export_excel.php?leave_summary=';
    var emp_id = $('#emp_id_for_summary').val();
    var query = '&emp_id='+emp_id ; 
    var newHref = url+year+query;
    console.log(newHref);
    $('#print_leave_summary').attr('href', newHref);
  });
</script>