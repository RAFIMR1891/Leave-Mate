<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = $_POST['name'];
    $rollno = $_POST['rollno'];
    $year = $_POST['year'];
    $department = $_POST['department'];
    $section = $_POST['section'];
    $from_date = $_POST['from'];
    $to_date = $_POST['to'];
    $reason = $_POST['reason'];
    $studentphone = $_POST['studentphone'];
    $parentphone = $_POST['parentphone'];
    $coordinator_number = $_POST['contact'];

    
    $message = "Leave request from $name (Roll No: $rollno, Year: $year, Dept: $department, Section: $section) for the period from $from_date to $to_date. Reason: $reason. Student contact: $studentphone";

    
    $fields = array(
        "message" => $message,
        "language" => "english",
        "route" => "q",
        "numbers" => $coordinator_number,  
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($fields),
      CURLOPT_HTTPHEADER => array(
        "authorization: ABtQZPrka4TDOdM09CKqFJ7lWm6eNIGHREb25w8hpzujV1fngvxZnYI0eW4qUBaEH2XjFk5pAMyRsiPz", 
        "accept: */*",
        "cache-control: no-cache",
        "content-type: application/json"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "Error occurred: " . $err;

    } else {
        echo "SMS sent successfully!";
    }
}
?>
