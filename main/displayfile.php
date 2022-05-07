
<!DOCTYPE html>
<html>
<body>


<form action="displayfile.php" method="post">
  <label for="files">Type of File to be Displayed:</label>
  <select name="Type" id="Type">
    <option value="html">HTML</option>
    <option value="php">PHP</option>
    
  </select>
  <br><br>
  <input name="submit" type="submit" value="submit">
</form>



</body>
</html>



<?php include "dbconfig.php";
if(isset($_POST["submit"])){
    
    $VALUE = $_POST['Type'];
    $sql = "SELECT id, file_name, file_type, file_path, uploaded_on FROM files where file_type='$VALUE'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>FILE NAME</th><th>TYPE</th><th>PATH</th><th>UPLOAD TIME</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["file_name"]. "</td><td>" . $row["file_type"]. "</td><td>" . $row["file_path"]. "</td><td>" . $row["uploaded_on"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";

    
}
}
else{


$sql = "SELECT id, file_name, file_type, file_path, uploaded_on FROM files";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>FILE NAME</th><th>TYPE</th><th>PATH</th><th>UPLOAD TIME</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["file_name"]. "</td><td>" . $row["file_type"]. "</td><td>" . $row["file_path"]. "</td><td>" . $row["uploaded_on"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
}

?>
<style>
table {
    font-family: arial, sans-serif;
    color: white;
    border-collapse: collapse;
    width: 100%;
    background-color:blue;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;

}

tr {
    background-color:  #660099;
}
</style>