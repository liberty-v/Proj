<?php
 require('config/config.php');
 require('config/db.php');

 $result= $conn->query("SELECT * FROM maintenance"); 
 $query = 'SELECT * FROM maintenance';
 $result = mysqli_query($conn, $query);
 $main = mysqli_fetch_all($result, MYSQLI_ASSOC);
 mysqli_free_result($result);
 mysqli_close($conn)
?>

<?php include('inc/header.php'); ?> 
	<div class="container">
    </br> 
    <h2>Maintenance Details</h2>
    
    <button type="button" class="btn btn-dark btn-sm" onclick="document.location='room.php'">Back</button>
    <br></br>
    <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col"> </th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    
                    </tr>
                </thead>
                
			<div class="well">
                <tbody>
                <?php foreach($main as $maininfo) : ?>
                    <tr>
                    <th scope="row"></th>
                    
                    <td><?php echo $maininfo['issue_desc'];?></td>
                    <td><?php echo $maininfo['status'];?></td>
                   
                    </tr>
                <?php endforeach; ?>   
                </tbody>
            </div>