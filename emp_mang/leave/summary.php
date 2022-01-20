<?php require '../includes/conn.php'; ?>

<style>
    .date-input {
    font-size: 12px;
}
.responsive-label {
        font-size: 12px;
        color:#54A04B;
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

    <div class="container">

        <div class="row">


            <div class="col-lg-1 col-sm-1"> </div>

            <div class="col-lg-11 col-sm-11">

                <div class="form-inline">

                    <div class="col-lg-2 col-sm-2 ">
                        <label for="" class="responsive-label">VACATION LEAVE</label>
                    </div>

                    <div class="col-lg-2 col-sm-2 ">
                        <label for=""  class="responsive-label">SICK LEAVE</label>
                    </div>

                    <div class="col-lg-2 col-sm-2 ">
                        <label for=""  class="responsive-label">SPECIAL PRIVILEDGE LEAVE</label>
                    </div>

                    <div class="col-lg-2 col-sm-2 ">
                        <label for=""  class="responsive-label">MANTATORY/FORCED LEAVE</label>
                    </div>

                    <div class="col-lg-2 col-sm-2 ">
                        <label for=""  class="responsive-label">LEAVE WITHOUT PAY</label>
                    </div>

                </div>
            </div>

        </div>

        <div class="row">

            <?php

            $array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

            for ($i = 0; $i < 12; $i++) {

                require "summary-var.php";

            ?>

                <div class="col-lg-1 col-sm-1">
                    <label for="" class="mr-2 date-input"><?php echo $array[$i] ?></label>
                </div>

                <div class="col-lg-11 col-sm-11">

                    <div class="form-inline">

                        <div class="col-lg-2 col-sm-2 form-inline p-1 ">
                            <!-- <input type="text" class="form-control text-input date-input" value="<?php echo $vac_leave_dates ?>" style="width: 60%;"> -->
                            <input type="text" class="form-control text-input date-input" value="<?php echo $vac_date_diff ?>" style="width: 60%;">
                            <input type="text" class="form-control text-input date-input" value="days" style="width: 40%;">
                        </div>

                        <div class="col-lg-2 col-sm-2 form-inline p-1">
                            <!-- <input type="text" class="form-control text-input date-input" value="<?php echo $sick_leave_dates ?>" style="width: 60%;"> -->
                            <input type="text" class="form-control text-input date-input" value="<?php echo $sick_date_diff ?>" style="width: 60%;">
                            <input type="text" class="form-control text-input date-input" value="days" style="width: 40%;">
                        </div>

                        <div class="col-lg-2 col-sm-2 form-inline p-1">
                            <!-- <input type="text" class="form-control text-input date-input" value="<?php echo $spl_leave_dates ?>" style="width: 60%;"> -->
                            <input type="text" class="form-control text-input date-input" value="<?php echo $spl_date_diff ?>" style="width: 60%;">
                            <input type="text" class="form-control text-input date-input" value="days" style="width: 40%;">
                        </div>

                        <div class="col-lg-2 col-sm-2 form-inline p-1">
                            <!-- <input type="text" class="form-control text-input date-input" value="<?php echo $man_leave_dates ?>" style="width: 60%;"> -->
                            <input type="text" class="form-control text-input date-input" value="<?php echo $man_date_diff ?>" style="width: 60%;">
                            <input type="text" class="form-control text-input date-input" value="days" style="width: 40%;">
                        </div>

                        <div class="col-lg-2 col-sm-2 form-inline p-1">
                            <!-- <input type="text" class="form-control text-input date-input" value="<?php echo $lwp_leave_dates ?>" style="width: 60%;"> -->
                            <input type="text" class="form-control text-input date-input" value="<?php echo $lwp_date_diff ?>" style="width: 60%;">
                            <input type="text" class="form-control text-input date-input" value="days" style="width: 40%;">
                        </div>

                    </div>

                </div>

            <?php



            } ?>

        </div>
    </div>
</div>