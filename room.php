<?php
 require('config/config.php');
 require('config/db.php');

 $result= $conn->query("SELECT * FROM roomt"); 
 $query = 'SELECT * FROM roomt';
 $result = mysqli_query($conn, $query);
 $rr = mysqli_fetch_all($result, MYSQLI_ASSOC);
 mysqli_free_result($result);
 mysqli_close($conn)
?>




<?php include('inc/header.php'); ?> 
	<div class="container">
    </br> 
    <h2>Rooms Details</h2>
    
    <button type="button" class="btn btn-dark btn-sm" onclick="document.location='table.php'">Back</button>
    <br></br>
    <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col"> </th>
                    <th scope="col">Room number</th>
                    <th scope="col">Monthly Rent</th>
                    <th scope="col">Status</th>
                    <th scope="col">        </th>
                    
                    </tr>
                </thead>
                
			<div class="well">
                <tbody>
                <?php foreach($rr as $rinfo) : ?>
                    <tr>
                    <th scope="row"></th>
                    
                    <td><?php echo $rinfo['room_number'];?></td>
                    <td><?php echo $rinfo['monthly_rent'];?></td>
                    <td><?php echo $rinfo['availability'];?></td>
                    <!--maintenance options-->
                    <td><?php
                        $choice = $rinfo['availability']; 
                        
                        switch($rinfo['availability']){

                            case "Available":
                                echo "";
                                break;

                            case "Occupied":
                                echo "";
                                break;

                            case "Under Maintenance":
                                echo 
                               '<button type="button" class="btn btn-dark btn-sm" onclick=document.location="maintenance.php">Details</button>'; 
                                break;

                        } ?></td>


                    <!--maintenance button
                    <td><button type="button" class="btn btn-dark btn-sm" onclick="document.location='bills.php'">Maintenance</button></td>
                    -->
                    

                    </tr>
                <?php endforeach; ?>   
                </tbody>
            </div>