<?php
	require('config/config.php');
	require('config/db.php');

	// Check For filled form
	if(isset($_POST['add'])){
		// Get form data
		$firstname = mysqli_real_escape_string($conn, $_POST['first_name']);
		$lastname = mysqli_real_escape_string($conn, $_POST['last_name']);
		$cnumber = mysqli_real_escape_string($conn, $_POST['contact']);
        $rnum = $_POST['room_number'];

		$query = "INSERT INTO boarders(first_name, last_name, contact_number, room_number) 
        VALUES('$firstname', '$lastname', '$cnumber', '$rnum')";

		if(mysqli_query($conn, $query)){
            header('Location: table.php');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
?>


<?php include('inc/header.php'); ?>
<div class="container">
    <br/>
    <h2>Add a boarder</h2>
    
    <form method="POST" class="was-validated">
        <div class="form-group">
            <label for="first_name">First name:</label>
            <input type="text" class="form-control" id="first_name" placeholder="Enter first name" name="first_name" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <label for="last_name">Last name:</label>
            <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <label for="contact">Contact Number:</label>
            <input type="text" class="form-control" id="contact" placeholder="Enter phone number" name="contact" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>

        <div class="form-group">
            <label for="room_number">Room Number:</label>
            <select class="form-control" id="room_number" name="room_number" required>
                <option value="D1">D1</input><br/>
                <option value="D2">D2</input><br/>
                <option value="U1">U1</input><br/>
                <option value="U2">U2</input><br/>
            </select>
        </div>
    
        <button type="submit" name="add" value="add" class="btn btn-primary">Add</button>
        <button type="button" class="btn btn-dark btn-sm" onclick="document.location='table.php'">Back</button>
    </form>
</div>
<?php include('inc/footer.php'); ?>