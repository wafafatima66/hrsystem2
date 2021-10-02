 <!--body section of Civil service eligibility-->

 <div class="civil_wrapper">


 <?php 
 
  
                              
  $query = "SELECT * FROM emp_civil_service WHERE emp_id = '$emp_id'";

  $runquery = $conn -> query($query);
  $rowcount=mysqli_num_rows($runquery);
  if($rowcount > 0 ){
    
    while($mydata = $runquery -> fetch_assoc()){  ?>



 <div class="form-row mt-5">

     <div class="col-lg-3 col-sm-6">
         <div class="d-flex flex-column">
             <label for="">TYPE</label>
             <select class="form-control text-input"  name="civil_exam_type[]">
                 <option value="">SELECT</option>

                 <option value="Board Examination" <?php if ($mydata['civil_exam_type'] == "Board Examination"  ) {
                    echo 'selected';
                 }?> >Board Examination</option>

                 <option value="Civil Service Examination" <?php if ($mydata['civil_exam_type'] == "Civil Service Examination"  ) {
                    echo 'selected';
                 }?> >Civil Service Examination</option>

                <option value="Others" <?php if ($mydata['civil_exam_type'] == "Others"  ) {
                    echo 'selected';
                 }?> >Others</option>


             </select>
         </div>
     </div>

     <div class="col-lg-5 col-sm-12">
         <div class="d-flex flex-column">
             <label for="">NAME OF EXAMINATION</label>
             <input type="text" class="form-control text-input" name="civil_exam_name[]" value="<?php echo $mydata['civil_exam_name']?>">
         </div>
     </div>

     <div class="col-lg-3 col-sm-6">
         <div class="d-flex flex-column">
             <label for="">EXAMINATION DATE</label>
             <input type="date" class="form-control text-input" name="civil_exam_date[]" value="<?php echo $mydata['civil_exam_date']?>">
         </div>
     </div>

     </div>

     <div class="form-row mt-3">

     <div class="col-lg-2 col-sm-6">
         <div class="d-flex flex-column">
             <label for="">RATING <span class="text-muted"> (if applicable) </span></label>
             <input type="text" class="form-control text-input" name="civil_exam_rating[]" value="<?php echo $mydata['civil_exam_rating']?>">
         </div>
     </div>

     <div class="col-lg-4 col-sm-12">
         <div class="d-flex flex-column">
             <label for="">PLACE OF EXAMINATION</label>
             <input type="text" class="form-control text-input" name="civil_exam_place[]" value="<?php echo $mydata['civil_exam_place']?>" >
         </div>
     </div>




         <div class="col-lg-3 col-sm-6">
             <label for="">LICENCE <span class="text-muted">(If Applicable)</span></label>
             <input type="text" class="form-control text-input" name="civil_exam_licence_no[]" value="<?php echo $mydata['civil_exam_licence_no']?>" >
         </div>

         <!-- <div class="col-lg-3 col-sm-6">
             <div class="d-flex flex-column">
                 <label for="">NUMBER</label>
                 <input type="text" class="form-control text-input" name="licence_no[]" >
             </div>
         </div> -->

         <div class="col-lg-3 col-sm-6">
             <div class="d-flex flex-column">
                 <label for="">VALIDITY</label>
                 <input type="date" class="form-control text-input" name="civil_exam_licence_val[]" value="<?php echo $mydata['civil_exam_licence_val']?>">
             </div>
         </div>

         </div>

         <?php } ?>
 </div>

 


<?php  }else { ?>

    
 <div class="form-row mt-3">

 <div class="col-lg-3 col-sm-6">
     <div class="d-flex flex-column">
         <label for="">TYPE</label>
         <select class="form-control text-input"  name="civil_exam_type[]">
             <option value="">SELECT</option>
             <option value="Board Examination">Board Examination</option>
             <option value="Civil Service Examination">Civil Service Examination</option>
             <option value="Others">Others</option>
         </select>
     </div>
 </div>

 <div class="col-lg-5 col-sm-12">
     <div class="d-flex flex-column">
         <label for="">NAME OF EXAMINATION</label>
         <input type="text" class="form-control text-input" name="civil_exam_name[]">
     </div>
 </div>

 <div class="col-lg-3 col-sm-6">
     <div class="d-flex flex-column">
         <label for="">EXAMINATION DATE</label>
         <input type="date" class="form-control text-input" name="civil_exam_date[]">
     </div>
 </div>

 </div>

 <div class="form-row mt-3">

 <div class="col-lg-2 col-sm-6">
     <div class="d-flex flex-column">
         <label for="">RATING <span class="text-muted"> (if applicable) </span></label>
         <input type="text" class="form-control text-input" name="civil_exam_rating[]">
     </div>
 </div>

 <div class="col-lg-4 col-sm-12">
     <div class="d-flex flex-column">
         <label for="">PLACE OF EXAMINATION</label>
         <input type="text" class="form-control text-input" name="civil_exam_place[]" >
     </div>
 </div>




     <div class="col-lg-3 col-sm-6">
         <label for="">LICENCE <span class="text-muted">(If Applicable)</span></label>
         <input type="text" class="form-control text-input" name="civil_exam_licence_no[]" >
     </div>

     <!-- <div class="col-lg-3 col-sm-6">
         <div class="d-flex flex-column">
             <label for="">NUMBER</label>
             <input type="text" class="form-control text-input" name="licence_no[]" >
         </div>
     </div> -->

     <div class="col-lg-3 col-sm-6">
         <div class="d-flex flex-column">
             <label for="">VALIDITY</label>
             <input type="date" class="form-control text-input" name="civil_exam_licence_val[]">
         </div>
     </div>

     </div>


   <?php } ?>
 
   <div class="col-lg-2 col-sm-6 mt-2">
                <a class="btn button-1 add_civil_button">Add</a>
</div>

 <script type="text/javascript">
     $(document).ready(function () {
         var maxField = 10; //Input fields increment limitation
         var addButton = $('.add_civil_button'); //Add button selector
         var wrapper = $('.civil_wrapper'); //Input field wrapper
         var fieldHTML =
             ' <div class="form-row mt-5"> <div class="col-lg-3 col-sm-6"> <div class="d-flex flex-column"> <label for="">TYPE</label> <select class="form-control text-input"  name="civil_exam_type[]"> <option value="">SELECT</option> <option value="Board Examination">Board Examination</option> <option value="Civil Service Examination">Civil Service Examination</option> <option value="Others">Others</option> </select> </div> </div> <div class="col-lg-5 col-sm-12"> <div class="d-flex flex-column"> <label for="">NAME OF EXAMINATION</label> <input type="text" class="form-control text-input" name="civil_exam_name[]"> </div> </div> <div class="col-lg-3 col-sm-6"> <div class="d-flex flex-column"> <label for="">EXAMINATION DATE</label> <input type="date" class="form-control text-input" name="civil_exam_date[]"> </div> </div> </div> <div class="form-row mt-3"> <div class="col-lg-2 col-sm-6"> <div class="d-flex flex-column"> <label for="">RATING <span class="text-muted"> (if applicable) </span></label> <input type="text" class="form-control text-input" name="civil_exam_rating[]"> </div> </div> <div class="col-lg-4 col-sm-12"> <div class="d-flex flex-column"> <label for="">PLACE OF EXAMINATION</label> <input type="text" class="form-control text-input" name="civil_exam_place[]" > </div> </div> <div class="col-lg-3 col-sm-6"> <label for="">LICENCE <span class="text-muted">(If Applicable)</span></label> <input type="text" class="form-control text-input" name="civil_exam_licence_no[]" > </div> <!-- <div class="col-lg-3 col-sm-6"> <div class="d-flex flex-column"> <label for="">NUMBER</label> <input type="text" class="form-control text-input" name="licence_no[]" > </div> </div> --> <div class="col-lg-3 col-sm-6"> <div class="d-flex flex-column"> <label for="">VALIDITY</label> <input type="date" class="form-control text-input" name="civil_exam_licence_val[]"> </div> </div> </div>';

         //New input field html 
         var x = 1; //Initial field counter is 1

         //Once add button is clicked
         $(addButton).click(function () {
             //Check maximum number of input fields
             if (x < maxField) {
                 x++; //Increment field counter
                 $(wrapper).append(fieldHTML); //Add field html
             }
         });

         //Once remove button is clicked
         $(wrapper).on('click', '.remove_civil_button', function (e) {
             e.preventDefault();
             $(this).parent('div').remove(); //Remove field html
             x--; //Decrement field counter
         });
     });
 </script>