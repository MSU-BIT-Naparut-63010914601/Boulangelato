<?php
include "connectdb.php";
$sql = "SELECT * from `order`";
$result = $conn->query($sql);
?>
<center>ประวัติการสั่งซื้อ</center><br>
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
        <th>วันที่สั่งซื้อ</th>
        <th>รหัสคำสั่งซื้อ</th>
        <th>รายการที่ซื้อ</th>
        <th>ยอดรวม</th>
        <th>ที่อยู่ที่จัดส่ง</th>   
    </tr>";
while ($row = $result->fetch_assoc()) {
    echo "
    <tr>
    <td>" . $row["order_date"] . "</td>
        <td>" . $row["id"] . "</td>
        <td>" . $row["total_products"] . "</td>
        <td>" . $row["total_price"] . "</td>
        <td>" . $row["flat"] . " " . $row["city"] . " " . $row["pin_code"] . "</td>
    </tr>";
}
echo "</table>";

$conn->close();
?>