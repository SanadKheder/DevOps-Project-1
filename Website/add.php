<?php
$title = "Add";
$body = " id='body_places'";
include("includes/db_connect.inc");
include("includes/header.inc");
include("includes/nav.inc");
if (isset($_SESSION['username'])) {
  function validateInput($str)
  {
    $ret = trim($str);
    return $ret;
  }
  if (isset($_POST['activityname'])) {
    $activityname = validateInput($_POST['activityname']);
    $description = validateInput($_POST['description']);
    $caption = validateInput($_POST['caption']);
    $price = validateInput($_POST['price']);
    $category = validateInput($_POST['category']);
    $location = validateInput($_POST['location']);
    $link = validateInput($_POST['link']);
    $image =  $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];
    $username = validateInput($_SESSION['username']);
    $sql = "INSERT INTO tourismvictoria (activityname, description, caption, price, category, location, link, image,username) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
      exit("An error occurred");
    }
    $stmt->bind_param("sssssssss", $activityname, $description, $caption,  $price, $category, $location,  $link,  $image, $username);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
      move_uploaded_file(
        $_FILES['image']['tmp_name'],
        'images/' . $_FILES['image']['name']
      );
      echo "A new record has been created";
    }
  }
?>
  <h1 class="mt-4">Sharing is caring</h1>
  <p class="Paraphraph">There are infinite ways to discover Victoria! So this website's job is never done. We would love to see this project grow with more adventures everyday. And we count on
    you: adventureres, explorers and discoverers Of Victoria!</p>
<div class=" px-5">
  <form class="px-5" action="add.php" method="post" enctype="multipart/form-data">

    <label for="activityname">Activity Name:<span class="red-star">*</span></label>
    <input type="text" name="activityname" id="activityname" placeholder="Provid a name for the activity" required><br>

    <label for="description">Description:<span class="red-star">*</span></label>
    <input type="text" name="description" id="description" placeholder="Decribe the activity briefly" required><br>

    <label for="image">Select an image: <span class="red-star">*</span></label>
    <input type="file" name="image" id="image" required><span class="red-star">max image size: 500px</span> <br>

    <label for="caption"> Image Caption: <span class="red-star">*</span></label>
    <input type="text" name="caption" id="caption" placeholder="Describe the image in word" required><br>

    <label for="link">Intertesting link:<span class="red-star">*</span></label>
    <input type="text" name="link" id="link" placeholder="An interesting website with more info" required><br>

    <label for="price">Price:<span class="red-star">*</span></label>
    <input type="text" name="price" id="price" placeholder="$0,00" required><br>

    <label for="location">Location: <span class="red-star">*</span></label>
    <input type="text" name="location" id="location" placeholder="Start location" required><br>

    <label for="category">Category: <span class="red-star">*</span></label><br>
    <select id="category" name="category" required>
      <option value="">--Choose an option--</option>
      <option value="train">Train</option>
      <option value="bike">bike</option>
      <option value="boat">Boat</option>
      <option value="car">Car</option>
      <option value="walk">walk</option>
    </select>
    <div class="d-flex justify-content-center">
    <button class="border-0 bg-transparent" ><img  src="images/button_S.png" alt="Image" width="120" height="50"></button>
    <button class="border-0 bg-transparent"><img src="images/button.png" alt="Image" width="120" height="50"></button>
    </div>
  </form>
</div>

<?php }  ?>

  <?php
  include('includes/footer.inc');
  ?>

