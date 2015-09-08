<html>
<body>
    <style>
        table {
        width: 100%;
        border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
            padding: 5px;
        }

        th {text-align: left;}
    </style>    
    <?php
        include('session.php');
        include('controller/dbController.php');
        $limit = $_GET["limit"];

        if($limit!='*'){
            $auditRecords= getLimitedAuditRecords($limit);
        }
        else
        {
            $auditRecords =getAllAuditRecords();
        }
        echo "<table>
        <tr>
        <th>Time</th>
        <th>User</th>
        <th>Action</th>
        <th>Description</th>
        </tr>";

        foreach($auditRecords as $row) {
            echo "<tr>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['user'] . "</td>";
            echo "<td>" . $row['action'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>
