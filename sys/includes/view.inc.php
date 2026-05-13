<?php 

session_start();

if(
    !isset($_POST['csrf_token']) ||
    $_POST['csrf_token'] !== $_SESSION['csrf_token']
){
    die("CSRF validation failed");
}

if (isset($_POST['update_view'])) {
include "../classes/dbc.classes.php"; 

  // Grabing the data
  $ti_id = $_POST['ti_id'];
  $det = $_POST['det'];


}


$update_stat = new Connection();

$st = $update_stat->openConnection()->prepare("UPDATE tickets,tasks
SET tickets.t_status = 2, tasks.t_st = 2
WHERE tickets.id = :id AND tasks.t_id = :id");

$st->bindParam(':id', $ti_id, PDO::PARAM_INT);
$st->execute();

// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = time() . "_" . basename($_FILES["photo"]["name"]);
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("../upload/" . $filename)){
                echo htmlspecialchars($filename ,ENT_QUOTES,'UTF-8') . " is already exists.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "../upload/" . $filename);
                echo "Your file was uploaded successfully.";
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}

$path = "//localhost/itsm/sys/upload/" . $filename;

$stmt = $update_stat->openConnection()->prepare("insert into reports values(Null,:t_id,:det,:path)");
  $stmt->execute(array(
    ':t_id' => $ti_id,
    ':det' => $det,
    ':path' => $path    
));



header("Location:../staff/tasks.php?completed");



 ?>
