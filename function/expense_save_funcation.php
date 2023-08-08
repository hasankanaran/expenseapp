<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $amount = $_POST['amount'];
        $description = $_POST['description'];
        $date = $_POST['date'];

        $sql = "INSERT INTO expenses (amount,description,date)values('$amount','$description','$date')";
        $result = mysqli_query($con, $sql);
    }

    ?>