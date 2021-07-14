

  `emp_id` varchar(255) ,

  -- `emp_office_assign` varchar(20),
  -- 
  -- `emp_office_dept` varchar(100) ,
  -- `emp_salary` varchar(100) ,
`emp_image` varchar(100) ,

  `emp_first_name` varchar(45),
  `emp_middle_name` varchar(45),
 `emp_last_name` varchar(45),
  `emp_ext` varchar(45),
  `emp_dob` date,
  `emp_gender` varchar(10),
  `emp_civil_status` varchar(45) ,
  `emp_height` int(10),
  `emp_weight` int(10),
  `emp_blood` varchar(5),
  `emp_citizen` varchar(100),
  `emp_nationality` varchar(50),
  `emp_resi_add` varchar(100),
   `emp_resi_add_street` varchar(100) ,
 `emp_resi_add_municipal` varchar(100) ,
  `emp_resi_add_barangay` varchar(100) ,
  `emp_resi_add_zipcode` varchar(100) ,
   `emp_per_add` varchar(100),
  `emp_per_add_street` varchar(100) ,
  `emp_per_add_municipal` varchar(100) ,
  `emp_per_add_barangay` varchar(100) ,
  `emp_per_add_zipcode` varchar(100) ,
  `emp_tel_no` varchar(100) ,
  `emp_mb_no` varchar(100) ,
  `emp_email` varchar(100),
  `emp_contact_gs` int(100) ,
  `emp_contact_pag` int(100) ,
  `emp_contact_ph` int(100) ,
  `emp_contact_ss` int(100) ,
  `emp_contact_tin` int(100) ,
  `emp_contact_agency` int(100) ,
--   family-background
 `emp_spouse_lastname` varchar(100) ,
  `emp_spouse_firstname` varchar(100) ,
  `emp_spouse_middlename` varchar(100) ,
  `emp_spouse_extname` varchar(100) ,
  `emp_sp_occupation` varchar(20) ,
  `emp_sp_employer` varchar(20) ,
  `emp_sp_add` varchar(50) ,
  `emp_sp_tel` int(20) ,
  `emp_child_name` varchar(50) ,
  `emp_child_dob` varchar(100) ,
  `emp_father_lastname` varchar(100) ,
  `emp_father_firstname` varchar(100) ,
  `emp_father_middlename` varchar(100) ,
  `emp_father_extname` varchar(100) ,
  `emp_mother_lastname` varchar(100) ,
  `emp_mother_firstname` varchar(100) ,
  `emp_mother_middlename` varchar(100) ,
  `emp_mother_extname` varchar(100) ,
--   education
  `ele_school_name` varchar(100) ,
  `ele_degree` varchar(100) ,
  `ele_from_date` date ,
  `ele_to_date` date ,
  `ele_units` int(100) ,
  `ele_award` varchar(100) ,
  `ele_graduation` varchar(50) ,
  `sec_school_name` varchar(100) ,
  `sec_degree` varchar(100) ,
  `sec_from_date` date ,
  `sec_to_date` date ,
  `sec_units` int(100) ,
  `sec_award` varchar(100) ,
  `sec_graduation` int(50) ,
  `voc_school_name` varchar(100) ,
  `voc_degree` varchar(100) ,
  `voc_from_date` date ,
  `voc_to_date` date ,
  `voc_units` int(100) ,
  `voc_award` varchar(100) ,
  `voc_graduation` int(50) ,
  `coll_school_name` varchar(100) ,
  `coll_degree` varchar(100) ,
  `coll_from_date` date ,
  `coll_to_date` date ,
  `coll_units` int(100) ,
  `coll_award` varchar(100) ,
  `coll_graduation` int(50) ,
  `gra_school_name` varchar(100) ,
  `gra_degree` varchar(100) ,
  `gra_from_date` date ,
  `gra_to_date` date ,
  `gra_units` int(100) ,
  `gra_award` varchar(100) ,
  `gra_graduation` int(50) ,
--   civil
 `civil_exam_type` varchar(50) ,
  `civil_exam_name` varchar(50) ,
  `civil_exam_rating` int(10) ,
  `civil_exam_date` date ,
  `civil_exam_place` varchar(50) ,
  `civil_exam_licence_no` int(50) ,
  `civil_exam_licence_val` date ,

--   work experience
  `work_to_date` date ,
  `work_from_date` date ,
  `work_position` varchar(50) ,
  `work_employer` varchar(50) ,
  `work_govt_service` varchar(10) ,
  `work_monthly_sal` int(100) ,
  `work_increment` int(50) ,
  `work_status` varchar(20) ,

--   voluntary work
  `vol_name_org` varchar(50) ,
  `vol_org_add` varchar(50) ,
  `vol_from_date` date ,
  `vol_to_date` date NOT NULL,
  `vol_no_of_hrs` int(10) ,
  `vol_position` varchar(50) ,

--   learning
`title_of_training` varchar(50) ,
  `training_type_of_position` varchar(50) ,
  `training_no_of_hrs` int(10) ,
  `training_from_date` date ,
  `training_to_date` date NOT NULL,
  `training_conducted_by` varchar(50) ,
  
-- skills
`emp_special_skills` varchar(100) ,
  `emp_non_academic` varchar(100) ,
  `emp_membership` varchar(50) ,

--   other
  `condition_1` varchar(10) ,
  `condition_2` varchar(10) ,
  `condition_2_des` varchar(100) ,
  `condition_3` varchar(10) ,
  `condition_3_des` varchar(100) ,

  `condition_4` varchar(10) ,
  `condition_4_des` varchar(100) ,
   `condition_4_date` date ,
    `condition_4_status` varchar(100) ,

  `condition_5` varchar(10) ,
  `condition_5_des` varchar(100) ,

  `condition_6` varchar(10) ,
  `condition_6_des` varchar(100) ,

  `condition_7` varchar(10) ,
  `condition_7_des` varchar(100) ,

  `condition_8` varchar(10) ,
  `condition_8_des` varchar(100) ,
  `condition_9` varchar(10) ,
  `condition_9_des` varchar(100) ,
  `condition_10` varchar(10) ,
  `condition_10_des` varchar(100) ,
  `condition_11` varchar(10) ,
  `condition_11_des` varchar(100) ,
  `condition_12` varchar(10) ,
  `condition_12_des` varchar(100) ,

--   references

  `ref_full_name` varchar(50) ,
  `ref_add` varchar(50) ,
  `ref_tel` varchar(100) ,
  `emp_gov_issued_id` varchar ,
  `emp_gov_issued_id_type` varchar(100) ,

-- from add employee modal 

--  emploeyee job modal

`job_type` varchar(100) ,
 `item_no` varchar(100) ,
  `position` varchar(100) ,
   `salary_grade` varchar(100) ,
    `date_created` date ,
    --  `applicant` varchar(100) ,
      `department` varchar(100) ,
       `unit` varchar(100) ,
       `nature` varchar(100) ,
 `designation` varchar(100) ,
  `date_of_effectivity` date ,
  `type` varchar(100) ,
  `date_of_expiry` date ,

-- item table

`nature` varchar(100) ,
`item_no` varchar(100) ,
`position` varchar(100) ,
`salary_grade` varchar(100) ,
`date_created` varchar(100) ,
`filled` varchar(100) , 
-- filled 0 == unfilled item 

-- applicant table
`item_no` varchar(100) ,
`assigned` varchar(100) , 
`applicant_id` varchar(100) ,
`applicant_rating` varchar(100) ,
`applicant_rank` varchar(100) ,
`applicant_first_name` varchar(100) ,
`applicant_last_name` varchar(100) ,
`applicant_middle_name` varchar(100) ,
`applicant_ext` varchar(100) ,
`applicant_gender` varchar(100) ,
`applicant_country` varchar(100) ,
`applicant_state` varchar(100) ,
`applicant_municipal` varchar(100) ,
`applicant_zip` varchar(100) ,

-- hiring education ,
`item_no` varchar(100)/  `position_no` varchar(100), `applicant_id` varchar(100),
`hiring_education` varchar(100) ,

-- hiring work experience ,
`item_no` varchar(100)/  `position_no` varchar(100), `applicant_id` varchar(100),
`hiring_work_exp` varchar(100) ,


-- hiring training ,
`item_no` varchar(100)/  `position_no` varchar(100), `applicant_id` varchar(100),
`hiring_training` varchar(100) ,

-- hiring training ,
`item_no` varchar(100)/  `position_no` varchar(100), `applicant_id` varchar(100),
`hiring_eligibility` varchar(100) ,

-- one table for filled and unfilled  (item), if filled == 0 , its filled item . 
-- only filled item can have employee 
-- item table
-- applicant table will have item no ,  if assigned == 1 , its in  a filled item . 

-- two tables item and applicant table 

-- performance table
`emp_id` varchar(100) ,
`excel_file_type` varchar(100) ,
`year` varchar(100) ,
`rating_period` varchar(100) ,
`rating` varchar(100) ,
`excel_file_name` varchar(100) ,

-- emp files
`emp_id` varchar(100) ,
`file_folder` varchar(100) ,
`file_name` varchar(100) ,
`file_type` varchar(100) ,
`file_size` varchar(100) ,
`file_date` varchar(100) ,
