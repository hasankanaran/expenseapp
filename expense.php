<?php
//include / include once /require / require once
include('dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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

        $sql = "INSERT INTO expenses (amount,description,date)values('$amount','$description','$date')";
        $result = mysqli_query($con,$sql);

    }       

    ?>
    <section>
======================================================================================================================
<table border="1px">
<caption>Expenses</caption>
<thead>
    <tr>
        <th>No</th>
        <th>Description</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
<?php
        $query = "SELECT * FROM v2.expenses";
        $result1 = mysqli_query($con,$query);
if(!$result1){
die('data fetch fail'.mysqli_error($con));

}
else{
  $number = 1;
    // echo($result1);
    while( $row = mysqli_fetch_array($result1)){
        // destruchuring elements from the above array
        $id = $row['id'];
        $amount = $row['amount'];
        $description = $row['description'];
        $date = $row['date'];

        // display the data in the table(long method to display data in table)

        // echo '<tr>';
        // echo '<td>';
        // echo $number;
        // echo '</td>';        
        // echo '<td>';
        // echo $amount;
        // echo '</td>'; 
        // echo '<td>';    
        // echo $description;
        // echo '</td>';
        // echo '<td>';
        // echo $date;
        // echo '</td>';
        // echo '</tr>';

        //short method

        echo'<tr>';
        echo '<td>'. $number.'</td>';
        echo '<td>'. $amount.'</td>';
        echo '<td>'. $description.'</td>';
        echo '<td>'. $date.'</td>';
        echo "<td><button><a href = 'expense_update.php?id=$id'> Edit </a></button><button>Delete</button></td>";
        echo '</tr>';


        $number++;//varaible increment
    }   

}
    ?>
</tbody>
</table>
    </section>

  
</body>

</html>