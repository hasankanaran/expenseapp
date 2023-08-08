<?php
include('config/dbconnect.php');
$id = $_GET['id'];
echo $id;

?>

<form method="POST">
        <div class="form-group">
            <label>Amount</label>
            <input type="number" min="0" name="amount" id="" />
        </div>

        <div class="form-group">
            <label>Decription</label>
            <input type="text"  name="description" id="" />
        </div>

        <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" id="" />
        </div>
        <div>
            <button type="submit">save</button>
        </div>
    </form>

    <?php
    if($_SERVER['REQUEST_METHOD'] === 'POST' ){

        $amount = $_POST['amount'];
        $description = $_POST['description'];
        $date = $_POST['date'];

        $sql = "UPDATE expenses set amount = '$amount', description = '$description',date = '$date' WHERE id = $id";
        $result = mysqli_query($con,$sql);

    }       

    ?> 