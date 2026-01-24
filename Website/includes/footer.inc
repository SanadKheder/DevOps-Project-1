</header>
<footer>
<div>
<img class="px-2" src="images/Footer_back.png" alt="flamingos taking off on water" width='45' height='30'>
  </div>
    <?php
          $sql = "select username from tourismvictoria
          group by username";
          $records = $conn->query($sql);
          foreach ($records as $row) {
            echo "<a class='nav-link second'   href='user.php?username={$row['username']}'> {$row['username']} </a>
        "; }?>
<div>
    <p class="second"> &copy; Copyrigh s3869994. AllRights Reserved | Designed for</p>
    <p class="forth"> Tourism Victoria</p>
</div>
</footer>
</body>
</html>