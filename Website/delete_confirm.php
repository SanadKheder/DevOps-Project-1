<?php
require_once('includes/db_connect.inc');
$title = "Delete Confirmation";
$body = " id='body_places'";
include('includes/header.inc');
include('includes/nav.inc');
echo"<h1 class= 'mt-5'> Are you sure you want to delete this record? </h1>";
if (!empty($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "select * from tourismvictoria where activityid=?";
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    exit("prepare failed: " . $conn->error);
  }
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $records = $stmt->get_result();
  if ($records->num_rows > 0) {
    foreach ($records as $row) {
      echo "<div class='responsive mt-5  mb-5'>
      <div class='gallery'>
      <a href='details.php?id={$row['activityid']}'> <img  src='images/{$row['image']}' alt='{$row['caption']}'  class='img_size'   > </a>
      <p><a href='details.php?id={$row['activityid']}'></a></p>
      <div class='desc'>{$row['activityname']}</div>
      </div>  <div class='d-grid gap-2 col-12 mt-3 '> ";
      
      echo "<a class =' text-white btn btn-info' href='details.php?id={$row['activityid']}'>Cancel</a>";
      // encode url to make html valid
      $imagename = urldecode("images/{$row['image']}");
      echo "<a class ='btn btn-danger' href='delete.php?id={$row['activityid']}'>Delete</a>
      </div> </div>  
      
      ";
    }
  }
}
include('includes/footer.inc');
