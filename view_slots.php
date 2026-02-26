<?php
include("includes/db.php");

$query = "SELECT * FROM parking_slots ORDER BY slotNo ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Slots</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <?php include("includes/navbar.php"); ?>
<div class="container">
<h2>All Parking Slots</h2>

<table border="1" width="100%" cellpadding="8">
    <tr>
        <th>Slot No</th>
        <th>Covered</th>
        <th>EV Charging</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['slotNo']; ?></td>

<td><?php echo $row['isCovered'] ? "Yes" : "No"; ?></td>

<td><?php echo $row['isEVCharging'] ? "Yes" : "No"; ?></td>

<td><?php echo $row['isOccupied'] ? "Occupied" : "Available"; ?></td>

<td>
<?php if($row['isOccupied']) { ?>
    <a href="remove_vehicle.php?slot=<?php echo $row['slotNo']; ?>">Remove</a>
<?php } else { ?>
    -
<?php } ?>
</td>
    </tr>
<?php } ?>

</table>

<br>
<a href="add_slot.php">Add New Slot</a>

</div>
</body>
</html>