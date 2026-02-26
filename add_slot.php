<?php
include("includes/db.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $slotNo = intval($_POST["slotNo"]);
    $isCovered = isset($_POST["isCovered"]) ? 1 : 0;
    $isEVCharging = isset($_POST["isEVCharging"]) ? 1 : 0;

    $checkQuery = "SELECT * FROM parking_slots WHERE slotNo = '$slotNo'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        $message = "Slot number already exists!";
    } else {
        $query = "INSERT INTO parking_slots (slotNo, isCovered, isEVCharging, isOccupied)
                  VALUES ('$slotNo', '$isCovered', '$isEVCharging', 0)";

        if (mysqli_query($conn, $query)) {
            $message = "Slot Added Successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Slot</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
<div class="container">
<h2>Add Parking Slot</h2>

<?php if($message != "") { ?>
    <p><?php echo $message; ?></p>
<?php } ?>

<form method="POST">

    Slot Number:
    <input type="number" name="slotNo" required>

    <br>

    Covered:
    <input type="checkbox" name="isCovered">

    <br><br>

    EV Charging:
    <input type="checkbox" name="isEVCharging">

    <br><br>

    <button type="submit">Add Slot</button>

</form>

</div>
</body>
</html>