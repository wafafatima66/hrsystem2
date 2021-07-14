<div class="row mt-5">

            <div class="col-lg-6 col-sm-6">
            <form class="form-inline" method="post" action="">
                  <div class="input-group">
                 
                        <input type="search" class="form-control" name="search">
                        <button type="submit" class="home-page-search-btn" name="submit">
                              <i class="fa fa-search"></i>
                        </button>

                        <button type="button" class="ml-3 btn button-1" data-toggle="modal" data-target="#addemployee" >Add</button> 

                       
                  </div>
                  </form>
            </div>
            
           
      </div>

      <?php 
     
      
if(isset($_POST['submit'])){

      $search=$_POST['search'];

      $sql = "SELECT id, emp_id , emp_first_name , emp_last_name , emp_middle_name , emp_ext , emp_gender FROM employee
      WHERE emp_first_name LIKE '%{$search}%' OR emp_last_name LIKE '%{$search}%' OR emp_id LIKE '%{$search}%'" ; 

      $result = mysqli_query($conn, $sql );

      $output = '';

	if (mysqli_num_rows($result) > 0) {

	$output.="<table class='table home-page-table mt-2 table-striped '>
    <thead>
          <tr>
                <th scope='col'>Employee Id</th>
                <th scope='col'>Name</th>
                <th scope='col'>Sex</th>
                <th scope='col'>Status</th>
                <th scope='col'>Position</th>
                <th scope='col'>Office/Unit</th>
          </tr>
    </thead>
    <tbody>";

while ($mydata = mysqli_fetch_array($result))
{
      $output.="<tr class='clickable-row' data-href='../emp_mang/emp_profile.php?id={$mydata["id"]}' >
      <td>{$mydata['emp_id']}</td>
      <td>
            <img src='../img/logo-2.png' alt='' style='width: 20px; height:20px'>
            <span> {$mydata['emp_first_name']}  {$mydata['emp_middle_name']} {$mydata['emp_last_name']} {$mydata['emp_ext']} </span>
      </td>
      <td> {$mydata['emp_gender']} </td>
      <td></td>
      <td></td>
      <td></td>
</tr>";
} 
$output.="</tbody>
</table>";

echo $output ; 
}



} else {
      echo '<div id="table-data"> </div>' ; 
}
      ?>


      <?php include "../add_emp/add_emp_modal.php";?>


      <script type="text/javascript">
  $(document).ready(function(){
    function loadData(page){
      $.ajax({
        url  : "../home/pagination.php",
        type : "POST",
        cache: false,
        data : {page_no:page},
        success:function(response){
          $("#table-data").html(response);
        }
      });
    }
    loadData();
    
    // Pagination code
    $(document).on("click", ".pagination li a", function(e){
      e.preventDefault();
      var pageId = $(this).attr("id");
      loadData(pageId);
    });
  });
</script>