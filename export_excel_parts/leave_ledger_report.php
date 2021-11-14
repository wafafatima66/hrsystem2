<?php 

    $emp_id =  $_GET["leave_ledger_report"];
    
  
    // main changes
    $spreadsheet->getActiveSheet()->mergeCells("A1:K1");
    $spreadsheet->getActiveSheet()->setCellValue("A1", "Republic of the Philippines");

    $spreadsheet->getActiveSheet()->mergeCells("A2:K2");
    $spreadsheet->getActiveSheet()->setCellValue("A2", "Department of Health");

    $spreadsheet->getActiveSheet()->mergeCells("A3:K3");
    $spreadsheet->getActiveSheet()->setCellValue("A3", "Cordillera Administrative Region");

    $spreadsheet->getActiveSheet()->mergeCells("A4:K4");
    $spreadsheet->getActiveSheet()->setCellValue("A4", "LUIS HORA MEMORIAL REGIONAL HOSPITAL");

    $spreadsheet->getActiveSheet()->mergeCells("A5:K5");
    $spreadsheet->getActiveSheet()->setCellValue("A5", 'Abatan, Bauko, Mountain Province');
        
    $spreadsheet->getActiveSheet()->mergeCells("A7:K7");
    $spreadsheet->getActiveSheet()->setCellValue("A7", "LEAVE CREDIT CARD");

  
    $spreadsheet->getActiveSheet()->setCellValue("A9", "NAME :");
    $spreadsheet->getActiveSheet()->setCellValue("A10", "POSITION:");
    $spreadsheet->getActiveSheet()->setCellValue("A11", "STATUS:");
    $spreadsheet->getActiveSheet()->setCellValue("A12", "ETD:");

   

    $spreadsheet->getActiveSheet()->setCellValue("B9", "Jestoni C. Boaging");
    $spreadsheet->getActiveSheet()->setCellValue("B10", "Administrative   Aide IV (Engineering Aide)");
    $spreadsheet->getActiveSheet()->setCellValue("B11", "Permanent");
    $spreadsheet->getActiveSheet()->setCellValue("B12", "March 2, 2020");

  

    $spreadsheet->getActiveSheet()->mergeCells("C14:E14");
    $spreadsheet->getActiveSheet()->setCellValue("C14", "V A C A T I O N");

    $spreadsheet->getActiveSheet()->mergeCells("G14:I14");
    $spreadsheet->getActiveSheet()->setCellValue("G14", "S I C K");

    $spreadsheet->getActiveSheet()->mergeCells("A14:A17");
    $spreadsheet->getActiveSheet()->setCellValue("A14", "PERIOD");

    $spreadsheet->getActiveSheet()->mergeCells("B14:B17");
    $spreadsheet->getActiveSheet()->setCellValue("B14", "PARTICULARS");

    $spreadsheet->getActiveSheet()->mergeCells("C15:C17");
    $spreadsheet->getActiveSheet()->setCellValue("C15", "EARNED");

    $spreadsheet->getActiveSheet()->mergeCells("D15:D17");
    $spreadsheet->getActiveSheet()->setCellValue("D15", "ABS. UND. W/ PAY");
 

    $spreadsheet->getActiveSheet()->mergeCells("E15:E17");
    $spreadsheet->getActiveSheet()->setCellValue("E15", "BALANCE");

    $spreadsheet->getActiveSheet()->mergeCells("F15:F17");
    $spreadsheet->getActiveSheet()->setCellValue("F15", "ABS. UND. WOP");
    // $spreadsheet->getActiveSheet()->setCellValue("F16", "");
    // $spreadsheet->getActiveSheet()->setCellValue("F17", "");

    $spreadsheet->getActiveSheet()->mergeCells("G15:G17");
    $spreadsheet->getActiveSheet()->setCellValue("G15", "EARNED");

    $spreadsheet->getActiveSheet()->mergeCells("H15:H17");
    $spreadsheet->getActiveSheet()->setCellValue("H15", "ABS. UND. W/ PAY");
   

    $spreadsheet->getActiveSheet()->mergeCells("I15:I17");
    $spreadsheet->getActiveSheet()->setCellValue("I15", "BALANCE");

    $spreadsheet->getActiveSheet()->mergeCells("J15:J17");
    $spreadsheet->getActiveSheet()->setCellValue("J15", "ABS. UND. WOP");


    $spreadsheet->getActiveSheet()->mergeCells("K14:K17");
    $spreadsheet->getActiveSheet()->setCellValue("K14", "REMARKS");

   
  
    $spreadsheet->getActiveSheet()->setCellValue("A20", "Vac. Leave");
    $spreadsheet->getActiveSheet()->setCellValue("B20", "20.198");
    $spreadsheet->getActiveSheet()->setCellValue("A21", "Sick Leave");
    $spreadsheet->getActiveSheet()->setCellValue("B21", "20.198");
    $spreadsheet->getActiveSheet()->setCellValue("A22", "Total");
    $spreadsheet->getActiveSheet()->setCellValue("B22", "40.234");

    $spreadsheet->getActiveSheet()->mergeCells("E20:H20");
    $spreadsheet->getActiveSheet()->setCellValue("E20", "TERMINAL LEAVE BENEFIT=");

    $spreadsheet->getActiveSheet()->mergeCells("F21:H21");
    $spreadsheet->getActiveSheet()->setCellValue("F21", "BASIC SALARY X");

    $spreadsheet->getActiveSheet()->mergeCells("E22:H22");
    $spreadsheet->getActiveSheet()->setCellValue("E22", "CONSTANT FACTOR X");

    $spreadsheet->getActiveSheet()->mergeCells("I20:J20");
    $spreadsheet->getActiveSheet()->setCellValue("I20", "48.369");

    $spreadsheet->getActiveSheet()->mergeCells("I21:J21");
    $spreadsheet->getActiveSheet()->setCellValue("I21", "14,400.00");

    $spreadsheet->getActiveSheet()->mergeCells("I22:J22");
    $spreadsheet->getActiveSheet()->setCellValue("I22", "0.048965");

    $spreadsheet->getActiveSheet()->mergeCells("I23:J23");
    $spreadsheet->getActiveSheet()->setCellValue("I23", "33,599.36");
   
    $spreadsheet->getActiveSheet()->setCellValue("A26", "Prepared  by:");

    $spreadsheet->getActiveSheet()->mergeCells("A28:B28");
    $spreadsheet->getActiveSheet()->setCellValue("A28", "JONA S. BAGLAO");

    $spreadsheet->getActiveSheet()->mergeCells("A29:B29");
    $spreadsheet->getActiveSheet()->setCellValue("A29", "Administrative Assistant II");

    $spreadsheet->getActiveSheet()->setCellValue("A31", "Certified by:");

    $spreadsheet->getActiveSheet()->mergeCells("A34:C34");
    $spreadsheet->getActiveSheet()->setCellValue("A34", "PAMELA C. PAKIPAC, RND, MPA");

    $spreadsheet->getActiveSheet()->mergeCells("A35:C35");
    $spreadsheet->getActiveSheet()->setCellValue("A35", "Administrative Officer V");

    $spreadsheet->getActiveSheet()->mergeCells("A36:C36");
    $spreadsheet->getActiveSheet()->setCellValue("A36", "Head, Human Resource Management Office");

    // $array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    //         $j=18;
    //         for ($i = 0; $i < 12; $i++) {
    //             $spreadsheet->getActiveSheet()->setCellValue("A".$j, $array[$i]);
    //             $j++ ;
    //         }
         
    //STYLING

    $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');

    $font_style_1 = array(
        'font'  => array(
            'bold'  => false,
            'size'  => 10,
            'name'  => 'Century Gothic'
        ));

        $spreadsheet->getActiveSheet()->getStyle("A1:K5")->applyFromArray($font_style_1);

        $bold = [
            'font' => [
                'bold' => true,
            ]
        ];
    
        $spreadsheet->getActiveSheet()
            ->getStyle("A7:K7")
            ->applyFromArray($bold);
    
        $spreadsheet->getActiveSheet()->getStyle('A1:K7')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A1:K7')->getAlignment()->setHorizontal('center');

    $border_bottom = [
        'borders' => [
            'bottom' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ]
    ];

    $spreadsheet->getActiveSheet()->getStyle("B21")->applyFromArray($border_bottom);
    $spreadsheet->getActiveSheet()->getStyle("I22:J22")->applyFromArray($border_bottom);

    $all_borders = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ];

    $spreadsheet->getActiveSheet()->getStyle("A14:K17")->applyFromArray($all_borders);

    $spreadsheet->getActiveSheet()->getStyle("B20:B22")->applyFromArray($bold);
    $spreadsheet->getActiveSheet()->getStyle("I20:J23")->applyFromArray($bold);
    $spreadsheet->getActiveSheet()->getStyle('A20:A22')->getAlignment()->setHorizontal('center');
    $spreadsheet->getActiveSheet()->getStyle('B20:B22')->getAlignment()->setHorizontal('right');
    $spreadsheet->getActiveSheet()->getStyle('E20:H22')->getAlignment()->setHorizontal('right');
    $spreadsheet->getActiveSheet()->getStyle('I20:J23')->getAlignment()->setHorizontal('right');

    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth('20');
    $spreadsheet->getActiveSheet()->getStyle("B9:B12")->applyFromArray($bold);

    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth('18');

    $spreadsheet->getActiveSheet()->getStyle('A14:K17')->getAlignment()->setVertical('center');
    $spreadsheet->getActiveSheet()->getStyle('A14:K17')->getAlignment()->setHorizontal('center');

    $spreadsheet->getActiveSheet()->getStyle("A14:K17")->applyFromArray($font_style_1);

    $spreadsheet->getActiveSheet()->getStyle("A14:K17")->getAlignment()->setWrapText(true);

    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth('15');

    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth('7');

    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth('7');

    $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth('7');

    $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(false);
    $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth('7');

    $spreadsheet->getActiveSheet()->getStyle("A28:B28")->applyFromArray($bold);
    $spreadsheet->getActiveSheet()->getStyle("A34:B34")->applyFromArray($bold);

    $spreadsheet->getActiveSheet()->getStyle('A28:B29')->getAlignment()->setHorizontal('center');
    $spreadsheet->getActiveSheet()->getStyle('A34:C36')->getAlignment()->setHorizontal('center');

    $fileName = "Leave-ledger- " . $emp_id . ".xlsx"; //date('d/m/Y')

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment ; filename=' . $fileName);
    $writer->save('php://output');

?>