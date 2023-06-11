<?php
	require('config/config.php');
	require('config/db.php');

	// Check For filled form
	if(isset($_POST['add'])){
		// Get form data
        $duedate = $_POST['date_due'];
		$rent = mysqli_real_escape_string($conn, $_POST['rent']);
        $elc = mysqli_real_escape_string($conn, $_POST['electricity']);
        $water = mysqli_real_escape_string($conn, $_POST['water']);   
        $stat = $_POST['status'];

        

		$query = "INSERT INTO bills(date_due, rent, electricity, water,status) 
        VALUES('$duedate', '$rent', '$elc','$water','$stat')";

		if(mysqli_query($conn, $query)){
            header('Location: bills.php');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
?>


<?php include('inc/header.php'); ?>
<div class="container">
    <br/>
    <h2>Add bills</h2>
    <button type="button" class="btn btn-dark btn-sm" onclick="document.location='bills.php'">Back</button>
<br></br>
    <form method="POST" class="was-validated">
    
        <div class="form-group">
            <!--date-->
            
            <label for="date_due">Due date:</label>
            <input type="date" class="form-control" id="date_due" name="date_due">
            
        </div>
        <div class="form-group">
            <label for="rent">Rent:</label>
            <input type="text" class="form-control" id="rent" placeholder="Enter rent" name="rent">
        </div>

        <div class="form-group">
            <label for="electricity">Electricity:</label>
            <input type="text" class="form-control" id="electricity" placeholder="Enter electricity" name="electricity">
        </div>

        <div class="form-group">
            <label for="water">Water:</label>
            <input type="text" class="form-control" id="water" placeholder="Enter water" name="water">
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status">
                <option value="Paid">Paid</input><br/>
                <option value="Unpaid">Unpaid</input><br/>
            </select>
        </div>

       
    
        <button type="submit" name="add" value="add" class="btn btn-primary">Add</button>
    </form>
</div>
