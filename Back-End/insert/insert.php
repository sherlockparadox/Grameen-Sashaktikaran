<?php
session_start();
 $user = "root";
 $passkey = "";
 $db = "healthcloud";

   $conn = new mysqli("localhost",$user,$passkey,$db);
   if(! $conn ) { 
   
     die('Could not connect: ' . mysqli_error()); }

   if (isset($_POST['approve'])) {

     $value1 = $_POST['FIRST_NAME'];
     $value2 = $_POST['MIDDLE_NAME'];
     $value3 = $_POST['LAST_NAME'];
     $value4 = $_POST['GENDER'];
     $value5 = $_POST['DATE_OF_BIRTH'];
     $value6 = $_POST['PARENT_NAME'];
     $value7 = $_POST['MARITAL_STATUS'];
     $value8 = $_POST['SPOUSE_NAME'];
     $value9 = $_POST['NUMBER_OF_CHILDREN'];
     $value10 = $_POST['CONTACT_NUMBER'];
     $value11 = $_POST['PHONE_TYPE'];
     $value12 = $_POST['ALTERNATE_PHONE'];
     $value13 = $_POST['CITY'];
     $value14 = $_POST['STATE'];
     $value15 = $_POST['PERMANENT_ADDRESS'];
     $value16 = $_POST['EMAIL'];
     $value17 = $_POST['EDUCATION_DETAILS'];
     $value18 = $_POST['MI_NAME'];
     $value19 = $_POST['MI_PHONE'];
     $value20 = $_POST['MI_ADDRESS'];
     $value21 = $_POST['MI_HEIGHT'];
     $value22 = $_POST['MI_WEIGHT'];
     $value23 = $_POST['MI_BLOOD_GROUP'];
     $value24 = $_POST['MI_FAMILY_HEALTH_HISTORY'];
     $value25 = $_POST['MI_MEDICAL_HISTORY'];
     $value26 = $_POST['MI_ALLERGIES'];
     $value27 = $_POST['MI_SURGERIES'];
     $value28 = $_POST['MI_VACCINES'];
     $value29 = $_POST['MI_INSURANCE_PROVIDER'];
     $value30 = $_POST['MI_GROUP_NAME'];
     $value31 = $_POST['MI_II_ADDRESS'];
     $value32 = $_POST['MI_POLICY_NAME'];
     $value33 = $_POST['OCCUPATION'];
     $value34 = $_POST['COMPANY_NAME'];
     $value35 = $_POST['EMPLOYEE_ID'];
     $value36 = $_POST['WORKED_SINCE'];
     $value37 = $_POST['OFFICE_ADDRESS'];
     $value38 = $_POST['OFFICE_PHONE'];
     $value39 = $_POST['ANNUAL_INCOME'];
     $value40 = $_POST['PAN_NUMBER'];
     $value41 = $_POST['GOVERNMENT_SCHEMES_ENROLLED'];
     $value42 = $_POST['ACCOUNT_HOLDER_NAME'];
     $value43 = $_POST['ACCOUNT_NUMBER'];
     $value44 = $_POST['BANK_NAME'];
     $value45 = $_POST['IFSC_CODE'];
     $value46 = $_POST['BRANCH'];
     $value47 = $_POST['BANK_ADDRESS'];
     $value48 = $_POST['BANK_STATE'];
     $value49 = $_POST['BANK_DISTRICT'];
     $value50 = $_POST['BIOMETRIC_INPUT'];


     $sql = "INSERT INTO records (FIRST_NAME,MIDDLE_NAME,LAST_NAME,GENDER,DATE_OF_BIRTH,PARENT_NAME,MARITAL_STATUS,SPOUSE_NAME,NUMBER_OF_CHILDREN,CONTACT_NUMBER,PHONE_TYPE,ALTERNATE_PHONE,CITY,STATE,PERMANENT_ADDRESS,EMAIL,EDUCATION_DETAILS,MI_NAME,MI_PHONE,MI_ADDRESS,MI_HEIGHT,MI_WEIGHT,MI_BLOOD_GROUP,MI_FAMILY_HEALTH_HISTORY,MI_MEDICAL_HISTORY,MI_ALLERGIES,MI_SURGERIES,MI_VACCINES,MI_INSURANCE_PROVIDER,MI_GROUP_NAME,MI_II_ADDRESS,MI_POLICY_NAME,OCCUPATION,COMPANY_NAME,EMPLOYEE_ID,WORKED_SINCE,OFFICE_ADDRESS,OFFICE_PHONE,ANNUAL_INCOME,PAN_NUMBER,GOVERNMENT_SCHEMES_ENROLLED,ACCOUNT_HOLDER_NAME,ACCOUNT_NUMBER,BANK_NAME,IFSC_CODE,BRANCH,BANK_ADDRESS,BANK_STATE,BANK_DISTRICT,BIOMETRIC_INPUT) VALUES ('$value1', '$value2','$value3', '$value4', '$value5', '$value6','$value7', '$value8','$value9', '$value10', '$value11', '$value12','$value13', '$value14','$value15', '$value16', '$value17', '$value18','$value19', '$value20','$value21', '$value22', '$value23', '$value24', '$value25', '$value26','$value27', '$value28', '$value29', '$value30','$value31', '$value32','$value33', '$value34', '$value35', '$value36','$value37', '$value38','$value39', '$value40', '$value41', '$value42','$value43', '$value44','$value45', '$value46', '$value47', '$value48', '$value49', '$value50')";
       
    $retval1 = mysqli_query( $conn,$sql );

   	if(! $retval1 ) { 
      die('Could not post data: ' . mysqli_error()); 
    }  
   }
       
?>
