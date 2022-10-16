$(document).ready(function () {
    var maxField = 10;
    var x = 1;
    var fieldHTML1 =
      '';
      
    var fieldHTML2 =
      ''

    var fieldHTML3 =
      '  <div class="form-row mt-2"><div class="col-lg-4 col-sm-6"> <input type="text" class="form-control text-input" name="sponsor[]" placeholder="Sponsor"> </div> </div>';

     
    $('.add_emp_id_modal').click(function () {
      if (x < maxField) {
        x++;
        // console.log(x)
        $('.add_emp_id_wrapper_modal').append('<div class="form-row mt-2"> <div class="col-lg-6 col-sm-6"> <input type="text" class="form-control text-input emp_id" placeholder="Employee Name"  id="add_learning_'+x+'" onkeyup = get_info(this.id) name="emp_name[]" > <div id="emplist_'+x+'"></div><input type="hidden" name="emp_id[]" id="get_emp_id_'+x+'"> </div> <div class="col-lg-6 col-sm-6"> <input type="text" class=" form-control text-input" placeholder="Office"  id="office_'+x+'"> </div> </div>'); 
      }
    });


    var lastid = $( '.add_emp_id' ).attr( 'last-id' );
    // console.log(lastid)
    $('.add_emp_id').click(function () {
      if (lastid < maxField) {
        lastid++;
        $('.add_emp_id_wrapper').append('<div class="form-row mt-2"> <div class="col-lg-6 col-sm-6"> <input type="text" class="form-control text-input emp_id" placeholder="Employee Name"  id="add_learning_'+lastid+'" onkeyup = get_info(this.id) name="emp_name[]" > <div id="emplist_'+lastid+'"></div><input type="hidden" name="emp_id[]" id="get_emp_id_'+lastid+'"> </div> </div> '); //Add field html
      }
    });

    $('.add_speaker').click(function () {
      if (x < maxField) {
        x++;
        $('.add_speaker_wrapper').append('<div class="form-row mt-2"><div class="col-lg-4 col-sm-4"> <input type="text" class="form-control text-input" placeholder="Full Name" name="speaker_full_name[]" required> </div> <div class="col-lg-4 col-sm-4"> <input type="text" class="form-control text-input" name="title[]" placeholder="Title"> </div> <div class="col-lg-4 col-sm-4"> <input type="text" class="form-control text-input" name="agency[]" placeholder="Agent"> </div></div>'); //Add field html
      }
    });

    $('.add_sponsor').click(function () {
      if (x < maxField) {
        x++;
        $('.add_sponsor_wrapper').append(fieldHTML3); //Add field html
      }
    });


  });

  
  
