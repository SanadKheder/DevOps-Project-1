<?php
$title = "Gallery";
$body= " id='body_places'";
include("includes/db_connect.inc");
include("includes/header.inc");
include("includes/nav.inc");
?>
<script src="main.js"></script>
  <h1 class="mt-4">Victoria has a lot to offer!</h1>
<p class="Paraphraph">And what better way to discover Victoria ... your own way. Whether it is during a lovely hike, a train ride or by bike, we are convinced that Victoria has it all.
  Are you ready to explore?</p>


  <h1>
    <?php
     if (!empty($_GET['category'])) { 
    echo" {$_GET['category']}";}?>
     Collection
    </h1>

    <div class="Paraphraph">
  <select class="Selection" id="menu" onchange=doMenu();>
                <option >Select categories</option>
                <option value="gallery.php">All categories</option>
                <option value="gallery.php?category=train">train</option>
                <option value="gallery.php?category=walk">walk</option>
                <option value="gallery.php?category=bike">bike</option>
                <option value="gallery.php?category=boat">boat</option>
                <option value="gallery.php?category=car">car</option>
            </select>    

     </div>
 <?php
 if (!empty($_GET['category'])) {
  $category = $_GET['category'];
  $sql = "select * from tourismvictoria where category=?";
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    exit("prepare failed: " . $conn->error);
   }
  $stmt->bind_param("s", $category);
  $stmt->execute();
  $records = $stmt->get_result();
  if ($records->num_rows > 0) {
    foreach ($records as $row) {
      echo "<div class='responsive mt-5  mb-5'>
      <div class='gallery'>
      <a href='details.php?id={$row['activityid']}'> <img  src='images/{$row['image']}' alt='{$row['caption']}'  class='img_size'   > </a>
      <p><a href='details.php?id={$row['activityid']}'></a></p>
      <div class='desc'>{$row['activityname']}</div>
      </div>  </div>      
  "; }}}

else{
  $sql = "select activityid, activityname, image, caption from tourismvictoria";
  $records = $conn->query($sql);
  foreach ($records as $row) {
    echo "<div class='responsive mt-5  mb-5'>
  <div class='gallery'>
  <a href='details.php?id={$row['activityid']}'> <img  src='images/{$row['image']}' alt='{$row['caption']}'  class='img_size'   > </a>
  <p><a href='details.php?id={$row['activityid']}'></a></p>
  <div class='desc'>{$row['activityname']}</div>
  </div>  </div>  ";}}?>



<?php
include('includes/footer.inc');
?>
