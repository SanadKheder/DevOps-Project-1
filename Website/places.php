<?php
$title = "places";
$body = " id='body_places'";
include("includes/db_connect.inc");
include("includes/header.inc");
include("includes/nav.inc");
?>
<h1 class="mt-4">Discover Victoria your own way!</h1>
<p class="Paraphraph">This website is built to collect the many activities Victoria has to offer. We know everybody has its own style and favourite way to discover our beautiful state. And there
  are many! So we made it a bit easier for you. You can explore. share and modify activities and different ways to discover the state of Victoria on this website.</p>
<div class="container-fluid mb-0">
  <div class="row">
    <div class="col-sm-3  ms-5">
      <img class="img-fluid ms-4"  src="images/sandridgerailwaytrail.jpg" alt="sandridgerailwaytrail.jpg">
    </div>
    <div class="col-sm-8 ms-4">
      <table class="table table-striped">
        <thead class="thead1 bg-dark  text-light">
          <tr>
            <td>Name</td>
            <td>Location</td>
            <td>Price</td>
            <td>Transport</td>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "select activityid, activityname, image, caption,location,category,price from tourismvictoria";
          $records = $conn->query($sql);
          foreach ($records as $row) {
echo"<tr>
    <td> <a class='nav-link'  href='details.php?id={$row['activityid']}'> {$row['activityname']}</a></td>
    <td>{$row['location']}</td>
    <td>";
            if ($row["price"] <= 0) { echo "Free"; } 
            else { echo "$ {$row['price']}"; }
echo"</td>
      <td>{$row['category']}</td>
      </tr>
                ";} ?>
        </tbody>
      </table>
    </div>
  </div>
  </div>

  <?php
  include('includes/footer.inc');
  ?>