<?php 

$date =  $_GET["publication"];
    if (empty($date)) {
        header("Location:../hiring_publication?export=fail");
    }

    // main changes
    $spreadsheet->getActiveSheet()->mergeCells("A1:B1");
    $spreadsheet->getActiveSheet()->setCellValue("A1", "CS Form No.9");

    $spreadsheet->getActiveSheet()->mergeCells("A2:B2");
    $spreadsheet->getActiveSheet()->setCellValue("A2", "Revised 2018");

    $spreadsheet->getActiveSheet()->mergeCells("J1:L2");
    $spreadsheet->getActiveSheet()->setCellValue("J1", "Electronic copy to be submitted to the CSC FO must be in MS Excel format");

    $spreadsheet->getActiveSheet()->mergeCells("A3:L3");
    $spreadsheet->getActiveSheet()->setCellValue("A3", "Republic of the Philippines");

    $spreadsheet->getActiveSheet()->mergeCells("A4:L4");
    $spreadsheet->getActiveSheet()->setCellValue("A4", "(Name of Agency)");

    $spreadsheet->getActiveSheet()->mergeCells("A5:L5");

    $spreadsheet->getActiveSheet()->mergeCells("A6:L6");
    $spreadsheet->getActiveSheet()->setCellValue("A6", "Request for Publication of Varant Positions");

    $spreadsheet->getActiveSheet()->mergeCells("A8:C8");
    $spreadsheet->getActiveSheet()->setCellValue("A8", "To: CIVIL SERVICE COMMISSION (CSC)");

    $spreadsheet->getActiveSheet()->mergeCells("B10:J10");
    $spreadsheet->getActiveSheet()->setCellValue("B10", "We hereby request the publication of the following vacant positions, which are authorized to be filled, at the    (Name of Agency)    in the CSC website:");

    $spreadsheet->getActiveSheet()->mergeCells("J13:L13");
    $spreadsheet->getActiveSheet()->mergeCells("J14:L14");
    $spreadsheet->getActiveSheet()->setCellValue("J14", "HRMO");

    $spreadsheet->getActiveSheet()->setCellValue("I16", "Date:");
    $spreadsheet->getActiveSheet()->setCellValue("J16", $date);
    $spreadsheet->getActiveSheet()->mergeCells("J16:L16");

    // TABLE STARTING
    $spreadsheet->getActiveSheet()->mergeCells("A18:A19");
    $spreadsheet->getActiveSheet()->setCellValue("A18", "NO.");

    $spreadsheet->getActiveSheet()->mergeCells("B18:B19");
    $spreadsheet->getActiveSheet()->setCellValue("B18", "Position Title\n(Parenthetical Title,if applicable)");

    $spreadsheet->getActiveSheet()->mergeCells("C18:C19");
    $spreadsheet->getActiveSheet()->setCellValue("C18", "Plantilla Item No.");

    
    $spreadsheet->getActiveSheet()->mergeCells("D18:D19");
    $spreadsheet->getActiveSheet()->setCellValue("D18", "Salary / Job / Pay Grade");
    

    $spreadsheet->getActiveSheet()->mergeCells("E18:E19");
    $spreadsheet->getActiveSheet()->setCellValue("E18", "Monthly Salary");

    $spreadsheet->getActiveSheet()->mergeCells("F18:J18");
    $spreadsheet->getActiveSheet()->setCellValue("F18", "Qualification Standards");

    $spreadsheet->getActiveSheet()->setCellValue("F19", "Education");
    $spreadsheet->getActiveSheet()->setCellValue("G19", "Training");
    $spreadsheet->getActiveSheet()->setCellValue("H19", "Experience");
    $spreadsheet->getActiveSheet()->setCellValue("I19", "Eligibility");
    $spreadsheet->getActiveSheet()->setCellValue("J19", "Competency\n(If Applicable)");

    $spreadsheet->getActiveSheet()->mergeCells("K18:K19");
    $spreadsheet->getActiveSheet()->setCellValue("K18", "Brief Description of function");

    $spreadsheet->getActiveSheet()->mergeCells("L18:L19");
    $spreadsheet->getActiveSheet()->setCellValue("L18", "Place of Assignment");

    
   

    //STYLING
    $bold = [
        'font' => [
            'bold' => true,
        ]
    ];

    $border_bottom = [
        'borders' => [
            'bottom' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ]
    ];

    $all_borders = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ];

    $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');

    $spreadsheet->getActiveSheet()->getStyle('A:L')->getAlignment()->setVertical('center');
    $spreadsheet->getActiveSheet()->getStyle('A:L')->getAlignment()->setHorizontal('left');

    $spreadsheet->getActiveSheet()->getStyle('A1:L19')->getAlignment()->setHorizontal('center');
    
    
        $spreadsheet->getActiveSheet()
        ->getStyle("E18:E19")
        ->applyFromArray($bold);

        $spreadsheet->getActiveSheet()
        ->getStyle("J14:L14")
        ->applyFromArray($bold);

        $spreadsheet->getActiveSheet()
        ->getStyle("J13:L13")
        ->applyFromArray($border_bottom);

        $spreadsheet->getActiveSheet()
        ->getStyle("J16:L16")
        ->applyFromArray($border_bottom);

        $spreadsheet->getActiveSheet()
        ->getStyle("A18:L19")
        ->applyFromArray($all_borders);

        $spreadsheet->getActiveSheet()->getRowDimension('19')->setRowHeight(30);

        $spreadsheet->getActiveSheet()->getStyle('A8:C8')->getAlignment()->setHorizontal('left');
        $spreadsheet->getActiveSheet()->getStyle('B10:J10')->getAlignment()->setHorizontal('left');

    // $spreadsheet->getDefaultStyle()->getAlignment()->setWrapText(true);


    //SET AUTOSIZE FOR ALL COLUMNS 
    foreach (range('A', 'L') as $columnID) {
        $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
            ->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getStyle($columnID)
            ->getAlignment()->setWrapText(true);
    }

    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth('28');

    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth('20');

    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth('10');

    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth('12');

    $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth('20');

    $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth('25');
    



    //  $query = "SELECT i.* , p.id as publication_id, p.date_of_publication , p.item_number FROM publication p join item i on i.item_no = p.item_number where p.date_of_publication = '$date'";

    $query = "SELECT i.* , p.date_of_publication , p.item_number , p.end_of_publication , GROUP_CONCAT(DISTINCT c.add_com SEPARATOR ',') as competency , GROUP_CONCAT(DISTINCT e.hiring_education SEPARATOR ',') as education , GROUP_CONCAT(DISTINCT f.hiring_eligibility SEPARATOR ',') as eligibility , GROUP_CONCAT(DISTINCT t.hiring_training SEPARATOR ',') as training , GROUP_CONCAT(DISTINCT w.hiring_work_exp SEPARATOR ',') as work FROM publication p join item i on i.item_no = p.item_number join hiring_competency c on i.item_no = c.item_no join hiring_education e on i.item_no = e.item_no join hiring_eligibility f on i.item_no = f.item_no join hiring_training t on i.item_no = t.item_no join hiring_work_exp w on i.item_no = w.item_no where p.date_of_publication = '$date' GROUP BY p.item_number";

    $result = mysqli_query($conn, $query);


    $fileName = "Publication- " . $date . ".xlsx"; //date('d/m/Y')

    //SELECT item_no, GROUP_CONCAT(DISTINCT add_com SEPARATOR ',') as competency FROM hiring_competency;

    // Start from second row
    $id = 1;
    $count = 20;
    $end_of_publication = "";

    while ($row = mysqli_fetch_object($result)) {

        $competency = str_replace(',', "\n", $row->competency);
        $education = str_replace(',', "\n", $row->education);
        $eligibility = str_replace(',', "\n", $row->eligibility);
        $training = str_replace(',', "\n", $row->training);
        $work = str_replace(',', "\n", $row->work);

        $monthly_salary = "P " . number_format($row->monthly_salary);

        $end_of_publication = $row->end_of_publication;

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
        ->setCellValue("E" . $count, $monthly_salary);

        $spreadsheet
            ->getSheet(0)
            ->setCellValue("F" . $count, $education);
        $spreadsheet->getActiveSheet()->getStyle("F" . $count)->getAlignment()->setWrapText(true);

        $spreadsheet
            ->getSheet(0)
            ->setCellValue("G" . $count, $training);
        $spreadsheet->getActiveSheet()->getStyle("G" . $count)->getAlignment()->setWrapText(true);

        $spreadsheet
            ->getSheet(0)
            ->setCellValue("H" . $count, $work);
        $spreadsheet->getActiveSheet()->getStyle("H" . $count)->getAlignment()->setWrapText(true);

        $spreadsheet
            ->getSheet(0)
            ->setCellValue("I" . $count, $eligibility);
        $spreadsheet->getActiveSheet()->getStyle("I" . $count)->getAlignment()->setWrapText(true);


        $spreadsheet
            ->getSheet(0)
            ->setCellValue("J" . $count, $competency);
        $spreadsheet->getActiveSheet()->getStyle("J" . $count)->getAlignment()->setWrapText(true);

        $spreadsheet
            ->getSheet(0)
            ->setCellValue("K" . $count, $row->description);
        $spreadsheet->getActiveSheet()->getStyle("K" . $count)->getAlignment()->setWrapText(true);

        $spreadsheet
            ->getSheet(0)
            ->setCellValue("L" . $count, $row->area_wrk_assign);

        // $spreadsheet->getActiveSheet()->setCellValue("L" . $count, "Hello\nWorld");

        $count++;
        $id++;
    }

        //STYLING

        $spreadsheet->getActiveSheet()
                ->getStyle("A20:L". $count)
                ->applyFromArray($all_borders);

    $newcount = $count + 2 ; 
//    $re =  "A" .$newcount.":D" .$newcount; 
//     echo "<pre>";
//     print_r($re);
//     exit;

    
    $spreadsheet->getActiveSheet()->mergeCells("A" .$newcount.":J" .$newcount);
    $spreadsheet->getActiveSheet()->setCellValue("A" .$newcount,   " Interested and QUALIFIED applicants should signify their interest in writing. Attach the following documents to the application letter and send to the address below not later than ");

    $spreadsheet->getActiveSheet()->mergeCells("K" .$newcount.":L" .$newcount);
    $spreadsheet->getActiveSheet()->setCellValue("K" .$newcount, $end_of_publication);
    $spreadsheet->getActiveSheet()
        ->getStyle("K" .$newcount.":L" .$newcount)
        ->applyFromArray($border_bottom);
    $spreadsheet->getActiveSheet()->getStyle("K" .$newcount.":L" .$newcount)->getAlignment()->setHorizontal('center');

    $newcount = $newcount + 2 ;

    $spreadsheet->getActiveSheet()->mergeCells("B" .$newcount.":L" .$newcount);
    $spreadsheet->getActiveSheet()->setCellValue("B" .$newcount,   " 1. Fully accomplished Personal Data Sheet (PDS) with recent passport-sized picture and attached detailed Job Description of Previous Work (CS Form No. 212, Revised 2017) which can be downloaded at www.csc.gov.ph;");

    $newcount ++ ;

    $spreadsheet->getActiveSheet()->mergeCells("B" .$newcount.":L" .$newcount);
    $spreadsheet->getActiveSheet()->setCellValue("B" .$newcount,   " 2. Performance rating in the last rating period (if applicable);");

    $newcount ++ ;

    $spreadsheet->getActiveSheet()->mergeCells("B" .$newcount.":L" .$newcount);
    $spreadsheet->getActiveSheet()->setCellValue("B" .$newcount,   " 3. Photocopy of  certificate of eligibility/rating/license; and");

    $newcount ++ ;

    $spreadsheet->getActiveSheet()->mergeCells("B" .$newcount.":L" .$newcount);
    $spreadsheet->getActiveSheet()->setCellValue("B" .$newcount,   " 4. Photocopy of  Transcript of Records. (OTR/ Diploma)");

    $newcount = $newcount + 2 ;

    $spreadsheet->getActiveSheet()->mergeCells("A" .$newcount.":L" .$newcount);
    $spreadsheet->getActiveSheet()->setCellValue("A" .$newcount,   "QUALIFIED APPLICANTS are advised to hand in or send through courier/email their application to:");

    $newcount = $newcount + 2 ;

    
    $spreadsheet->getActiveSheet()->setCellValue("B" .$newcount,   "(HRMO)");
    $spreadsheet->getActiveSheet()
        ->getStyle("B" .$newcount)
        ->applyFromArray($border_bottom);

    $newcount ++ ;

    
    $spreadsheet->getActiveSheet()->setCellValue("B" .$newcount,   "(Position Title)");
    $spreadsheet->getActiveSheet()
        ->getStyle("B" .$newcount)
        ->applyFromArray($border_bottom);

    $newcount ++ ;

    
    $spreadsheet->getActiveSheet()->setCellValue("B" .$newcount,   "(Complete Office Address)");
    $spreadsheet->getActiveSheet()
        ->getStyle("B" .$newcount)
        ->applyFromArray($border_bottom);

    $newcount ++ ;

    
    $spreadsheet->getActiveSheet()->setCellValue("B" .$newcount,   "(E-mail Address)");
    $spreadsheet->getActiveSheet()
        ->getStyle("B" .$newcount)
        ->applyFromArray($border_bottom);

    $newcount = $newcount + 3 ;

    $spreadsheet->getActiveSheet()->mergeCells("A" .$newcount.":F" .$newcount);
    $spreadsheet->getActiveSheet()->setCellValue("A" .$newcount,   "APPLICATIONS WITH INCOMPLETE DOCUMENTS SHALL NOT BE ENTERTAINED.");
    $spreadsheet->getActiveSheet()
        ->getStyle("A" .$newcount.":F" .$newcount)
        ->applyFromArray($bold);


    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment ; filename=' . $fileName);
    $writer->save('php://output');

?>