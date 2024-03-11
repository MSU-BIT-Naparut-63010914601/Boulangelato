<?php
include "connectdb.php";
$sql = "SELECT * from `users`";
$result = $conn->query($sql);
?>
<center>ประวัติ</center><br>
<style>
    center {
        font-size: 230%;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }
</style>
<?php

$result = mysqli_query($conn, $sql);




echo "
<table border='1'>
    <tr>
        <th>id</th>
        <th>ชื่อ</th>
        <th>email</th>
        <th>เวลาสมัครสมาชิก</th>
        >   
    </tr>";
while ($row = $result->fetch_assoc()) {
    echo "
    <tr>
    <td>" . $row["id"] . "</td>
        <td>" . $row["firstname"] . "</td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["created_at"] . "</td>
    </tr>";
}
echo "</table>";

$conn->close();
?>