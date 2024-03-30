 <?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = htmlspecialchars($_POST["Name"]);
    $qualification = htmlspecialchars($_POST["qualification"]);
    $previousSchID = htmlspecialchars($_POST["id"]);
    $contact = htmlspecialchars($_POST["contact"]);


}
echo"$name"."$qualification.".".$previousSchID.".".$contact.";

echo "registered susscessfully";

//conecting database connection
$host = "localhost";
$user = "root";
$pass = "";
$dbn = "registeredstudents";

$conn = new mysqli($host, $user, $pass, $dbn);
if ($conn->connect_error) {
    die("not connected". $conn->connect_error);
 }
 $sql = "INSERT INTO students_registered (
    Sname,qualifications,prevSchID,contact
 )
  VALUES($name,$qualification,$previousSchID,$contact)"; 

  
$id = "SELECT currentID FROM students_registered WHERE Sname = '$name'";
$resultSelect = $conn->query($id);

$resultSelect = $conn->query($id);

if (!$resultSelect) {
    echo "Error executing the query: " . $conn->error;
} else {
    $row = $resultSelect->fetch_assoc();
    if ($row) {
        echo "Your ID is " . $row["currentID"];
    } else {
        echo "No matching record found for the given name.";
    }
}


 