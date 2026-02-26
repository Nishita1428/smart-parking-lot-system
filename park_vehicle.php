<?php
include("includes/db.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $needsCover = isset($_POST["needsCover"]) ? 1 : 0;
    $needsEV = isset($_POST["needsEV"]) ? 1 : 0;

    // Build dynamic query
    $query = "SELECT * FROM parking_slots 
              WHERE isOccupied = 0";

    if ($needsCover) {
        $query .= " AND isCovered = 1";
    }

    if ($needsEV) {
        $query .= " AND isEVCharging = 1";
    }

    $query .= " ORDER BY slotNo ASC LIMIT 1";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

        $slot = mysqli_fetch_assoc($result);
        $slotId = $slot['id'];

        // Update slot to occupied
        $update = "UPDATE parking_slots SET isOccupied = 1 WHERE id = $slotId";
        // mysqli_query($conn, $update);

        if(mysqli_query($conn, $update)){
    $message = "Vehicle parked in Slot No: " . $slot['slotNo'];
} else {
    $message = "Error while updating slot!";
}



        $message = "Vehicle parked in Slot No: " . $slot['slotNo'];

    } else {
        $message = "No Slot Available!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Park Vehicle</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <?php include("includes/navbar.php"); ?>

<div class="container">
    <div class="card">
<h2>Park Vehicle</h2>

<?php if($message != "") { ?>
    <p><?php echo $message; ?></p>
<?php } ?>

<form method="POST">

    Needs Covered:
    <input type="checkbox" name="needsCover">

    <br><br>

    Needs EV Charging:
    <input type="checkbox" name="needsEV">

    <br><br>

    <button type="submit">Park Vehicle</button>

</form>

<br>
<a href="view_slots.php">View Slots</a>
</div>
</div>
</body>
</html>