
  $(document).ready(function () {
    var maxField = 10;
    var x = 1;

    var fieldHTML1 =
      '<div class="form-row mt-2"> <div class="col-lg-6 col-sm-6"><input type="text" class="form-control text-input emp_id" placeholder="Employee Id"  name="emp_id[]"> </div> </div> </div>';

    var fieldHTML2 =
      // '<div class="form-row mt-2 "> <div class="col-lg-12 col-sm-6"></div> <div class="col-lg-2 col-sm-6"> <input type="text" class="form-control text-input" placeholder="LastName" name="speaker_last_name[]"> </div> <div class="col-lg-2 col-sm-6"> <input type="text" class="form-control text-input" placeholder="FirstName" name="speaker_first_name[]"> </div> <div class="col-lg-2 col-sm-6"> <input type="text" class="form-control text-input" placeholder="MiddleName" name="speaker_middle_name[]"> </div> <div class="col-lg-2 col-sm-6"> <input type="text" class="form-control text-input" placeholder="Ext" name="speaker_ext[]"> </div> <div class="col-lg-4 col-sm-6"> <input type="text" class="form-control text-input" name="title[]" placeholder="Title"> </div> </div>';
      '<div class="form-row mt-2 "> <div class="col-lg-12 col-sm-6"></div><div class="col-lg-6 col-sm-6"> <input type="text" class="form-control text-input" placeholder="Full Name" name="speaker_full_name[]" > </div> <div class="col-lg-6 col-sm-6"> <input type="text" class="form-control text-input" name="title[]" placeholder="Title"> </div></div>'

    var fieldHTML3 =
      '  <div class="form-row mt-2"> <div class="col-lg-3 col-sm-6"> </div> <div class="col-lg-4 col-sm-6"> <input type="text" class="form-control text-input" name="sponsor[]" placeholder="Sponsor"> </div> </div>';


    $('.add_emp_id').click(function () {
      if (x < maxField) {
        x++;
        $('.add_emp_id_wrapper').append(fieldHTML1); //Add field html
      }
    });

    $('.add_speaker').click(function () {
      if (x < maxField) {
        x++;
        $('.add_speaker_wrapper').append(fieldHTML2); //Add field html
      }
    });

    $('.add_sponsor').click(function () {
      if (x < maxField) {
        x++;
        $('.add_sponsor_wrapper').append(fieldHTML3); //Add field html
      }
    });

  });