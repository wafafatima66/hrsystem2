<!--body section of education background-->

<?php


//edubackground

// $ele_school_name = "";
// $ele_degree = "";
// $ele_from_date = "";
// $ele_to_date = "";
// $ele_units = "";
// $ele_award = "";
// $ele_graduation = "";

// $sec_school_name = "";
// $sec_degree = "";
// $sec_from_date = "";
// $sec_to_date = "";
// $sec_units = "" ;
// $sec_award = "";
// $sec_graduation = "";

// $voc_school_name = "";
// $voc_degree = "";
// $voc_from_date = "";
// $voc_to_date = "";
// $voc_units = "";
// $voc_award = "";
// $voc_graduation = "";


// $coll_school_name = "";
// $coll_degree = "";
// $coll_from_date = "";
// $coll_to_date = "";
// $coll_units = "";
// $coll_award = "";
// $coll_graduation = "";

// $gra_school_name = "";
// $gra_degree = "";
// $gra_from_date = "";
// $gra_to_date = "";
// $gra_units = "";
// $gra_award = "";
// $gra_graduation = "";

// $post_school_name = "";
// $post_degree = "";
// $post_from_date = "";
// $post_to_date = "";
// $post_units = "";
// $post_award = "";
// $post_graduation = "";
?>
<!--ELEMENTARY-->

<?php  $query = "SELECT * FROM employee WHERE id = '$id'";

    $runquery = $conn -> query($query);
    if($runquery == true){
        while($mydata = $runquery -> fetch_assoc()){
            ?>


<div class="form-row mt-3">
    <div class="col-lg-12 col-sm-6">
        <h5>ElEMENTARY</h5>
    </div>
</div>



<div class="form-row mt-3">


    <div class="col-lg-3 col-sm-6">
        <div class="d-flex flex-column">
            <label for="" class="">NAME OF SCHOOL </label>
            <input type="text" class="form-control text-input" value=" <?php echo $mydata['ele_school_name']?>"
                name="ele_school_name">
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="d-flex flex-column">
            <label for="">BASIC EDUCATION</label>
            <input type="text" class="form-control text-input" value="<?php echo $mydata['ele_degree']?>" name="ele_degree">
        </div>
    </div>

   

    <div class="col-lg-6 col-sm-12">
        <div class="d-flex flex-column">
            <label for="">PERIOD OF ATTENDANCE</label>
            <div class="d-md-flex justify-content-center">
                <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['ele_from_date']?>"
                    name="ele_from_date">
                <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['ele_to_date']?>"
                    name="ele_to_date">
            </div>
        </div>
    </div>

</div>

<div class="form-row mt-3">
    <div class="col-lg-3 col-sm-12 ">
        <label for="">HIGHEST UNITS EARNED</label>
        <input type="text" class="form-control text-input" value="<?php echo $mydata['ele_units']?>" name="ele_units">
    </div>

    <div class="col-lg-3 col-sm-12">
        <label for="">SCHOLARSHIP/AWARDS</label>
        <input type="text" class="form-control text-input" value="<?php echo $mydata['ele_award']?>" name="ele_award">
    </div>

    <div class="col-lg-3 col-sm-12">
        <label for="">YEAR GRADUATED</label>
        <input type="text" class="form-control text-input date-own" value="<?php echo $mydata['ele_graduation']?>"
            name="ele_graduation">
    </div>


</div>



<!--ELEMENTARY-->


<div class="form-row mt-3">
    <div class="col-lg-12 col-sm-6">
        <h5>SECONDARY</h5>
    </div>
</div>
<div class="form-row mt-3">

    <div class="col-lg-3 col-sm-6">
        <div class="d-flex flex-column">
            <label for="">NAME OF SCHOOL</label>
            <input type="text" class="form-control text-input" value="<?php echo $mydata['sec_school_name']?>"
                name="sec_school_name">
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="d-flex flex-column">
            <label for="">BASIC EDUCATION</label>
            <input type="text" class="form-control text-input" value="<?php echo $mydata['sec_degree']?>" name="sec_degree">
        </div>
    </div>

    <div class="col-lg-6 col-sm-12">
        <div class="d-flex flex-column">
            <label for="">PERIOD OF ATTENDANCE</label>
            <div class="d-flex justify-content-center">
                <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['sec_from_date']?>"
                    name="sec_from_date">

                <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['sec_to_date']?>" name="sec_to_date">
            </div>
        </div>
    </div>

</div>
<div class="form-row mt-3">

    <div class="col-lg-3 col-sm-12">
        <label for="">HIGHEST UNITS EARNED</label>
        <input type="text" class="form-control text-input" value="<?php echo $mydata['sec_units']?>" name="sec_units">
    </div>

    <div class="col-lg-3 col-sm-12">
        <label for="">SCHOLARSHIP/AWARDS</label>
        <input type="text" class="form-control text-input" value="<?php echo $mydata['sec_award']?>" name="sec_award">
    </div>

    <div class="col-lg-3 col-sm-12">
        <label for="">YEAR GRADUATED</label>
        <input type="text" class="form-control text-input" value="<?php echo $mydata['sec_graduation']?>" name="sec_graduation">
    </div>



</div>


<!--ELEMENTARY-->

<div class="form-row mt-3">
    <div class="col-lg-12 col-sm-6">
        <h5>VOCATIONAL/TRADE COURSE</h5>
    </div>
</div>

<div class="form-row mt-3">

    <div class="col-lg-3 col-sm-6">
        <div class="d-flex flex-column">
            <label for="">NAME OF SCHOOL</label>
            <input type="text" class="form-control text-input" value="<?php echo $mydata['voc_school_name']?>"
                name="voc_school_name">
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="d-flex flex-column">
            <label for="">BASIC EDUCATION</label>
            <input type="text" class="form-control text-input" value="<?php echo $mydata['voc_degree']?>" name="voc_degree">
        </div>
    </div>

    <div class="col-lg-6 col-sm-12">
        <div class="d-flex flex-column">
            <label for="">PERIOD OF ATTENDANCE</label>
            <div class="d-flex justify-content-center">
                <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['voc_from_date']?>"
                    name="voc_from_date">

                <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['voc_to_date']?>" name="voc_to_date">
            </div>
        </div>
    </div>
</div>
<div class="form-row mt-3">

    <div class="col-lg-3 col-sm-12">
        <label for="">HIGHEST UNITS EARNED</label>
        <input type="text" class="form-control text-input" value="<?php echo $mydata['voc_units']?>" name="voc_units">
    </div>

    <div class="col-lg-3 col-sm-12">
        <label for="">SCHOLARSHIP/AWARDS</label>
        <input type="text" class="form-control text-input" value="<?php echo $mydata['voc_award']?>" name="voc_award">
    </div>

    <div class="col-lg-3 col-sm-12">
        <label for="">YEAR GRADUATED</label>
        <input type="text" class="form-control text-input"  value="<?php echo $mydata['voc_graduation']?>"
            name="voc_graduation">
    </div>



</div>



<!--ELEMENTARY-->

<div class="form-row mt-3">
    <div class="col-lg-12 col-sm-6">
        <h5>COLLEGE</h5>
    </div>
</div>



<div class="form-row mt-3">


    <div class="col-lg-3 col-sm-6">
        <div class="d-flex flex-column">
            <label for="">NAME OF SCHOOL</label>
            <input type="text" class="form-control text-input" value="<?php echo $mydata['coll_school_name']?>"
                name="coll_school_name">
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="d-flex flex-column">
            <label for="">BASIC EDUCATION</label>
            <input type="text" class="form-control text-input" value="<?php echo $mydata['coll_degree']?>" name="coll_degree">
        </div>
    </div>

    <div class="col-lg-6 col-sm-12">
        <div class="d-flex flex-column">
            <label for="">PERIOD OF ATTENDANCE</label>
            <div class="d-flex justify-content-center">
                <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['coll_from_date']?>"
                    name="coll_from_date">
                <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['coll_to_date']?>"
                    name="coll_to_date">
            </div>
        </div>
    </div>
</div>
<div class="form-row mt-3">

    <div class="col-lg-3 col-sm-12">
        <label for="">HIGHEST UNITS EARNED</label>
        <input type="text" class="form-control text-input" value="<?php echo $mydata['coll_units']?>" name="coll_units">
    </div>

    <div class="col-lg-3 col-sm-12">
        <label for="">SCHOLARSHIP/AWARDS</label>
        <input type="text" class="form-control text-input" value="<?php echo $mydata['coll_award']?>" name="coll_award">
    </div>

    <div class="col-lg-3 col-sm-12">
        <label for="">YEAR GRADUATED</label>
        <input type="text" class="form-control text-input" value="<?php echo $mydata['coll_graduation']?>" name="coll_graduation">
    </div>



</div>



<!--ELEMENTARY-->

<div class="form-row mt-3">
    <div class="col-lg-12 col-sm-6">
        <h5>GRADUATE STUDIES</h5>
    </div>
</div>



<div class="form-row mt-3">


    <div class="col-lg-3 col-sm-6">
        <div class="d-flex flex-column">
            <label for="">NAME OF SCHOOL</label>
            <input type="text" class="form-control text-input" value="<?php echo $mydata['gra_school_name']?>"
                name="gra_school_name">
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="d-flex flex-column">
            <label for="">BASIC EDUCATION</label>
            <input type="text" class="form-control text-input" value="<?php echo $mydata['gra_degree']?>" name="gra_degree">
        </div>
    </div>

    <div class="col-lg-6 col-sm-12">
        <div class="d-flex flex-column">
            <label for="">PERIOD OF ATTENDANCE</label>
            <div class="d-flex justify-content-center">
                <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['gra_from_date']?>"
                    name="gra_from_date">
                <input type="date" class="form-control text-input mx-sm-1" value="<?php echo $mydata['gra_to_date']?>" name="gra_to_date">
            </div>
        </div>
    </div>
</div>

<div class="form-row mt-3">
    <div class="col-lg-3 col-sm-12">
        <label for="">HIGHEST UNITS EARNED</label>
        <input type="text" class="form-control text-input" value="<?php echo $mydata['gra_units']?>" name="gra_units">
    </div>

    <div class="col-lg-3 col-sm-12">
        <label for="">SCHOLARSHIP/AWARDS</label>
        <input type="text" class="form-control text-input" value="<?php echo $mydata['gra_award']?>" name="gra_award">
    </div>

    <div class="col-lg-3 col-sm-12">
        <label for="">YEAR GRADUATED</label>
        <input type="text" class="form-control text-input" value="<?php echo $mydata['gra_graduation']?>" name="gra_graduation">
    </div>
</div>

<?php } } ?>