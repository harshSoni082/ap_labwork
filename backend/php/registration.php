<html>

<?php

function process_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$fname = $lname = $fathernme = $dob = $gender = $email = $mob = $add = $pin = $state = $extra = "";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $server_add = process_data($_SERVER["SERVER_ADDR"]);
    $server_name = process_data($_SERVER["SERVER_NAME"]);
    $host = process_data($_SERVER["HTTP_HOST"]);
    $fname =  process_data($_POST["fname"]);
    $lname = process_data($_POST["lname"]);
    $fathernme =  process_data($_POST["fathernme"]);
    $dob = process_data($_POST["bday"]);
    $gender =  process_data($_POST["gender"]);
    $email =  process_data($_POST["email"]);
    $mob = process_data($_POST["tel"]);
    $add =  process_data($_POST["address"]);
    $pin = process_data($_POST["pincode"]);
    $state =  process_data($_POST["state"]);
    $extra =  process_data($_POST["textarea"]);

    $server_json =  json_encode(array("server_address"=>$server_add,
                                      "server_name"=>$server_name,
                                      "host"=>$host),
                                      JSON_PRETTY_PRINT);

    $data_json = json_encode(array("first_name"=>$fname,
                                   "last_name"=>$lname,
                                   "fathernme"=>$fathernme,
                                   "dob"=>$dob,
                                   "gender"=>$gender,
                                   "email"=>$email, 
                                   "tel"=>$mob,
                                   "address"=>$add,
                                   "pincode"=>$pin,
                                   "state"=>$state,
                                   "extra"=>$extra), 
                                   JSON_PRETTY_PRINT);
    // save_as_json($data_json);
    print("<h2>Server Information JSON</h2>");
    print($server_json);

    print("<h2>Request JSON</h2>");
    print($data_json);
}
?>

</html>