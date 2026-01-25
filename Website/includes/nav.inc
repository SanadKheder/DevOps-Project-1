<?php
$pageName = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg  navbar-dark  navbar1 ">

    <img class="px-2" src="images/Visit-Victoria-Logo.png" alt="flamingos taking off on water">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">

        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
                <a class="nav-link <?php if ($pageName == "index.php") echo "active"; ?>" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($pageName == "places.php") echo "active"; ?>" href="places.php">List of Places</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($pageName == "gallery.php") echo "active"; ?>" href="gallery.php">Gallery</a>
            </li>

            <?php if (isset($_SESSION['username'])) { ?>
                <li class="nav-item">
                    <a class="nav-link <?php if ($pageName == "add.php") echo "active"; ?>" href="add.php">Add more</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($pageName == "logout.php") echo "active"; ?>" href="logout.php">Logout</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link <?php if ($pageName == "register.php") echo "active"; ?>" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($pageName == "login.php") echo "active"; ?>" href="login.php">Login</a>
                </li>
            <?php } ?>

        </ul>


        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">

        </form>
        <img src="images/seach.png" class="icone" alt="images/seach.png" width='30' height='25'>
    </div>

</nav>

<?php
if (isset($_SESSION['usrmsg'])) { ?>
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Success!</strong>
        <?php print $_SESSION['usrmsg'];
        unset($_SESSION['usrmsg']); ?>
    </div>
<?php } ?>

<?php
if (isset($_SESSION['err'])) { ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Error!</strong>
        <?php print $_SESSION['err'];
        unset($_SESSION['err']); ?>
    </div>
<?php } ?>