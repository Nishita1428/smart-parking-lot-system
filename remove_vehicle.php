<?php
include("includes/db.php");

if(isset($_GET['slot'])){
    $slotNo = intval($_GET['slot']);

    $update = "UPDATE parking_slots SET isOccupied = 0 WHERE slotNo = $slotNo";
    mysqli_query($conn, $update);

    header("Location: view_slots.php");
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $slotNo = intval($_POST["slotNo"]);

    // Check if slot exists and is occupied
    $checkQuery = "SELECT * FROM parking_slots 
                   WHERE slotNo = $slotNo AND isOccupied = 1";

    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {

        $update = "UPDATE parking_slots 
                   SET isOccupied = 0 
                   WHERE slotNo = $slotNo";

        mysqli_query($conn, $update);

        $message = "Vehicle removed from Slot No: " . $slotNo;

    } else {
        $message = "Invalid Slot Number or Slot Already Empty!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Remove Vehicle</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <?php include("includes/navbar.php"); ?>

<div class="container">
    <div class="card">
<h2>Remove Vehicle</h2>

<?php if($message != "") { ?>
    <p><?php echo $message; ?></p>
<?php } ?>

<form method="POST">

    Enter Slot Number:
    <input type="number" name="slotNo" required>

    <br><br>

    <button type="submit">Remove Vehicle</button>

</form>

<br>
<a href="view_slots.php">View Slots</a>
</div>
</div>
</body>
</html>