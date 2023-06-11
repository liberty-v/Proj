<?php
	require('config/config.php');
	require('config/db.php');

	// Check For filled form
	if(isset($_POST['add'])){
		// Get form data
		$rn = mysqli_real_escape_string($conn, $_POST['room_number']);
        $mrent = mysqli_real_escape_string($conn, $_POST['monthly_rent']);
        $status = $_POST['availability'];
		
		$query = "INSERT INTO roomt(room_number, monthly_rent, availability)
        VALUES('$rn', '$mrent', '$status')";

		if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
?>


<?php include('inc/header.php'); ?>
<div class="container">
    <br/>
    <h2>Add room details</h2>
    
    <form method="POST" class="was-validated">
        <div class="form-group">
            <label for="room_number">Room num:</label>
            <input type="text" class="form-control" id="room_number" placeholder="Enter room name" name="room_number" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
       
        <div class="form-group">
            <label for="monthly_rent">Rent:</label>
            <input type="text" class="form-control" id="monthly_rent" placeholder="Enter rent" name="monthly_rent" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>

        <div class="form-group">
            <label for="availability">Status:</label>
            <select class="form-control" id="availability" name="availability">
                <option value="Available">Available</input><br/>
                <option value="Occupied">Occupied</input><br/>
                <option value="Under Maintenance">Under Maintenance</input><br/>
               
            </select>
        </div>

        <button type="submit" name="add" value="add" class="btn btn-primary">Add</button>
        <button type="button" class="btn btn-dark btn-sm" onclick="document.location='table.php'">Back</button>
    </form>
</div>
<?php include('inc/footer.php'); ?>