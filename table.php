<?php
    require('config/config.php');
    require('config/db.php');

    // $result= $conn->query("SELECT * FROM boarders"); .
    $query = 'SELECT * FROM boarders';
    $result = mysqli_query($conn, $query);
    $boarders = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result); 

?>

<link rel="stylesheet" href="css/style.css">

<?php include('inc/header.php'); ?>
	<div class="container">
    <br/>
		<h2> Boarders </h2> 
        <button type="button" class="btn btn-info btn-sm" onclick="document.location='add.php'">+</button>  
        <button type="button" class="btn btn-dark btn-sm" onclick="document.location='room.php'">Room</button>
    
        <br></br>
        <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Room Number</th>
                    <th scope="col"> Bills </th>
                    <th scope="col"> Actions </th>
                    
                    </tr>
                </thead>
		
			<div class="well">
                <tbody>
                <?php foreach($boarders as $boarder) : ?>
                    <tr>
                    <th scope="row">
                    
                        <?php echo $boarder['id'];?></th>
                    <td><?php echo $boarder['first_name'];?></td>
                    <td><?php echo $boarder['last_name'];?></td>
                    <td><?php echo $boarder['contact_number'];?></td>
                    <td><?php echo $boarder['room_number'];?></td>
                    <td><button type="button" class="btn btn-dark btn-sm" onclick="document.location='bills.php'">Bills</button></td>
                    <!--start of update-->
                    <td>
                        <form method="POST">
                            <button class="btn btn-dark btn-sm" id="button" name="update">Update</button>
                            <input type="hidden" value="<?php echo $boarder['id'];?>" name="id">
                            <input type="submit" value="remove" class="btn btn-danger btn-sm" name="remove" onclick="remove()"> 
                        </form>  
                    </td>
                                     
                    </tr>
                <?php endforeach; ?>   
                </tbody>
            </div>

        </table>
        <br/>

            <button type="button" class="btn btn-dark btn-sm" onclick="document.location='login.php'">Logout</button>
</div>
    
    <?php    
    // update button
    if(!isset($_POST['update'])) {
        ?> <style> .form-popup { display: none; } </style> <?php
    }
    else {
        $id = $_POST['id'];
        $sql = "SELECT * FROM boarders WHERE id = $id";
        $resultUpdate = mysqli_query($conn, $sql);
        $rowUpdate = mysqli_fetch_assoc($resultUpdate);

        ?> <style> .form-popup { display: block; } </style> <?php
    }
    ?>               
    <!-- update form pop-up -->
    <div class="form-popup" id="updatebutton">
        <form class="form-container" method="POST">
            <table>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Contact Number</th>
                </tr>
                <tr>    
                    <td>
                        <?php echo $rowUpdate['id'];?>
                        <input type="hidden" value="<?php echo $rowUpdate['id'];?>" name="uid">
                    </td>
                    <td><input type="text" class="form-control" value="<?php echo $rowUpdate['first_name'];?>" name="first_name" autocomplete="off"></td>
                    <td><input type="text" class="form-control" value="<?php echo $rowUpdate['contact_number'];?>" name="contact_number" autocomplete="off"></td>
                </tr>
                <tr>
                    <th></th>
                    <th>Last Name</th>
                    <th>Room Number</th>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="text" class="form-control" value="<?php echo $rowUpdate['last_name'];?>" name="last_name" autocomplete="off"></td>
                    <td><select class="form-control" value="<?php echo $rowUpdate['room_number'];?>" name="room_number" autocomplete="off">
                    <option value="D1">D1</input><br/>
                    <option value="D2">D2</input><br/>
                    <option value="U1">U1</input><br/>
                    <option value="U2">U2</input><br/>
                    </td></select>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button onclick="closeForm()" class="btn btn-success btn-sm" name="save" id="s-but">Save</button></td>
                    <td><button onclick="closeForm()" class="btn btn-dark btn-sm" name="cancel" id="c-but">Cancel</button></td>
                </tr>
            </table>
        </form>
    </div>

        <!--update php code-->
        <input type="hidden" value="<?php echo $rowUpdate['id'];?>" name="uid">
        <?php if(isset($_POST['save'])) {
        $upid = $_POST['uid'];
        $first = $_POST['first_name'];
        $last = $_POST['last_name'];
        $con = $_POST['contact_number'];
        $rm = $_POST['room_number'];

        $sqlU = "UPDATE boarders 
        SET first_name = '$first',
            last_name = '$last', contact_number = '$con', 
        room_number = '$rm'
        WHERE id = $upid";
        $resultU = mysqli_query($conn, $sqlU);
        
        if(mysqli_affected_rows($conn)) {
            header("location: table.php");
        }
    } ?>      
    <!--end of update-->
    
    <!--delete-->
    <?php if(isset($_POST['remove'])) {
        $rid = $_POST['id'];
        $sqld = "DELETE FROM boarders WHERE id = $rid";
        $resultd = mysqli_query($conn, $sqld);
        
        if ($resultd && mysqli_affected_rows($conn) > 0)
         
        exit(); 
    } 
     ?>      

<script>
    function closeForm() {
        document.getElementById("updatebutton").style.display = "none";
    }
</script>