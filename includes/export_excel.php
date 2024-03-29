<?php
//export.php  

require '../includes/conn.php';

// Including all files from library
require "../vendor/autoload.php";

// Creating a new sheet in Excel file
$spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();

// Create a write object to save the file and pass spreadsheet instance as parameter
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);



$output = '';

if (isset($_GET["publication"])) {

    include "../export_excel_parts/publication.php";
}

if (isset($_GET["service_record"])) {

    include "../export_excel_parts/service_record.php";
}

if (isset($_GET["leave_ledger_report"])) {

    include "../export_excel_parts/leave_ledger_report.php";
}

if (isset($_GET["pds_report"])) {

    include "../export_excel_parts/pds_report.php";
}

if (isset($_GET["leave_summary"])) {

    include "../export_excel_parts/leave_summary.php";
}

if (isset($_GET["leave_application_report"])) {

    include "../export_excel_parts/leave_application_report.php";
}

if (isset($_GET["leave_credits"])) {

    include "../export_excel_parts/leave_credits.php";
}

if (isset($_GET["performance_summary_list"])) {

    include "../export_excel_parts/performance_summary_list.php";
}

if (isset($_GET["daily_accomplishment_report"])) {

    include "../export_excel_parts/daily_accomplishment_report.php";
}

if (isset($_GET["consolidated_performance_review"])) {

    include "../export_excel_parts/consolidated_performance_review.php";
}

if (isset($_GET["division_performance_review"])) {

    include "../export_excel_parts/division_performance_review.php";
}
if (isset($_GET["view_learning_summary_print"])) {

    include "../export_excel_parts/view_learning_summary_print.php";
}
if (isset($_GET["item_report_generation"])) {

    include "../export_excel_parts/item_report_generation.php";
}
if (isset($_GET["month_leave_report"])) {

    include "../export_excel_parts/month_leave_report.php";
}
if (isset($_GET["monthly_training_report_attendance_ld"])) {

    include "../export_excel_parts/monthly_training_report_attendance_ld.php";
}
if (isset($_GET["monthly_learning_development_database"])) {

    include "../export_excel_parts/monthly_learning_development_database.php";
}
if (isset($_GET["summary_of_position"])) {

    include "../export_excel_parts/summary_of_position.php";
}
if (isset($_GET["educational_profile"])) {

    include "../export_excel_parts/educational_profile.php";
}
if (isset($_GET["dob_over_age"])) {

    include "../export_excel_parts/dob_over_age.php";
}



