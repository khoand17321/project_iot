<!DOCTYPE html>
<html>

<head>
  <title>Users</title>
  <link rel="stylesheet" type="text/css" href="css/Users.css">
</head>

<body>
  <?php include 'header.php'; ?>
  <main>
    <section>
      <!-- User table -->
      <h1 class="slideInDown animated">Here are all the Users</h1>
      <div class="tbl-header slideInRight animated">
        <table cellpadding="0" cellspacing="0" border="0">
          <thead>
            <tr>
              <th>ID | Name</th>
              <th>Serial Number</th>
              <th>Gender</th>
              <th>Finger ID</th>
              <th>Date</th>
              <th>Time In</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tbl-content slideInRight animated">
        <table cellpadding="0" cellspacing="0" border="0">
          <tbody>
            <?php
            // Connect to database
            require 'connectDB.php';

            $sql = "SELECT * FROM users WHERE NOT username='' ORDER BY id DESC";
            $result = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($result, $sql)) {
              echo '<p class="error">SQL Error</p>';
            } else {
              mysqli_stmt_execute($result);
              $resultl = mysqli_stmt_get_result($result);

              if (mysqli_num_rows($resultl) > 0) {
                while ($row = mysqli_fetch_assoc($resultl)) {
            ?>
                  <tr>
                    <td><?= $row['id'] ?> | <?= $row['username'] ?></td>
                    <td><?= $row['serialnumber'] ?></td>
                    <td><?= $row['gender'] ?></td>
                    <td><?= $row['fingerprint_id'] ?></td>
                    <td><?= $row['user_date'] ?></td>
                    <td><?= $row['time_in'] ?></td>
                  </tr>
            <?php
                }
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </section>
  </main>
  <?php include 'footer.php'; ?>
</body>

</html>
