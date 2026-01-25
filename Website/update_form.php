<?php
require_once('includes/db_connect.inc');
$title = "Update Form";
$body = " id='body_places'";
include('includes/header.inc');
include('includes/nav.inc');
?>
  <h1 class="mt-4">Edit activity</h1>
  <div class=" px-5">
  <?php
if (isset($_SESSION['username'])) {
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
        foreach ($records as $row) {
?>
            <form class="px-5 main-form" method="post" action="update.php" enctype="multipart/form-data">

                <input type="hidden" name="activityid" value="<?php echo $row['activityid'] ?>">

                <label for="activityname">Activity Name:</label>
                <input type="text" name="activityname" id="activityname" value="<?php echo $row['activityname'] ?>"><br>

                <label for="description">Description:</label>
                <input type="text" name="description" id="description" value="<?php echo $row['description'] ?>"><br>

                <label for="image">Select an image:</label>
                <input type="file" name="image" id="image"><span><?php echo $row['image'] ?> </span> <br>

                <label for="caption"> Image Caption: </label>
                <input type="text" name="caption" id="caption" value="<?php echo $row['caption'] ?>"><br>

                <label for="link">Intertesting link:</label>
                <input type="text" name="link" id="link" value="<?php echo $row['link'] ?>"><br>

                <label for="price">Price:</label>
                <input type="text" name="price" id="price" value="<?php echo $row['price'] ?>"><br>

                <label for="location">Location: </label>
                <input type="text" name="location" id="location" value="<?php echo $row['location'] ?>"><br>

                <label for="category">Category: </label><br>
                <select id="category" name="category">
                    <option value="<?php echo $row['category'] ?>"><?php echo $row['category'] ?></option>
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
    <?php
        }}
    include('includes/footer.inc');
    ?>
<?php }  ?>