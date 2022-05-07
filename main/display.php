<?php
// Include the database configuration file
include 'dbConfig.php';

// Get images from the database
$query = $db->query("SELECT * FROM files ORDER BY uploaded_on DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $fileURL = 'FILESSSS/'.$row["file_name"];
?>
    <img src="<?php echo $fileURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>NO FILES FOUND...</p>
<?php } ?>

