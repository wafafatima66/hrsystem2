<?php include '../config.php';

include SITE_ROOT . '/includes/header.php'; ?>

<style>
.ans-box {
      display: none;
}
</style>

<div class="container ">
      <div class="row ">
            <h4 class="background-title-1">LIST OF UNFILLED / VACANT POSITION</h4>
            <table class="table home-page-table mt-4 table-striped  table-sm table-responsive-sm" >
                  <thead>
                        <tr>
                              <th scope="col">Date Filled</th>
                              <th scope="col">Type of leave</th>
                              <th scope="col">Inclusive dates</th>
                              <th scope="col">No of working days</th>
                              <th scope="col">Status</th>
                              <th scope="col">Remarks</th>
                        </tr>
                  </thead>
                  <tbody>
                        <tr>
                              <td scope="row">1</td>
                              <td></td>
                              <td>Mark</td>
                              <td>@mdo</td>
                              <td>Otto</td>
                              <td>Otto</td>
                        </tr>
                  </tbody>
            </table>
            <div class=" mt-2 ">
            <button class="btn button-1 " type="submit" name="submit"><i class="fa fa-print"></i></button>
      </div>
            </div>
      </div>
      <!-- end of first part -->
<div class="container">
      <div class="row mt-5 mr-2 ml-2">
            <h4 class="background-title-1">RESIGNATION AND RETIREMENT</h4>

            <form class="container">
                  <div class="form-row mt-3">
                        <div class="col-lg-2 col-sm-6">
                              <input type="text" class=" form-control text-input" placeholder="Employee Id">
                        </div>
                        <div class="col-lg-6 col-sm-6">
                              <input type="text" class=" form-control text-input" placeholder="First Name,Last Name,Middle Name , Ext">
                        </div>
                        <div class="col-lg-2 col-sm-6">
                              <input type="text" class="form-control text-input" placeholder="Position">
                        </div>
                  </div>

                  <div class="container emp_hiring_box" >

                        <h6 id="ques-1" onclick="openpara('ans-1')">
                        1. What is the reason for quiting this job ?
                        <h6>
                        <textarea id="ans-1" class="ans-box form-control" rows="5" ></textarea>


                        <h6 id="ques-2" onclick="openpara('ans-2')">
                        2. In your opinion , were you provided with essential tools and resources required to excel in your position in our organisation ?
                        <h6>
                        <textarea id="ans-2" class="ans-box form-control" rows="5"></textarea>

                        <h6 id="ques-3" onclick="openpara('ans-3')">
                        3. Did you get along well with your team members ?
                        <h6>
                        <textarea id="ans-3" class="ans-box form-control" rows="5"></textarea>

                        <h6 id="ques-4" onclick="openpara('ans-4')">
                        4. Did you get along well with your reposrting authority ?
                        <h6>
                        <textarea id="ans-4" class="ans-box form-control" rows="5"></textarea>

                        <h6 id="ques-5" onclick="openpara('ans-5')">
                        5. What did you enjoy most about your job ?
                        <h6>
                        <textarea id="ans-5" class="ans-box form-control" rows="5"></textarea>

                        <h6 id="ques-6" onclick="openpara('ans-6')">
                        6. What did you dislike most about your job ?
                        <h6>
                        <textarea id="ans-6" class="ans-box form-control" rows="5"></textarea>

                        <h6 id="ques-7" onclick="openpara('ans-7')">
                        7. Is there any problem/issue in particular , you want to mention ?
                        <h6>
                        <textarea id="ans-7" class="ans-box form-control" rows="5"></textarea>

                        <h6 id="ques-8" onclick="openpara('ans-8')">
                        8. Under what circumstance , if any , would you consider returning to our company ?
                        <h6>
                        <textarea id="ans-8" class="ans-box form-control" rows="5"></textarea>

                        <h6 id="ques-9" onclick="openpara('ans-9')">
                        9. Do you like the management recognized your efforts towards organizational development? If not how do you think recognition could be improved ?
                        <h6>
                        <textarea id="ans-9" class="ans-box form-control" rows="5"></textarea>

                        <h6 id="ques-10" onclick="openpara('ans-10')">
                        10. Do you like the company policy were adequate ? If not , do you want to suggest changes to the company policy?
                        <h6>
                        <textarea id="ans-10" class="ans-box form-control" rows="5"></textarea>

                        <h6 id="ques-11" onclick="openpara('ans-11')">
                        11. Do you like your job description changed since you were hired , and if so , in what ways ?
                        <h6>
                        <textarea id="ans-11" class="ans-box form-control" rows="5"></textarea>

                        <h6 id="ques-12" onclick="openpara('ans-12')">
                        12. Do you feel you were given sufficient training to perform well in your role ? If not , how could it have been better ? 
                        <h6>
                        <textarea id="ans-12" class="ans-box form-control" rows="5"></textarea>

                        <h6 id="ques-13" onclick="openpara('ans-13')">
                        13. Do you have any concerns about the organization at large that you would like to share ? 
                        <h6>
                        <textarea id="ans-13" class="ans-box form-control" rows="5"></textarea>

                        <h6 id="ques-14" onclick="openpara('ans-14')">
                        14. Will you recommend our organization to your friends and family for potential employment opputunities ? 
                        <h6>
                        <textarea id="ans-14" class="ans-box form-control" rows="5"></textarea>

                        <h6 id="ques-15" onclick="openpara('ans-15')">
                        15. Is there anything else you'd like to add ? 
                        <h6>
                        <textarea id="ans-15" class="ans-box form-control" rows="5"></textarea>

                  </div>
                  <div class="text-right"><button class="ml-3 btn button-1 mt-3">Submit</button></div>
            </form>
      </div>
      </div>

      <script>
            function openpara(ans) {
                  $(document).ready(function() {
                        // console.log(ques);
                        // console.log(ans);
                        var targetBox = $('#' + ans);
                        console.log(targetBox);
                        $(".ans-box").not(targetBox).hide();
                        $(targetBox).show();
                  });
            }
      </script>