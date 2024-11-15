<?php 
    require '../Models/StudentViewDB.php';
    session_start();

 if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header("Location: ../Views/Login.php");
    exit();
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin | View</title>
    <link rel="stylesheet" href="css/Feedback.css">
    <script src=""></script>
</head>
<body>
    <form  method="POST" novalidate>
   <h2>Tutor Information</h2> 
   <table border="1">
        <tr>
            <th>Tutor Name</th>
            <th>Gender</th>
            <th>Institution</th>
            <th>Readable Subject's</th>
            <th>Location</th>
            <th>Require Salary</th>
            <th>Contact Number</th>
            <th>Action</th>
        </tr>
        <?php if (!empty($userData)): ?>
            <?php foreach ($userData as $user): ?>
                <tr>
                <td><?= $user['Full_Name'] ?></td>
                <td><?= $user['Gender'] ?></td>
                <td><?= $user['Institution'] ?></td>
                <td><?= $user['Subject'] ?></td>
                <td><?= $user['Location'] ?></td>
                <td><?= $user['Salary'] ?></td>
                <td><?= $user['Contact_Number'] ?></td>
                <td>
                    <a href="../Controllers/AdminTAction.php?user_id=<?= $user['ID']; ?>">Delete</a>
                </td>
                </tr>

            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No data available</td>
            </tr>
        <?php endif; ?>
    </table>
        </form>
</body>
</html>
