<?php
$title = "Details";
$body = " id='body_places'";
include("includes/db_connect.inc");
include("includes/header.inc");
include("includes/nav.inc");
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
echo "<div class='container mb-0'>
    <div class='row'>
      <div class='col-sm-6 pt-5' >
            <img  src='images/{$row['image']}' alt='sandridgerailwaytrail.jpg' width='400' height='250'>
        </div>
        <div class='col-sm-6 pt-5'>
        <p class='Paraphraph4'>{$row['activityname']}</p>
        <p class='Paraphraph1'>{$row['description']}</p>
  </div>
  <div class='col-sm-1 '>
            <p> <img src='images/{$row['category']}.png' alt='image' width='45' height='45'> </p>
            </div>
            <div class='col-sm-1'>
            <p><img src='images/money.png' alt='image' ></p>
            </div>
            <div class='col-sm-1'>
            <p><img src='images/location.png' alt='image' > </p>
            </div>
            <div class='col-sm-1'>
            <p>  <img src='images/more.png' alt='image' >  </p>
            </div>
            <div class='col-sm-8'></div>
            <div class='col-sm-1'>
            <p> {$row['category']}   </p>  
            </div>
            <div class='col-sm-1'>
            <p>";
              if ($row["price"] <= 0) {
                echo "Free";
              } else {
                echo "$ {$row['price']}";
              }
echo "</p>  
            </div>
              <div class='col-sm-1'>
            <p> {$row['location']}   </p>  
            </div>
            <div class='col-sm-1'>
            <p> explore more  </p>  
            </div>
            <div class='col-sm-8'></div>   
            ";
            ?>
            <?php if (isset($_SESSION['username'])) {
  echo " <div class='col-sm-1'>
            <p><a class='btn btn-primary' href='update_form.php?id={$row['activityid']}'>Update</a></p>
            </div>
            <div class='col-sm-1'>
            <p><a class='btn btn-danger' href='delete_confirm.php?id={$row['activityid']}'>Delete</a></p>
            </div>
            
"; 
          } echo" </div> </div>";
             }
             }
              }  ?> 

<?php
include('includes/footer.inc');
?>
