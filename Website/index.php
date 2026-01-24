<?php
$title = "Index";
$body = "";
include("includes/db_connect.inc");
include("includes/header.inc");
include("includes/nav.inc");
?>
<div class="container mt-4">
  <div class="row">
    <div class="col-sm-6">
      <!-- Carousel -->
      <div id="demo" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators/dots -->
        <div class="carousel-indicators ">
          <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
        </div>
        <!-- The slideshow/carousel -->
        <div class="carousel-inner pb-4 px-5 ">
          <?php
          $sql = "select activityid, activityname, image, caption from tourismvictoria
          order by activityid DESC
          LIMIT 4";
          $records = $conn->query($sql);
          $active = "active";
          foreach ($records as $row) {
            echo "
 <div class='carousel-item $active px-3'>
  <img src='images/{$row['image']}'  alt='flamingos taking off on water'>
    </div>  ";
            $active = "";
          } ?>
        </div>
        <!-- Left and right controls/icons -->

        <button class="carousel-control-prev  " type="button" data-bs-target="#demo" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
    <div class="col-sm-6 mt-5 ">
      <p class="h2 color-green"> DISCOVER VICTORIA</p>
      <p class="h3">YOUR OWN WAY</p>
    </div>
  </div>
</div>

<div class="container-fluid  pb-5 pt-5  bg-white">
  <div class="row mt-4">
    <div class="col-sm-7">
      <div class="input-group">
        
        <input  class="form-control rounded" placeholder="I am lokking for ..." >
      </div>
    </div>
    <div class="col-sm-3">
      <select class="form-select mr-5">
        <option> Select your favourite way!</option>
        <option> 22 </option>
      </select>
    </div>
    <div class="col-sm-2">
      <button type="button" class="btn buttoncolor">search</button>
    </div>
  </div>
  <div class="Div_P ">
    <h1 >Victoria has a lot to offer!</h1>
    <p class="Paraphraph">And what better way to discover Victoria ... your own way. Whether it is during a lovely hike, a train ride or by bike, we are convinced that Victoria has it all.
      Are you ready to explore?</p>
  </div>
</div>

<?php
include('includes/footer.inc');
?>


