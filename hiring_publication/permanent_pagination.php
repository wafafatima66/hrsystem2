<?php

// Connect database 
require '../includes/conn.php';

if (isset($_POST['limit'])) {
  $limit = $_POST['limit'];
} else {
  $limit = 10;
}

if (isset($_POST['page_no'])) {
  $page_no = $_POST['page_no'];
} else {
  $page_no = 1;
}

$offset = ($page_no - 1) * $limit;

if (isset($_POST['search_pub']) && (!empty($_POST['search_pub']))) {
	$search_pub = $_POST['search_pub'];
	$query = "SELECT i.* , p.id as publication_id, p.date_of_publication , p.item_number FROM publication p join item i on i.item_no = p.item_number WHERE item_number LIKE '%{$search_pub}%' LIMIT $offset, $limit";
}


else if (isset($_POST['dept'])  && (!empty($_POST['dept']))) {
  $dept = $_POST['dept'];
  $query = "SELECT i.* , p.id as publication_id, p.date_of_publication , p.item_number FROM publication p join item i on i.item_no = p.item_number where division = '$dept'  LIMIT $offset, $limit ";

} 

else if (isset($_POST['office']) && (!empty($_POST['office'])) ) {
  $office = $_POST['office'];
  $query = "SELECT i.* , p.id as publication_id, p.date_of_publication , p.item_number FROM publication p join item i on i.item_no = p.item_number where area_wrk_assign = '$office'  LIMIT $offset, $limit ";
}  

else if ((isset($_POST['dept'])) && (isset($_POST['office'])) && (!empty($_POST['dept'])) && (!empty($_POST['office']))  ){

  $dept = $_POST['dept'];
  $office = $_POST['office'];
  $query = "SELECT i.* , p.id as publication_id, p.date_of_publication , p.item_number FROM publication p join item i on i.item_no = p.item_number where division = '$dept' and area_wrk_assign = '$office'  LIMIT $offset, $limit ";
} 

else if (isset($_POST['pub_date']) && (!empty($_POST['pub_date'])) ) {
  $pub_date = $_POST['pub_date'];
  $query = "SELECT i.* , p.id as publication_id, p.date_of_publication , p.item_number FROM publication p join item i on i.item_no = p.item_number where p.date_of_publication = '$pub_date'  LIMIT $offset, $limit ";
} 

else  {
  $query = "SELECT i.* , p.id as publication_id, p.date_of_publication , p.item_number FROM publication p join item i on i.item_no = p.item_number LIMIT $offset, $limit ";
}


$result = mysqli_query($conn, $query);

$output = '';

$output .= '<table class="table home-page-table mt-4 table-striped table-responsive-sm">
<thead>
  <tr>
    <th scope="col">Date of publication</th>
    <th scope="col">Item Number</th>
    <th scope="col">Plantilla</th>
    <th scope="col">SG</th>
    <th scope="col">Department</th>
    <th scope="col">Office</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody>';

if (mysqli_num_rows($result) > 0) {
  while ($mydata = mysqli_fetch_assoc($result)) {

    $output .= "<tr>
        <td>{$mydata['date_of_publication']}</td>
        <td> {$mydata['item_number']} </td>
        <td>{$mydata['position']}</td>
        <td>{$mydata['salary_grade']}</td>
        <td>{$mydata['division']}</td>
        <td>{$mydata['area_wrk_assign']}</td>
        <td>
                <a class='view_publication_btn' data-toggle='modal' data-target='#view_publication' data-id='{$mydata['publication_id']}'><i class='fa fa-edit mx-2'></i></a>

                <a href='applicant.php?item_no={$mydata['item_number']}'><i class='fa fa-file-alt mx-2'></i></a>

                <a href='permanent_appointment.php?item-no={$mydata['item_number']}'><i class='fa fa-user-edit mx-2'></i></a>

                <a href='' class='delete_modal' data-toggle='modal' data-target='#delete_modal' data-id='publication_id={$mydata['publication_id']}'><i class='fa fa-trash mx-2'></i></a>

              </td>
        </tr>";

 }

  $output .= "</tbody> </table> ";

  

  // pagination

  $sql = 'SELECT id FROM publication';

  $records = mysqli_query($conn, $sql);
  $totalRecords = mysqli_num_rows($records);
  $totalPage = ceil($totalRecords / $limit);
  $showpageli = 3;

  $output .= '<div class=" d-flex justify-content-between mt-4 ">
              <div>
              <a href="" class="btn button-1 mr-3" style="height:35px" id="publication_print"><i class="fa fa-print"></i></a>
              <p class="text-lowercase " style="display: contents;">' . $limit . ' ' . "of" . '  ' . $totalRecords . '</p>
              </div> ';


  $output .= "<ul class='pagination '>";

  include "../includes/pagination_ul.php"; //getting pagination to work

  $output .= '</ul> </div>';
  echo $output;


} else {

  $output .= "<tr><td colspan='7'>No data Available</td> </tr> </tbody></table>";

  echo $output;
}
?>


<script>
$(".view_publication_btn").click(function() {
  console.log('hi');
  $.ajax({
    type: 'POST',
    url: 'get_publication_details.php',
    data: {
      id: $(this).data("id")
    },
    success: function(data) {
      $("#view_publication_details").html(data); //the data is displayed in id=display_details
    }
  });
});

// console.log(pub_date);
      // var url = '../includes/export_excel.php?publication?' ;
      // var newHref = url.concat(pub_date);
      // $('#publication_print').attr('href', newHref);

       $('#publication_print').on('click', function() {
      var pub_date = $('#pub_date').val();
      var url = '../includes/export_excel.php?publication=' ;
     var newHref = url.concat(pub_date);
     console.log(pub_date);
    $('#publication_print').attr('href', newHref);
    });

</script>