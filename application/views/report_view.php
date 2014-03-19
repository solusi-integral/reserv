<?php
header('X-RESERV-CODE: 200 OK');
?>
<html>
<head>
<title>Remote Reporting System</title>
</head>
<body>
<center><h1>Data Recorded</h1></center><br>
<b><?php echo $location ?></b> race number <b><?php echo $number ?></b> with result <b><?php echo $results ?></b> clicked by: <b><i><?php echo $name ?></i></b> has been recorded to the database.<br><br>
    Debug information: <?php echo $date ?> | <?php echo $jump_date ?> | <?php echo $type ?> | <?php echo $runners ?> | <?php echo $number ?> | <?php echo $location ?> | <?php echo $results ?> | <?php echo $name ?> | <?php echo $comment ?>
</body>
</html>