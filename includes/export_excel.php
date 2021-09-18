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

if(isset($_GET["publication"]))
{
    
        $date =  $_GET["publication"] ; 
        if(empty($date)){
            header("Location:../hiring_publication");
        } 
   


    //MERGE CELLS FOR GAP 
    $spreadsheet->getActiveSheet()->mergeCells("A1:H5");
    $spreadsheet->getActiveSheet()->mergeCells("I1:K4");
    $spreadsheet->getActiveSheet()->mergeCells("A6:K7");
   

    //PLACING DATE
    $spreadsheet->getActiveSheet()->mergeCells("I5:K5");
    $spreadsheet->getActiveSheet()->setCellValue("I5", "Date :" .$date);

    //merge cells 
    $spreadsheet->getActiveSheet()->mergeCells("A8:D8");
    $spreadsheet->getActiveSheet()->mergeCells("E8:I8");
    $spreadsheet->getActiveSheet()->mergeCells("J8:K8");

    //SET HEADINGS
    $spreadsheet->getActiveSheet()->setCellValue("A8", "");
    $spreadsheet->getActiveSheet()->setCellValue("E8", "Qualification standards");
    $spreadsheet->getActiveSheet()->setCellValue("J8", "");
    
    //SETTING SUB HEADINGS
    $spreadsheet->getActiveSheet()->setCellValue("A9", "NO.");
    $spreadsheet->getActiveSheet()->setCellValue("B9", "Position Title");
    $spreadsheet->getActiveSheet()->setCellValue("C9", "Item No.");
    $spreadsheet->getActiveSheet()->setCellValue("D9", "Salary / Job / Pay Grade");
    $spreadsheet->getActiveSheet()->setCellValue("E9", "Education");
    $spreadsheet->getActiveSheet()->setCellValue("F9", "Training");
    $spreadsheet->getActiveSheet()->setCellValue("G9", "Experience");
    $spreadsheet->getActiveSheet()->setCellValue("H9", "Eligibility");
    $spreadsheet->getActiveSheet()->setCellValue("I9", "Competency (If Applicable)");
    $spreadsheet->getActiveSheet()->setCellValue("J9", "Brief Description of function");
    $spreadsheet->getActiveSheet()->setCellValue("K9", "Place of Assignment");

    //SET ROW HEIGHT
     $spreadsheet->getActiveSheet()->getRowDimension('8')->setRowHeight(20);
     $spreadsheet->getActiveSheet()->getRowDimension('9')->setRowHeight(30);

    //TO SET VERTICAL AND HORIZONTAL CENTER
    $spreadsheet->getActiveSheet()->getStyle('A:K')->getAlignment()->setHorizontal('left');
    $spreadsheet->getActiveSheet()->getStyle('A:K')->getAlignment()->setVertical('top');
    $spreadsheet->getActiveSheet()->getStyle('A1:K1')->getAlignment()->setWrapText(true);

    //STYLING
    $styles = [
        'font' => [
            'bold' => true,
        ]
    ];

    

    $spreadsheet->getActiveSheet()
        ->getStyle("A1:K9")
        ->applyFromArray($styles);

        // $spreadsheet->getDefaultStyle()->getAlignment()->setWrapText(true);

    
    //SET AUTOSIZE FOR ALL COLUMNS 
        foreach(range('A','K') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }
 

    
  
//  $query = "SELECT i.* , p.id as publication_id, p.date_of_publication , p.item_number FROM publication p join item i on i.item_no = p.item_number where p.date_of_publication = '$date'";

$query = "SELECT i.* , p.date_of_publication , p.item_number , GROUP_CONCAT(DISTINCT c.add_com SEPARATOR ',') as competency , GROUP_CONCAT(DISTINCT e.hiring_education SEPARATOR ',') as education , GROUP_CONCAT(DISTINCT f.hiring_eligibility SEPARATOR ',') as eligibility , GROUP_CONCAT(DISTINCT t.hiring_training SEPARATOR ',') as training , GROUP_CONCAT(DISTINCT w.hiring_work_exp SEPARATOR ',') as work FROM publication p join item i on i.item_no = p.item_number join hiring_competency c on i.item_no = c.item_no join hiring_education e on i.item_no = e.item_no join hiring_eligibility f on i.item_no = f.item_no join hiring_training t on i.item_no = t.item_no join hiring_work_exp w on i.item_no = w.item_no where p.date_of_publication = '$date' GROUP BY p.item_number";

 $result = mysqli_query($conn, $query);


 $fileName = "Publication- ". $date . ".xlsx"; //date('d/m/Y')

//SELECT item_no, GROUP_CONCAT(DISTINCT add_com SEPARATOR ',') as competency FROM hiring_competency;
 
// Start from second row
$id = 1 ; 
$count = 10;

while ($row = mysqli_fetch_object($result))

{

    $competency = str_replace(',', "\n",$row->competency);
    $education = str_replace(',', "\n",$row->education);
    $eligibility = str_replace(',', "\n",$row->eligibility);
    $training = str_replace(',', "\n",$row->training);
    $work = str_replace(',', "\n",$row->work);

    // Add required data
    $spreadsheet
        ->getSheet(0)
        ->setCellValue("A" . $count, $id);
 
    $spreadsheet
        ->getSheet(0)
        ->setCellValue("B" . $count, $row->position);
     
    $spreadsheet
        ->getSheet(0)
        ->setCellValue("C" . $count,  $row->item_no);
     
    $spreadsheet
        ->getSheet(0)
        ->setCellValue("D" . $count, $row->salary_grade);
     
    $spreadsheet
        ->getSheet(0)
        ->setCellValue("E" . $count, $education);
        $spreadsheet->getActiveSheet()->getStyle("E" . $count)->getAlignment()->setWrapText(true);

    $spreadsheet
        ->getSheet(0)
        ->setCellValue("F" . $count, $training);
        $spreadsheet->getActiveSheet()->getStyle("F" . $count)->getAlignment()->setWrapText(true);

    $spreadsheet
        ->getSheet(0)
        ->setCellValue("G" . $count, $work);
        $spreadsheet->getActiveSheet()->getStyle("G" . $count)->getAlignment()->setWrapText(true);

    $spreadsheet
        ->getSheet(0)
        ->setCellValue("H" . $count, $eligibility);
        $spreadsheet->getActiveSheet()->getStyle("H" . $count)->getAlignment()->setWrapText(true);


    $spreadsheet
        ->getSheet(0)
        ->setCellValue("I" . $count, $competency);
        $spreadsheet->getActiveSheet()->getStyle("I" . $count)->getAlignment()->setWrapText(true);

    $spreadsheet
        ->getSheet(0)
        ->setCellValue("J" . $count, $row->description);
        $spreadsheet->getActiveSheet()->getStyle("J" . $count)->getAlignment()->setWrapText(true);

    $spreadsheet
        ->getSheet(0)
        ->setCellValue("K" . $count, $row->area_wrk_assign);

        // $spreadsheet->getActiveSheet()->setCellValue("L" . $count, "Hello\nWorld");

        $count++;
        $id++;
    }
   

 
 header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
 header('Content-Disposition: attachment ; filename='.$fileName);
 $writer->save('php://output');
 
 
 }
