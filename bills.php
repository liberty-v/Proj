<?php
    require('config/config.php');
    require('config/db.php');

    $result= $conn->query("SELECT * FROM bills"); 
    $query = 'SELECT * FROM bills';
    $result = mysqli_query($conn, $query);
    $bills = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
?>

<?php include('inc/header.php'); ?> 
<link rel="stylesheet" href="css/style.css">

    <?php    
        // update button
        if(!isset($_POST['edit'])) {
            ?> <style> .form-popup { display: none; } </style> <?php
        }
        else {
            $bid = $_POST['id'];
            $sql = "SELECT * FROM bills WHERE id = $bid";
            $upbill = mysqli_query($conn, $sql);
            $rupdate = mysqli_fetch_assoc($upbill);
            ?> <style> .form-popup { display: block; } </style> <?php
        }

        // delete
        if(isset($_POST['remove'])) {
            $delId = $_POST['id'];
            $sqld = "DELETE FROM bills WHERE id = $delId";
            mysqli_query($conn, $sqld);
            
            if (mysqli_affected_rows($conn) > 0) {
                header("location: bills.php");
            }
        } 
    ?> 

	<div class="container">
        </br> 
        <h2>Bills</h2>
        <button type="button" class="btn btn-info btn-sm" onclick="document.location='add-bill.php'">+</button>
        <button type="button" class="btn btn-dark btn-sm" onclick="document.location='table.php'">Back</button>
        <br></br>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Due Date</th>
                <th scope="col">Rent</th>
                <th scope="col">Electricity</th>
                <th scope="col">Water</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
                
			<div class="well">
                <tbody>
                    <?php foreach($bills as $bill) : ?>
                        <tr>
                            <th scope="row">
                            <?php echo $bill['id'];?></th>
                            <td><?php echo $bill['date_due'];?></td>
                            <td><?php echo $bill['rent'];?></td>
                            <td><?php echo $bill['electricity'];?></td>
                            <td><?php echo $bill['water'];?></td>
                            <td><?php echo $bill['status'];?></td>
                            <td>
                                <form method="POST">
                                    <button class="btn btn-dark btn-sm" id="button" name="edit">Edit</button>
                                    <input type="hidden" value="<?php echo $bill['id'];?>" name="id">
                                    <input type="submit" value="remove" class="btn btn-danger btn-sm" name="remove" onclick="remove()"> 
                                </form>  
                            </td>
                        </tr>
                    <?php endforeach; ?>   
                </tbody>
            </div>
        </table>
    </div>

    <!--update php code-->
    <?php 
        if(isset($_POST['save'])) {
            $uid = $_POST['id'];
            $dd = $_POST['date_due'];
            $rent = $_POST['rent'];
            $elc = $_POST['electricity'];
            $wtr = $_POST['water'];
            $sts = $_POST['status'];

            $sqlU = "UPDATE bills 
            SET  date_due = '$dd', rent = '$rent', 
                electricity = '$elc', water = '$wtr', status = '$sts'
            WHERE id = $uid";
            mysqli_query($conn, $sqlU);
            
            if(mysqli_affected_rows($conn)) {
                header("location: bills.php");
            }
        } 
    ?>      
    <!--end of update-->
   
    <!-- update form pop-up -->
    <div class="form-popup" id="editbutton">
        <form class="form-container" method="POST">
            <table>
                <tr>
                    <th>#</th>
                    <th>Due Date</th>
                    <th>Status</th>
                </tr>
                <tr>    
                    <td>
                        <input type="hidden" value="<?php echo $rupdate['id'];?>" name="id">
                        <?php echo $rupdate['id'];?>
                    </td>
                    
                    <td>
                        <input type="date" class="form-control" value="<?php echo $rupdate['date_due'];?>" name="date_due">
                    </td>
                    <td>
                        <select class="form-control" name="status">
                            <option value=""></option>
                            <option value="Paid">Paid</option>
                            <option value="Unpaid">Unpaid</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <th>Rent</th>
                    <th>Electricity</th>
                    <th>Water</th>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="text" class="form-control" value="<?php echo $rupdate['rent'];?>" name="rent" autocomplete="off">
                    </td>
                    <td>
                        <input type="text" class="form-control" value="<?php echo $rupdate['electricity'];?>" name="electricity" autocomplete="off">
                    </td>
                    <td>
                        <input type="text" class="form-control" value="<?php echo $rupdate['water'];?>" name="water" autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><button onclick="closeForm()" class="btn btn-success btn-sm" name="save" id="s-but">Save</button></td>
                    <td><button onclick="closeForm()" class="btn btn-dark btn-sm" name="cancel" id="c-but">Cancel</button></td>
                </tr>
            </table>
        </form>
    </div>    

<script>
    function closeForm() {
        document.getElementById("editbutton").style.display = "none";
    }
</script>