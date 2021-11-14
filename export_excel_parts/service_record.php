<?php 

    $emp_id =  $_GET["service_record"];
    

    // main changes
    $spreadsheet->getActiveSheet()->mergeCells("A1:J1");
    $spreadsheet->getActiveSheet()->setCellValue("A1", "LUIS HORA MEMORIAL REGIONAL HOSPITAL");

    $spreadsheet->getActiveSheet()->mergeCells("A2:J2");
    $spreadsheet->getActiveSheet()->setCellValue("A2", "Abatan, Bauko, Mountain Province, 2621");

    $spreadsheet->getActiveSheet()->mergeCells("A4:J4");
    $spreadsheet->getActiveSheet()->setCellValue("A4", "SERVICE RECORD");

    $spreadsheet->getActiveSheet()->setCellValue("A6", "Name : ");

    $spreadsheet->getActiveSheet()->mergeCells("B6:C6");
    $spreadsheet->getActiveSheet()->setCellValue("B6", "DOMINGO,   TIM   DENIS"); //NAME

    $spreadsheet->getActiveSheet()->setCellValue("F6", "Maiden name : ");
    $spreadsheet->getActiveSheet()->setCellValue("G6", "N/A"); //MAIDEN

    $spreadsheet->getActiveSheet()->setCellValue("A7", "Birthdate : ");

    $spreadsheet->getActiveSheet()->mergeCells("B7:C7");
    $spreadsheet->getActiveSheet()->setCellValue("B7", "01/14/1996"); //DOB

    $spreadsheet->getActiveSheet()->setCellValue("F7", "Birth Place : ");

    $spreadsheet->getActiveSheet()->mergeCells("G7:I7");
    $spreadsheet->getActiveSheet()->setCellValue("G7", 'TADIAN, MOUNTAIN  PROVINCE');//BIRTH PLACE

    $spreadsheet->getActiveSheet()->mergeCells("A9:J9");
    $spreadsheet->getActiveSheet()->setCellValue("A9", "This is to certify that  the  employee  named  herein  above  actually  rendered  service in this office  as  shown  by  the  service  record  below  each  line  of  which  is  supported by  appointments  and  other  papers  actually   issued  by  this  office  and  approved by the authorities  concerned.");

    $spreadsheet->getActiveSheet()->mergeCells("A11:B11");
    $spreadsheet->getActiveSheet()->setCellValue("A11", "Service Inclusive Dates:");

    $spreadsheet->getActiveSheet()->mergeCells("C11:F11");
    $spreadsheet->getActiveSheet()->setCellValue("C11", "Record of Appointment");

    $spreadsheet->getActiveSheet()->mergeCells("G11:H11");
    $spreadsheet->getActiveSheet()->setCellValue("G11", "Office Entity/Division");

    $spreadsheet->getActiveSheet()->mergeCells("I11:I12");
    $spreadsheet->getActiveSheet()->setCellValue("I11", "L/V ABS w/o Pay");

    $spreadsheet->getActiveSheet()->setCellValue("J11", "Separation");
    $spreadsheet->getActiveSheet()->setCellValue("A12", "From");
    $spreadsheet->getActiveSheet()->setCellValue("B12", "To");
    $spreadsheet->getActiveSheet()->setCellValue("C12", "Designation");
    $spreadsheet->getActiveSheet()->setCellValue("D12", "Status");
    $spreadsheet->getActiveSheet()->setCellValue("E12", "Monthly Salary");
    $spreadsheet->getActiveSheet()->setCellValue("F12", "Salary");
    $spreadsheet->getActiveSheet()->setCellValue("G12", "Station/Place of Assignment");
    $spreadsheet->getActiveSheet()->setCellValue("H12", "Branch");
    $spreadsheet->getActiveSheet()->setCellValue("J12", "Date/Cause");

  
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

    
$font_style_1 = array(
    'font'  => array(
        'bold'  => true,
        'size'  => 16,
        'name'  => 'Cambria'
    ));

    $font_style_2 = array(
        'font'  => array(
            'bold'  => true,
            'size'  => 12,
            'name'  => 'Cambria'
        ));

        $font_style_3 = array(
            'font'  => array(
                'bold'  => true,
                'size'  => 18,
                'name'  => 'Cambria'
            ));

            $font_style_4 = array(
                'font'  => array(
                    'size'  => 12,
                    'name'  => 'Arial Narrow'
                ));

                $font_style_5 = array(
                    'font'  => array(
                        'size'  => 11,
                        'name'  => 'Times New Roman'
                    ));

                    $font_style_6 = array(
                        'font'  => array(
                            'bold'  => true,
                            'size'  => 16,
                            'name'  => 'Cambria'
                        ));

    $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');

    $spreadsheet->getActiveSheet()->getStyle('A:J')->getAlignment()->setVertical('center');

    $spreadsheet->getActiveSheet()->getStyle('A1:J4')->getAlignment()->setHorizontal('center');

    $spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(25);
    $spreadsheet->getActiveSheet()->getRowDimension('2')->setRowHeight(25);
    $spreadsheet->getActiveSheet()->getRowDimension('4')->setRowHeight(30);
    $spreadsheet->getActiveSheet()->getRowDimension('9')->setRowHeight(30);
    $spreadsheet->getActiveSheet()->getRowDimension('12')->setRowHeight(30);
    $spreadsheet->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
    $spreadsheet->getActiveSheet()->getRowDimension('7')->setRowHeight(30);


    $spreadsheet->getActiveSheet()->getStyle("A9")->getAlignment()->setWrapText(true);
    $spreadsheet->getActiveSheet()->getStyle('A9:J9')->getAlignment()->setHorizontal('center');

  
    
        $spreadsheet->getActiveSheet()
        ->getStyle("A1:J8")
        ->applyFromArray($bold);

        $spreadsheet->getActiveSheet()
        ->getStyle("A11:J12")
        ->applyFromArray($bold);

        $spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($font_style_1);
        $spreadsheet->getActiveSheet()->getStyle('A2')->applyFromArray($font_style_2);
        $spreadsheet->getActiveSheet()->getStyle('A4')->applyFromArray($font_style_6);
        $spreadsheet->getActiveSheet()->getStyle('A6:I7')->applyFromArray($font_style_4);


    //SET AUTOSIZE FOR ALL COLUMNS 
    foreach (range('A', 'L') as $columnID) {
        $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
            ->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getStyle($columnID)
            ->getAlignment()->setWrapText(true);
    }

    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth('10');

    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth('10');

    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth('12');

    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth('15');

    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth('15');

    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth('20');

    $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth('10');

    $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth('15');

    $fileName = "Service-record- " . $emp_id . ".xlsx"; //date('d/m/Y')

    $query = "Select * from emp_work_experience where emp_id = '$emp_id'";

    $result = mysqli_query($conn, $query);


   
    $count = 13;
   

    while ($row = mysqli_fetch_object($result)) {


        $monthly_salary = "P " . number_format($row->work_monthly_sal);
       
        $salary = "P " . number_format( ($row->work_monthly_sal)*12);
        
        $branch = "NATIONAL";

       
        $spreadsheet
            ->getSheet(0)
            ->setCellValue("A" . $count, $row->work_from_date);

        $spreadsheet
            ->getSheet(0)
            ->setCellValue("B" . $count, $row->work_to_date);

        $spreadsheet
            ->getSheet(0)
            ->setCellValue("C" . $count,  $row->work_position);

        $spreadsheet
            ->getSheet(0)
            ->setCellValue("D" . $count, $row->work_status);

           

        $spreadsheet
        ->getSheet(0)
        ->setCellValue("E" . $count, $monthly_salary);

        $spreadsheet
            ->getSheet(0)
            ->setCellValue("F" . $count, $salary);
        

        $spreadsheet
            ->getSheet(0)
            ->setCellValue("G" . $count, $row->work_employer);
      

        $spreadsheet
            ->getSheet(0)
            ->setCellValue("H" . $count, $branch);


        $spreadsheet
            ->getSheet(0)
            ->setCellValue("I" . $count, "");
        

        $spreadsheet
            ->getSheet(0)
            ->setCellValue("J" . $count, "");
      
            

        $count++;
        
    
    }

        $spreadsheet->getActiveSheet()
                ->getStyle("A11:J". $count)
                ->applyFromArray($all_borders);

                $spreadsheet->getActiveSheet()->getStyle('A11:J'. $count)->getAlignment()->setHorizontal('center');

                $spreadsheet->getActiveSheet()->getStyle('A13:J'. $count)->applyFromArray($font_style_4);

    $newcount = $count + 2 ; 


    
    $spreadsheet->getActiveSheet()->mergeCells("A" .$newcount.":J" .$newcount);
    $spreadsheet->getActiveSheet()->setCellValue("A" .$newcount,   " Issued in compliance with Executive Order No. 54 dated August 10, 1954 and in accordance with, Circular No. 58 dated August 10, 1954 of the System. ");


    $newcount = $newcount + 2 ;

    $spreadsheet->getActiveSheet()->mergeCells("G" .$newcount.":H" .$newcount);
    $spreadsheet->getActiveSheet()->setCellValue("G" .$newcount,   "CERTIFIED CORRECT:");

    $newcount = $newcount + 2 ;

    $spreadsheet->getActiveSheet()->getStyle("G" .$newcount.":J" .$newcount)->getAlignment()->setHorizontal('center');

    $spreadsheet->getActiveSheet()->mergeCells("G" .$newcount.":J" .$newcount);
    $spreadsheet->getActiveSheet()->getStyle("G" .$newcount.":J" .$newcount)->applyFromArray($bold);
    $spreadsheet->getActiveSheet()->setCellValue("G" .$newcount,   "PAMELA C. PAKIPAC, RND, MPA");

    $newcount ++ ;

    $spreadsheet->getActiveSheet()->getStyle("G" .$newcount.":J" .$newcount)->getAlignment()->setHorizontal('center');

    $spreadsheet->getActiveSheet()->mergeCells("G" .$newcount.":J" .$newcount);
    $spreadsheet->getActiveSheet()->setCellValue("G" .$newcount,   "Administrative Officer V");

    $newcount ++ ;

    $spreadsheet->getActiveSheet()->getStyle("G" .$newcount.":J" .$newcount)->getAlignment()->setHorizontal('center');

    $spreadsheet->getActiveSheet()->mergeCells("G" .$newcount.":J" .$newcount);
    $spreadsheet->getActiveSheet()->setCellValue("G" .$newcount,   "Head, Human Resource Management Office");

    $newcount ++ ;

    $spreadsheet->getActiveSheet()->setCellValue("A" .$newcount, "Date:");
    $spreadsheet->getActiveSheet()->setCellValue("B" .$newcount,  date('m / d / y')); //date
    
    $spreadsheet->getActiveSheet()->getStyle("A" .$newcount , "J" .$newcount)->applyFromArray($font_style_5);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment ; filename=' . $fileName);
    $writer->save('php://output');

?>