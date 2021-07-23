<?php require '../includes/conn.php'; ?>

<style>
    .date-input {
    font-size: 12px;
}

@media (max-width:768px) {
    .responsive-label {
        font-size: 7px;
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

                    <div class="col-lg-3 col-sm-3 ">
                        <label for="" style="color:#54A04B; " class="responsive-label">VACATION LEAVE</label>
                    </div>

                    <div class="col-lg-3 col-sm-3 ">
                        <label for="" style="color:#54A04B;" class="responsive-label">SICK LEAVE</label>
                    </div>

                    <div class="col-lg-3 col-sm-3 ">
                        <label for="" style="color:#54A04B;" class="responsive-label">SPECIAL PRIVILEDGE LEAVE</label>
                    </div>

                    <div class="col-lg-3 col-sm-3 ">
                        <label for="" style="color:#54A04B;" class="responsive-label">LEAVE WITHOUT PAY</label>
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

                        <div class="col-lg-3 col-sm-3 form-inline p-1 ">
                            <input type="text" class="form-control text-input date-input" value="<?php echo $vac_leave_dates ?>" style="width: 70%;">
                            <input type="text" class="form-control text-input date-input" value="<?php echo $vac_date_diff ?>days" style="width: 30%;">
                        </div>

                        <div class="col-lg-3 col-sm-3 form-inline p-1">
                            <input type="text" class="form-control text-input date-input" value="<?php echo $sick_leave_dates ?>" style="width: 70%;">
                            <input type="text" class="form-control text-input date-input" value="<?php echo $sick_date_diff ?>days" style="width: 30%;">
                        </div>

                        <div class="col-lg-3 col-sm-3 form-inline p-1">
                            <input type="text" class="form-control text-input date-input" value="<?php echo $spl_leave_dates ?>" style="width: 70%;">
                            <input type="text" class="form-control text-input date-input" value="<?php echo $spl_date_diff ?>days" style="width: 30%;">
                        </div>

                        <div class="col-lg-3 col-sm-3 form-inline p-1">
                            <input type="text" class="form-control text-input date-input" value="<?php echo $lwp_leave_dates ?>" style="width: 70%;">
                            <input type="text" class="form-control text-input date-input" value="<?php echo $lwp_date_diff ?>days" style="width: 30%;">
                        </div>

                    </div>

                </div>

            <?php



            } ?>

        </div>
    </div>
</div>