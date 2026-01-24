<?php
$body= " id='body_places'";
$title = "Register";
include("includes/db_connect.inc");
include('includes/header.inc');
include('includes/nav.inc');
?>
<div>
    <form class=" px-5" action="process_register.php" method="post">
        <div class="mb-3 mt-3">
        <h1 class=" px-1"><?= $title ?></h1>
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control w-50">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control w-50">
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Register">
        </div>
    </form>
</div>
<?php
include('includes/footer.inc');
?>