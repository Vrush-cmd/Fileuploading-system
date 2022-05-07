<?php
// Include the database configuration file
include 'dbConfig.php';
$statusMsg = '';
function random_strings($length_of_string)
{
  
    
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
  
    
    return substr(str_shuffle($str_result), 
                       0, $length_of_string);
}

// File upload path
$targetDir = "FILESSSS/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$file_id = random_strings(15);




if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    
    // Allow certain file formats
    $allowTypes = array('html','php');
    if(in_array($fileType, $allowTypes)){

        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert file name into database
            $insert = $db->query("INSERT into files (file_id,file_name,file_type,file_path,uploaded_on) VALUES ('".$file_id."','".$fileName."','".$fileType."','".$targetFilePath."', NOW())");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only HTML & PHP files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>
<?php include "displayfile.php"; ?>

