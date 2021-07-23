   <!--body section of learning and development-->


   <div class="learning_wrapper">

   <?php 
 
                              
 $query = "SELECT * FROM emp_training WHERE emp_id = '$emp_id'";

 $runquery = $conn -> query($query);
 $rowcount=mysqli_num_rows($runquery);
 if($rowcount > 0 ){
   
   while($mydata = $runquery -> fetch_assoc()){  ?>


       <div class="form-row mt-3">

           <div class="col-lg-5 col-sm-12">
               <div class="d-flex flex-column">
                   <label for="">Title of Training/Program attended</label>
                   <input type="text" class="form-control text-input" name="title_of_training[]" value="<?php echo $mydata['title_of_training']?>">
               </div>
           </div>

           <div class="col-lg-3 col-sm-6">
               <div class="d-flex flex-column">
                   <label for="">TYPE OF PROGRAM</label>
                   <select class="form-control text-input" name="training_type_of_position[]">
                       <option value="">SELECT</option>

                       <option value="technical" <?php if ($mydata['training_type_of_position'] == "technical"  ) {
                    echo 'selected'; }?> >Technical</option>

                       <option value="managerial" <?php if ($mydata['training_type_of_position'] == "managerial"  ) {
                    echo 'selected'; }?> >Managerial</option>

                       <option value="supervisory" <?php if ($mydata['training_type_of_position'] == "supervisory"  ) {
                    echo 'selected'; }?> >Supervisory</option>

                       <option value="clerical" <?php if ($mydata['training_type_of_position'] == "clerical"  ) {
                    echo 'selected'; }?> >Clerical</option>

                   </select>
               </div>
           </div>

           <div class="col-lg-2 col-sm-6">
               <div class="d-flex flex-column">
                   <label for="">NO. OF HOURS</label>
                   <input type="text" class="form-control text-input" name="training_no_of_hrs[]" value="<?php echo $mydata['training_no_of_hrs']?>">
               </div>
           </div>

       </div>

       <div class="form-row mt-3">

           <div class="col-lg-6 col-sm-12">
               <div class="d-flex flex-column">
                   <label for="">INCLUSIVE DATES</label>
                   <div class="d-md-flex justify-content-center">

                       <input type="date" class="form-control text-input mx-sm-1 " name="training_from_date[]" value="<?php echo $mydata['training_from_date']?>">

                       <input type="date" class="form-control text-input mx-sm-1 " name="training_to_date[]" value="<?php echo $mydata['training_to_date']?>">

                   </div>
               </div>
           </div>



           <div class="col-lg-6 col-sm-6">
               <div class="d-flex">
                   <div class="form-group ">
                       <label for="">Sponsers</label>
                       <input type="text" class="form-control text-input" name="training_conducted_by[]" value="<?php echo $mydata['training_conducted_by']?>">
                   </div>
               </div>
           </div>


       </div>

<?php }}else  {?>

            <div class="form-row mt-3">

        <div class="col-lg-5 col-sm-12">
            <div class="d-flex flex-column">
                <label for="">Title of Training/Program attended</label>
                <input type="text" class="form-control text-input" name="title_of_training[]">
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="d-flex flex-column">
                <label for="">TYPE OF PROGRAM</label>
                <select class="form-control text-input" name="training_type_of_position[]">
                    <option value="">SELECT</option>
                    <option value="technical">Technical</option>
                    <option value="managerial">Managerial</option>
                    <option value="supervisory">Supervisory</option>
                    <option value="clerical">Clerical</option>
                </select>
            </div>
        </div>

        <div class="col-lg-2 col-sm-6">
            <div class="d-flex flex-column">
                <label for="">NO. OF HOURS</label>
                <input type="text" class="form-control text-input" name="training_no_of_hrs[]">
            </div>
        </div>

        </div>

        <div class="form-row mt-3">

        <div class="col-lg-6 col-sm-12">
            <div class="d-flex flex-column">
                <label for="">INCLUSIVE DATES</label>
                <div class="d-md-flex justify-content-center">

                    <input type="date" class="form-control text-input mx-sm-1 " name="training_from_date[]">

                    <input type="date" class="form-control text-input mx-sm-1 " name="training_to_date[]">

                </div>
            </div>
        </div>



        <div class="col-lg-6 col-sm-6">
            <div class="d-flex">
                <div class="form-group ">
                    <label for="">Sponsers</label>
                    <input type="text" class="form-control text-input" name="training_conducted_by[]">
                </div>
            </div>
        </div>


        </div>
<?php } ?>
   </div>



   <div class="col-lg-2 col-sm-6 mt-2">
       <a class="btn button-1 add_button add_learn_button">Add</a>
   </div>




   <script type="text/javascript">
       $(document).ready(function() {
           var maxField = 10; //Input fields increment limitation
           var addButton = $('.add_learn_button'); //Add button selector
           var wrapper = $('.learning_wrapper'); //Input field wrapper
           var fieldHTML =
               '  <div class="form-row mt-5"> <div class="col-lg-5 col-sm-12"> <div class="d-flex flex-column"> <label for="">Title of Training/Program attended</label> <input type="text" class="form-control text-input"  name="title_of_training[]"> </div> </div> <div class="col-lg-3 col-sm-6"> <div class="d-flex flex-column"> <label for="">TYPE OF PROGRAM</label> <select class="form-control text-input" name="training_type_of_position[]"> <option value="">SELECT</option> <option value="technical">Technical</option> <option value="managerial">Managerial</option> <option value="supervisory">Supervisory</option> <option value="clerical">Clerical</option> </select> </div> </div> <div class="col-lg-2 col-sm-6"> <div class="d-flex flex-column"> <label for="">NO. OF HOURS</label> <input type="text" class="form-control text-input"  name="training_no_of_hrs[]"> </div> </div> </div> <div class="form-row mt-3"> <div class="col-lg-6 col-sm-12"> <div class="d-flex flex-column"> <label for="">INCLUSIVE DATES</label> <div class="d-md-flex justify-content-center"> <input type="date" class="form-control text-input mx-sm-1 "  name="training_from_date[]"> <input type="date" class="form-control text-input mx-sm-1 "  name="training_to_date[]"> </div> </div> </div> <div class="col-lg-6 col-sm-6"> <div class="d-flex"> <div class="form-group "> <label for="">Sponsers</label> <input type="text" class="form-control text-input"  name="training_conducted_by[]"> </div> </div> </div> </div>';

           //New input field html 
           var x = 1; //Initial field counter is 1

           //Once add button is clicked
           $(addButton).click(function() {
               //Check maximum number of input fields
               if (x < maxField) {
                   x++; //Increment field counter
                   $(wrapper).append(fieldHTML); //Add field html
               }
           });

           //Once remove button is clicked
        //    $(wrapper).on('click', '.remove_learn_button', function(e) {
        //        e.preventDefault();
        //        $(this).parent('div').remove(); //Remove field html
        //        x--; //Decrement field counter
        //    });
       });
   </script>