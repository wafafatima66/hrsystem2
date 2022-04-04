<?php
require '../includes/conn.php';

if (isset($_POST['submit'])) {


    // $emp_id='wjkkk1';
    // $emp_office_assign='programmer';
    // $emp_image='programmer';
    // $emp_office_dept='hsdsd'  ;
    // $emp_salary='jushd';

    $emp_id = $_POST['emp_id'];
    // $emp_image='programmer';



    $emp_first_name = $_POST['emp_first_name'];
    $emp_middle_name = $_POST['emp_middle_name'];
    $emp_last_name = $_POST['emp_last_name'];
    $emp_ext = $_POST['emp_ext'];
    $emp_dob = $_POST['emp_dob'];
    $emp_gender = $_POST['emp_gender'];
    $emp_civil_status = $_POST['emp_civil_status'];
    $emp_height = $_POST['emp_height'];
    $emp_weight = $_POST['emp_weight'];
    $emp_blood = $_POST['emp_blood'];
    $emp_citizen = $_POST['emp_citizen'];
    $emp_nationality = $_POST['emp_nationality'];

    $emp_birth_add_barangay = $_POST['emp_birth_add_barangay'];
    $emp_birth_add_province = $_POST['emp_birth_add_province'];
    $emp_birth_add_municipal = $_POST['emp_birth_add_municipal'];
    $emp_birth_add_zipcode = $_POST['emp_birth_add_zipcode'];

    $emp_resi_add = $_POST['emp_resi_add'];
    $emp_resi_add_street = $_POST['emp_resi_add_street'];
    $emp_per_add_subvillage = $_POST['emp_per_add_subvillage'];
    $emp_resi_add_municipal = $_POST['emp_resi_add_municipal'];
    $emp_resi_add_barangay = $_POST['emp_resi_add_barangay'];
    $emp_resi_add_zipcode = $_POST['emp_resi_add_zipcode'];
    $emp_resi_add_province = $_POST['emp_resi_add_province'];
    $emp_per_add = $_POST['emp_per_add'];
    $emp_per_add_street = $_POST['emp_per_add_street'];
    $emp_resi_add_subvillage = $_POST['emp_resi_add_subvillage'];
    $emp_per_add_municipal = $_POST['emp_per_add_municipal'];
    $emp_per_add_barangay = $_POST['emp_per_add_barangay'];
    $emp_per_add_zipcode = $_POST['emp_per_add_zipcode'];
    $emp_per_add_province = $_POST['emp_per_add_province'];
    $emp_tel_no = $_POST['emp_tel_no'];
    $emp_mb_no = $_POST['emp_mb_no'];
    $emp_email = $_POST['emp_email'];
    $emp_contact_gs = $_POST['emp_contact_gs'];
    $emp_contact_pag = $_POST['emp_contact_pag'];
    $emp_contact_ph = $_POST['emp_contact_ph'];
    $emp_contact_ss = $_POST['emp_contact_ss'];
    $emp_contact_tin = $_POST['emp_contact_tin'];
    $emp_contact_agency = $_POST['emp_contact_agency'];

    //family_background


    $emp_father_lastname = $_POST['emp_father_lastname'];
    $emp_father_firstname = $_POST['emp_father_firstname'];
    $emp_father_middlename = $_POST['emp_father_middlename'];
    $emp_father_extname = $_POST['emp_father_extname'];


    $emp_mother_lastname = $_POST['emp_mother_lastname'];
    $emp_mother_firstname = $_POST['emp_mother_firstname'];
    $emp_mother_middlename = $_POST['emp_mother_middlename'];
    $emp_mother_extname = $_POST['emp_mother_extname'];


    //education background

    $ele_school_name = $_POST['ele_school_name'];
    $ele_degree = $_POST['ele_degree'];
    $ele_from_date = $_POST['ele_from_date'];
    $ele_to_date = $_POST['ele_to_date'];
    $ele_units = $_POST['ele_units'];
    $ele_award = $_POST['ele_award'];
    $ele_graduation = $_POST['ele_graduation'];

    $sec_school_name = $_POST['sec_school_name'];
    $sec_degree = $_POST['sec_degree'];
    $sec_from_date = $_POST['sec_from_date'];
    $sec_to_date = $_POST['sec_to_date'];
    $sec_units = $_POST['sec_units'];
    $sec_award = $_POST['sec_award'];
    $sec_graduation = $_POST['sec_graduation'];

    $voc_school_name = $_POST['voc_school_name'];
    $voc_degree = $_POST['voc_degree'];
    $voc_from_date = $_POST['voc_from_date'];
    $voc_to_date = $_POST['voc_to_date'];
    $voc_units = $_POST['voc_units'];
    $voc_award = $_POST['voc_award'];
    $voc_graduation = $_POST['voc_graduation'];


    // other
    $condition_1 = $_POST['condition_1'];
    // $condition_1_des=$_POST['condition_1_des'];
    $condition_2 = $_POST['condition_2'];
    $condition_2_des = $_POST['condition_2_des'];
    $condition_3 = $_POST['condition_3'];
    $condition_3_des = $_POST['condition_3_des'];
    $condition_4 = $_POST['condition_4'];
    $condition_4_des = $_POST['condition_4_des'];
    $condition_4_date = $_POST['condition_4_date'];
    $condition_4_status = $_POST['condition_4_status'];
    $condition_5 = $_POST['condition_5'];
    $condition_5_des = $_POST['condition_5_des'];
    $condition_6 = $_POST['condition_6'];
    $condition_6_des = $_POST['condition_6_des'];
    $condition_7 = $_POST['condition_7'];
    $condition_7_des = $_POST['condition_7_des'];
    $condition_8 = $_POST['condition_8'];
    $condition_8_des = $_POST['condition_8_des'];
    $condition_9 = $_POST['condition_9'];
    $condition_9_des = $_POST['condition_9_des'];
    $condition_10 = $_POST['condition_10'];
    $condition_10_des = $_POST['condition_10_des'];
    $condition_11 = $_POST['condition_11'];
    $condition_11_des = $_POST['condition_11_des'];
    $condition_12 = $_POST['condition_12'];
    $condition_12_des = $_POST['condition_12_des'];

    // refernces




    // inserting quiries

    $query = "SELECT * FROM employee WHERE emp_id = '$emp_id'";
    $runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);
    if ($rowcount > 0) {

        while ($mydata = $runquery->fetch_assoc()) {
            $active = $mydata['active'];
            $emp_image = $mydata['emp_image'];
            // echo $emp_image ; die ;
            $emp_banner = $mydata['emp_banner'];
        }
        
        // image for employee

        // if (!empty($_FILES["emp_image"]["name"])) {
        //     $emp_image = "employee" . $emp_id . "-" . $_FILES["emp_image"]["name"];

        //     $tempname = $_FILES["emp_image"]["tmp_name"];
        //     $folder = "../emp_img/" . $emp_image;


        //     //checking file extension

        //     $text1 = explode('.', $_FILES['emp_image']['name']);
        //     $text = strtolower(end($text1));
        //     $file_ext = strtolower($text);
        //     $extensions = array("jpeg", "jpg", "png");

        //     if (in_array($file_ext, $extensions) === false) {
        //         echo  '<script>toastr.error("Image must be JPG , JPEG ,PNG format ! ")</script>';
        //     } else {
        //         (move_uploaded_file($tempname, $folder));
        //     }
        // } else {
        //     while ($mydata = $runquery->fetch_assoc()) {
        //         $emp_image = $mydata['emp_image'];
        //     }
        // }

         // banner for employee

        //  if (!empty($_FILES["emp_banner"]["name"])) {
        //     $emp_banner = "employee-banner" . $emp_id . "-" . $_FILES["emp_banner"]["name"];

        //     $tempname = $_FILES["emp_banner"]["tmp_name"];
        //     $folder = "../emp_img/" . $emp_banner;


        //     //checking file extension

        //     $text1 = explode('.', $_FILES['emp_banner']['name']);
        //     $text = strtolower(end($text1));
        //     $file_ext = strtolower($text);
        //     $extensions = array("jpeg", "jpg", "png");

        //     if (in_array($file_ext, $extensions) === false) {
        //         echo  '<script>toastr.error("Banner Image must be JPG , JPEG ,PNG format ! ")</script>';
        //     } else {
        //         (move_uploaded_file($tempname, $folder));
        //     }
        // } else {
        //     while ($mydata = $runquery->fetch_assoc()) {
        //         $emp_banner = $mydata['emp_banner'];
        //     }
        // }

        $sql = "DELETE FROM employee WHERE emp_id='$emp_id'";
        $conn->query($sql);

        $date_modified = date('d/m/Y'); 

        $item_update = "UPDATE item SET date_modified = '$date_modified' WHERE emp_id='$emp_id'"; $conn->query($item_update);

    }



    $sql1 = "INSERT INTO employee (
                    emp_id  ,  
                    emp_image,
                    emp_banner,
                    emp_first_name , 
                    emp_middle_name , 
                    emp_last_name , 
                    emp_ext , 
                    emp_dob ,
                    emp_gender ,
                    emp_civil_status  ,
                    emp_height ,
                    emp_weight ,
                    emp_blood , 
                    emp_citizen , 
                    emp_nationality ,

                    emp_birth_add_barangay ,
                    emp_birth_add_province  ,
                    emp_birth_add_municipal  ,
                    emp_birth_add_zipcode  ,

                    emp_resi_add ,
                    emp_resi_add_street  ,
                    emp_resi_add_municipal  ,
                    emp_resi_add_barangay  ,
                    emp_resi_add_zipcode  , 
                    emp_resi_add_province  , 
                    emp_resi_add_subvillage  , 
                    emp_per_add ,
                    emp_per_add_street  , 
                    emp_per_add_municipal  ,
                    emp_per_add_barangay  ,
                    emp_per_add_zipcode  , 
                    emp_per_add_province  , 
                    emp_per_add_subvillage  , 
                    emp_tel_no  ,
                    emp_mb_no  , 
                    emp_email ,
                    emp_contact_gs , 
                    emp_contact_pag , 
                    emp_contact_ph ,
                    emp_contact_ss ,
                    emp_contact_tin ,
                    emp_contact_agency   , 
                    emp_father_lastname  , 
                    emp_father_firstname  ,
                    emp_father_middlename  , 
                    emp_father_extname  ,
                    emp_mother_lastname  , 
                    emp_mother_firstname  , 
                    emp_mother_middlename  , 
                    emp_mother_extname  , 
                    ele_school_name  , 
                    ele_degree  , 
                    ele_from_date  , 
                    ele_to_date  , 
                    ele_units  ,
                    ele_award  , 
                    ele_graduation  ,
                    sec_school_name  , 
                    sec_degree  , 
                    sec_from_date  ,
                    sec_to_date  , 
                    sec_units  , 
                    sec_award  , 
                    sec_graduation  ,
                    voc_school_name  ,
                    voc_degree  , 
                    voc_from_date , 
                    voc_to_date  ,
                    voc_units  , 
                    voc_award  ,
                    voc_graduation  , 
                    condition_1  , 
                    condition_2  , 
                    condition_2_des  ,
                    condition_3  , 
                    condition_3_des  ,
                    condition_4  , 
                    condition_4_des  ,
                    condition_4_date  , 
                    condition_4_status  , 
                    condition_5  ,
                    condition_5_des  , 
                    condition_6  , 
                    condition_6_des  , 
                    condition_7  , 
                    condition_7_des  , 
                    condition_8  , 
                    condition_8_des  ,
                    condition_9  , 
                    condition_9_des  , 
                    condition_10  , 
                    condition_10_des  , 
                    condition_11  , 
                    condition_11_des  ,
                    condition_12  ,
                    condition_12_des , active
                    ) VALUES ( 
                    '$emp_id'  ,
                    '$emp_image'  ,
                    '$emp_banner'  ,
                    '$emp_first_name' , 
                    '$emp_middle_name' ,
                    '$emp_last_name' , 
                    '$emp_ext' , 
                    '$emp_dob' , 
                    '$emp_gender' ,
                    '$emp_civil_status'  , 
                    '$emp_height' ,
                    '$emp_weight' , 
                    '$emp_blood' , 
                    '$emp_citizen' , 
                    '$emp_nationality' ,

                    '$emp_birth_add_barangay' ,
                    '$emp_birth_add_province'  ,
                    '$emp_birth_add_municipal'  ,
                    '$emp_birth_add_zipcode'  ,

                    '$emp_resi_add' , 
                    '$emp_resi_add_street'  ,
                    '$emp_resi_add_municipal'  ,
                    '$emp_resi_add_barangay'  , 
                    '$emp_resi_add_zipcode'  , 
                    '$emp_resi_add_province'  , 
                    '$emp_resi_add_subvillage'  , 
                    '$emp_per_add' , 
                    '$emp_per_add_street'  , 
                    '$emp_per_add_municipal'  ,
                    '$emp_per_add_barangay'  ,
                    '$emp_per_add_zipcode'  , 
                    '$emp_per_add_province'  , 
                    '$emp_per_add_subvillage'  , 
                    '$emp_tel_no'  , 
                    '$emp_mb_no'  , 
                    '$emp_email' , 
                    '$emp_contact_gs' , 
                    '$emp_contact_pag' ,
                    '$emp_contact_ph' ,
                    '$emp_contact_ss' , 
                    '$emp_contact_tin' ,
                    '$emp_contact_agency' , 
                    '$emp_father_lastname'  , 
                    '$emp_father_firstname'  , 
                    '$emp_father_middlename'  , 
                    '$emp_father_extname' , 
                    '$emp_mother_lastname'  ,
                    ' $emp_mother_firstname'  ,
                    '$emp_mother_middlename'  ,
                    '$emp_mother_extname'  , 
                    '$ele_school_name'  , 
                    '$ele_degree'  , 
                    '$ele_from_date'  , 
                    '$ele_to_date'  ,
                    '$ele_units'  , 
                    '$ele_award'  , 
                    '$ele_graduation'  , 
                    '$sec_school_name'  ,
                    '$sec_degree'  , 
                    '$sec_from_date'  , 
                    '$sec_to_date'  , 
                    '$sec_units'  , 
                    '$sec_award ' , 
                    '$sec_graduation'  , 
                    '$voc_school_name'  , 
                    '$voc_degree'  ,
                    '$voc_from_date'  ,
                    '$voc_to_date'  , 
                    '$voc_units'  , 
                    '$voc_award'  , 
                    '$voc_graduation'  ,   
                    '$condition_1'  , 
                    '$condition_2'  , 
                    '$condition_2_des ' ,
                    '$condition_3'  , 
                    '$condition_3_des'  , 
                    '$condition_4'  , 
                    '$condition_4_des'  ,
                    '$condition_4_date'  ,
                    '$condition_4_status'  ,
                    '$condition_5'  , 
                    '$condition_5_des'  , 
                    '$condition_6'  , 
                    '$condition_6_des'  , 
                    '$condition_7'  , 
                    '$condition_7_des'  ,
                    '$condition_8'  , 
                    '$condition_8_des ' ,
                    '$condition_9'  , 
                    '$condition_9_des'  , 
                    '$condition_10'  ,
                    '$condition_10_des ' ,
                    '$condition_11'  , 
                    '$condition_11_des'  ,
                    '$condition_12'  , 
                    '$condition_12_des' ,'$active' 
)";



    // employee education
    $query = "SELECT * FROM emp_education WHERE emp_id = '$emp_id' and type ='college'";
    $runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);
    if ($rowcount > 0) {

        $sql = "DELETE FROM emp_education WHERE emp_id='$emp_id' and type ='college'";
        $conn->query($sql);
    }

    if (!empty($_POST['coll_school_name'])) {
        for ($i = 0; $i < count($_POST['coll_school_name']); $i++) {


            $coll_school_name = $_POST['coll_school_name'][$i];
            $coll_degree = $_POST['coll_degree'][$i];
            $coll_from_date = $_POST['coll_from_date'][$i];
            $coll_to_date = $_POST['coll_to_date'][$i];
            $coll_units = $_POST['coll_units'][$i];
            $coll_award = $_POST['coll_award'][$i];
            $coll_graduation = $_POST['coll_graduation'][$i];


            $sql13 = "INSERT INTO emp_education (emp_id,school_name  , degree  , from_date  , to_date  , units  , award  , graduation  , type )
           VALUES ('$emp_id', '$coll_school_name'  , '$coll_degree'  , '$coll_from_date'  , '$coll_to_date'  ,' $coll_units'  , '$coll_award'  , '$coll_graduation' , 'college')";

            $conn->query($sql13);
        }
    }



    $query = "SELECT * FROM emp_education WHERE emp_id = '$emp_id' and type ='graduation'";
    $runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);
    if ($rowcount > 0) {

        $sql = "DELETE FROM emp_education WHERE emp_id='$emp_id' and type ='graduation'";
        $conn->query($sql);
    }

    if (!empty($_POST['gra_school_name'])) {
        for ($i = 0; $i < count($_POST['gra_school_name']); $i++) {

            $gra_school_name = $_POST['gra_school_name'][$i];
            $gra_degree = $_POST['gra_degree'][$i];
            $gra_from_date = $_POST['gra_from_date'][$i];
            $gra_to_date = $_POST['gra_to_date'][$i];
            $gra_units = $_POST['gra_units'][$i];
            $gra_award = $_POST['gra_award'][$i];
            $gra_graduation = $_POST['gra_graduation'][$i];

            $sql14 = "INSERT INTO emp_education (emp_id, school_name  , degree  , from_date  , to_date  , units  , award  , graduation  , type )
           VALUES ('$emp_id', '$gra_school_name'  , '$gra_degree'  , '$gra_from_date'  , '$gra_to_date'  , '$gra_units'  , '$gra_award'  , '$gra_graduation', 'graduation')";

            $conn->query($sql14);
        }
    }



    // employee spouse 
    $query = "SELECT * FROM emp_spouse WHERE emp_id = '$emp_id'";
    $runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);
    if ($rowcount > 0) {

        $sql = "DELETE FROM emp_spouse WHERE emp_id='$emp_id'";
        $conn->query($sql);
    }
    if (!empty($_POST['emp_spouse_lastname'])) {
        for ($i = 0; $i < count($_POST['emp_spouse_lastname']); $i++) {

            $emp_spouse_lastname = $_POST['emp_spouse_lastname'][$i];
            $emp_spouse_firstname = $_POST['emp_spouse_firstname'][$i];
            $emp_spouse_middlename = $_POST['emp_spouse_middlename'][$i];
            $emp_spouse_extname = $_POST['emp_spouse_extname'][$i];

            $emp_sp_occupation = $_POST['emp_sp_occupation'][$i];
            $emp_sp_employer = $_POST['emp_sp_employer'][$i];
            $emp_sp_add = $_POST['emp_sp_add'][$i];
            $emp_sp_tel = $_POST['emp_sp_tel'][$i];


            $sql12 = "INSERT INTO emp_spouse (emp_id,emp_spouse_lastname,emp_spouse_firstname,emp_spouse_middlename,emp_spouse_extname,emp_sp_occupation,emp_sp_employer,emp_sp_add,emp_sp_tel)
            VALUES ('$emp_id', '$emp_spouse_lastname', '$emp_spouse_firstname', '$emp_spouse_middlename', '$emp_spouse_extname', '$emp_sp_occupation', '$emp_sp_employer', '$emp_sp_add', '$emp_sp_tel')";

            $conn->query($sql12);
        }
    }





    // employee children 

    $query = "SELECT * FROM emp_children WHERE emp_id = '$emp_id'";
    $runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);
    if ($rowcount > 0) {

        $sql = "DELETE FROM emp_children WHERE emp_id='$emp_id'";
        $conn->query($sql);
    }
    if (!empty($_POST['emp_child_name'])) {
        for ($i = 0; $i < count($_POST['emp_child_name']); $i++) {

            $emp_child_name = $_POST['emp_child_name'][$i];
            $emp_child_dob = $_POST['emp_child_dob'][$i];


            $sql2 = "INSERT INTO emp_children (emp_id,emp_child_name,emp_child_dob)
            VALUES ('$emp_id', '$emp_child_name', '$emp_child_dob')";

            $conn->query($sql2);
        }
    }

    // var_dump('bye');
    // exit;

    // civil service

    $query = "SELECT * FROM emp_civil_service WHERE emp_id = '$emp_id'";
    $runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);
    if ($rowcount > 0) {

        $sql = "DELETE FROM emp_civil_service WHERE emp_id='$emp_id'";
        $conn->query($sql);
    }

    if (!empty($_POST['civil_exam_type'])) {
        for ($i = 0; $i < count($_POST['civil_exam_type']); $i++) {


            $civil_exam_type = $_POST['civil_exam_type'][$i];
            $civil_exam_name = $_POST['civil_exam_name'][$i];
            $civil_exam_rating = $_POST['civil_exam_rating'][$i];
            $civil_exam_date = $_POST['civil_exam_date'][$i];
            $civil_exam_place = $_POST['civil_exam_place'][$i];
            $civil_exam_licence_no = $_POST['civil_exam_licence_no'][$i];
            $civil_exam_licence_val = $_POST['civil_exam_licence_val'][$i];

            $sql3 = "INSERT INTO emp_civil_service (emp_id, civil_exam_type, civil_exam_name, civil_exam_rating,civil_exam_date, civil_exam_place, civil_exam_licence_no, civil_exam_licence_val)
        VALUES ('$emp_id', '$civil_exam_type', '$civil_exam_name', '$civil_exam_rating', '$civil_exam_date', '$civil_exam_place', '$civil_exam_licence_no', '$civil_exam_licence_val')";

            $conn->query($sql3);
        }
    }

    //work experience 

    $query = "SELECT * FROM emp_work_experience WHERE emp_id = '$emp_id'";
    $runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);
    if ($rowcount > 0) {

        $sql = "DELETE FROM emp_work_experience WHERE emp_id='$emp_id'";
        $conn->query($sql);
    }

    if (!empty($_POST['work_position'])) {
        for ($i = 0; $i < count($_POST['work_position']); $i++) {

            $work_from_date = $_POST['work_from_date'][$i];
            $work_to_date = $_POST['work_to_date'][$i];
            $work_position = $_POST['work_position'][$i];
            $work_employer = $_POST['work_employer'][$i];
            $work_govt_service = $_POST['work_govt_service'][$i];
            $work_monthly_sal = $_POST['work_monthly_sal'][$i];
            $work_increment = $_POST['work_increment'][$i];
            $work_status = $_POST['work_status'][$i];

            $sql4 = "INSERT INTO emp_work_experience (emp_id, work_to_date, work_from_date, work_position, work_employer, work_govt_service, work_monthly_sal, work_increment ,work_status)
        VALUES ('$emp_id', '$work_to_date', '$work_from_date', '$work_position', '$work_employer', '$work_govt_service', '$work_monthly_sal', '$work_increment' , '$work_status')";

            $conn->query($sql4);
        }
    }
    //voluntary 

    $query = "SELECT * FROM emp_voluntary_work WHERE emp_id = '$emp_id'";
    $runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);
    if ($rowcount > 0) {

        $sql = "DELETE FROM emp_voluntary_work WHERE emp_id='$emp_id'";
        $conn->query($sql);
    }

    if (!empty($_POST['vol_name_org'])) {
        for ($i = 0; $i < count($_POST['vol_name_org']); $i++) {

            $vol_name_org = $_POST['vol_name_org'][$i];
            $vol_org_add = $_POST['vol_org_add'][$i];
            $vol_from_date = $_POST['vol_from_date'][$i];
            $vol_to_date = $_POST['vol_to_date'][$i];
            $vol_no_of_hrs = $_POST['vol_no_of_hrs'][$i];
            $vol_position = $_POST['vol_position'][$i];

            $sql5 = "INSERT INTO emp_voluntary_work (emp_id, vol_name_org, vol_org_add, vol_from_date, vol_to_date, vol_no_of_hrs, vol_position )
        VALUES ('$emp_id', '$vol_name_org', '$vol_org_add', '$vol_from_date', '$vol_to_date', '$vol_no_of_hrs', '$vol_position')";

            $conn->query($sql5);
        }
    }
    // training

    $query = "SELECT * FROM emp_training WHERE emp_id = '$emp_id'";
    $runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);
    if ($rowcount > 0) {

        $sql = "DELETE FROM emp_training WHERE emp_id='$emp_id'";
        $conn->query($sql);
    }

    if (!empty($_POST['title_of_training'])) {
        for ($i = 0; $i < count($_POST['title_of_training']); $i++) {

            $title_of_training = $_POST['title_of_training'][$i];
            $training_type_of_position = $_POST['training_type_of_position'][$i];
            $training_no_of_hrs = $_POST['training_no_of_hrs'][$i];
            $training_from_date = $_POST['training_from_date'][$i];
            $training_to_date = $_POST['training_to_date'][$i];
            $training_conducted_by = $_POST['training_conducted_by'][$i];


            if (!empty($_FILES["training_files"]["name"][$i])) {
                // $emp_id =  $_POST['emp_id'];
                $filename = "employee - " . $emp_id . "-" . $_FILES["training_files"]["name"][$i];
                $tempname = $_FILES["training_files"]["tmp_name"][$i];
                $folder = "../files/" . $filename;
                $file_size = $_FILES['training_files']['size'];
                $file_type = $_FILES['training_files']['type'];
                $file_date = date("Y-m-d");
                move_uploaded_file($tempname, $folder);
                // upload it into emp file 201
                $file = "INSERT INTO emp_file (emp_id ,file_folder, file_name, file_type, file_size,file_date) VALUE ('$emp_id' ,'certificates', '$filename', '$file_type', '$file_size', '$file_date')";
                $conn->query($file);
            } else {
                $filename = "";
            }

            $sql6 = "INSERT INTO emp_training (emp_id, title_of_training, training_type_of_position, training_no_of_hrs, training_from_date, training_to_date, training_conducted_by,file)
        VALUES ('$emp_id', '$title_of_training', '$training_type_of_position', '$training_no_of_hrs', '$training_from_date', '$training_to_date', '$training_conducted_by','$filename')";

            $conn->query($sql6);
        }
    }
    //membership

    $query = "SELECT * FROM emp_membership WHERE emp_id = '$emp_id'";
    $runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);
    if ($rowcount > 0) {

        $sql = "DELETE FROM emp_membership WHERE emp_id='$emp_id'";
        $conn->query($sql);
    }

    if (!empty($_POST['emp_membership'])) {
        for ($i = 0; $i < count($_POST['emp_membership']); $i++) {


            $emp_membership = $_POST['emp_membership'][$i];

            $sql7 = "INSERT INTO emp_membership (emp_id, emp_membership)
        VALUES ('$emp_id', '$emp_membership')";

            $conn->query($sql7);
        }
    }
    // aacademic 

    $query = "SELECT * FROM emp_non_academic WHERE emp_id = '$emp_id'";
    $runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);
    if ($rowcount > 0) {

        $sql = "DELETE FROM emp_non_academic WHERE emp_id='$emp_id'";
        $conn->query($sql);
    }

    if (!empty($_POST['emp_non_academic'])) {
        for ($i = 0; $i < count($_POST['emp_non_academic']); $i++) {

            $emp_non_academic = $_POST['emp_non_academic'][$i];

            $sql8 = "INSERT INTO emp_non_academic (emp_id, emp_non_academic)
        VALUES ('$emp_id', '$emp_non_academic')";

            $conn->query($sql8);
        }
    }
    // special skills


    $query = "SELECT * FROM emp_special_skills WHERE emp_id = '$emp_id'";
    $runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);
    if ($rowcount > 0) {

        $sql = "DELETE FROM emp_special_skills WHERE emp_id='$emp_id'";
        $conn->query($sql);
    }

    if (!empty($_POST['emp_special_skills'])) {

        for ($i = 0; $i < count($_POST['emp_special_skills']); $i++) {


            $emp_special_skills = $_POST['emp_special_skills'][$i];

            $sql9 = "INSERT INTO emp_special_skills (emp_id, emp_special_skills)
        VALUES ('$emp_id', '$emp_special_skills')";

            $conn->query($sql9);
        }
    }

    // reference

    $query = "SELECT * FROM emp_reference WHERE emp_id = '$emp_id'";
    $runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);
    if ($rowcount > 0) {

        $sql = "DELETE FROM emp_reference WHERE emp_id='$emp_id'";
        $conn->query($sql);
    }

    if (!empty($_POST['ref_full_name'])) {
        for ($i = 0; $i < count($_POST['ref_full_name']); $i++) {

            $ref_full_name = $_POST['ref_full_name'][$i];
            $ref_add = $_POST['ref_add'][$i];
            $ref_tel = $_POST['ref_tel'][$i];


            $sql10 = "INSERT INTO emp_reference (emp_id, ref_full_name, ref_add, ref_tel)
        VALUES ('$emp_id', '$ref_full_name', '$ref_add', '$ref_tel')";

            $conn->query($sql10);
        }
    }
    // govt id 

    $query = "SELECT * FROM emp_govt_id WHERE emp_id = '$emp_id'";
    $runquery = $conn->query($query);
    $rowcount = mysqli_num_rows($runquery);
    if ($rowcount > 0) {

        $sql = "DELETE FROM emp_govt_id WHERE emp_id='$emp_id'";
        $conn->query($sql);
    }

    if (!empty($_POST['emp_gov_issued_id'])) {
        for ($i = 0; $i < count($_POST['emp_gov_issued_id']); $i++) {

            $emp_gov_issued_id = $_POST['emp_gov_issued_id'][$i];
            $emp_gov_issued_id_type = $_POST['emp_gov_issued_id_type'][$i];

            $sql11 = "INSERT INTO emp_govt_id (emp_id,emp_gov_issued_id, emp_gov_issued_id_type)
        VALUES ('$emp_id', '$emp_gov_issued_id', '$emp_gov_issued_id_type')";

            $conn->query($sql11);
        }
    }

    if (mysqli_query($conn, $sql1)) {

        $sql = mysqli_query($conn, "select id from employee where emp_id = '$emp_id' ");

        $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
        $id = $row['id'];

        header("Location:../emp_mang/emp_profile.php?id=" . $id . "&success");
    } else {
        echo  '<script>toastr.error("Employee not updated. Try again !")</script>';
    }
}
