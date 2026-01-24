<?php
$title = "Update Confirmation";
$body = " id='body_places'";
include('includes/header.inc');
include('includes/nav.inc');
require_once('includes/db_connect.inc');
if (isset($_SESSION['username'])) {
	echo "<div id='message'>";
	$error = false;
	if (!empty($_POST['activityid'])) {

		foreach ($_POST as $key => $val) {
			$$key = trim($val);
		}
		$image = $_FILES['image']['name'];
		$temp = $_FILES['image']['tmp_name'];

		$sql = "select * from tourismvictoria where activityid=?";
		$stmt = $conn->prepare($sql);
		if (!$stmt) {
			exit("prepare failed: " . $conn->error);
		}
		$stmt->bind_param("i", $activityid);
		$stmt->execute();
		$records = $stmt->get_result();
		if ($records->num_rows > 0) {
			foreach ($records as $row) {
				$activityname = $row['activityname'];
				$oldimage = $row['image'];
			}
		}
		if (empty($image)) {
			$image = $oldimage;
		}
		$sql = "UPDATE tourismvictoria SET activityname=? , description=?, image=?, caption=? ,link=? , price=?, location=?, category=? WHERE activityid=?";

		$stmt = $conn->prepare($sql);

		if (!$stmt) {
			exit("prepare failed: " . $conn->error);
		}

		$stmt->bind_param(
			"ssssisssi",
			$activityname,
			$description,
			$image,
			$caption,
			$link,
			$price,
			$location,
			$category,
			$activityid
		);
		$stmt->execute();
		if ($stmt->affected_rows > 0) {
			echo "<p>Record $activityname updated<p>";

			if ($oldimage != $image) {
				//Delete old image
				if (file_exists('images/' . $oldimage)) {
					unlink('images/' . $oldimage);
				}
				//Upload new one
				if (move_uploaded_file($temp, 'images/' . $image)) {
					echo "Image moved to folder";
				} else {
					echo "Image not moved to folder";
				}
			}
		} else {
			$error = true;
		}
	} else {
		$error = true;
	}
	if ($error) {
		echo "<p>Record NOT updated<p>";
	}

	echo "</div>";


	include('includes/footer.inc');
?>
<?php }  ?>
