<?php
include('assets/php/connect.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);
$stmt = $conn->prepare("SELECT * FROM sales");
$stmt->execute();
$result = $stmt->get_result();
$sales = array();

while ($row = $result->fetch_assoc()) {
    $sales[] = $row;
}

$stmt->close();
$conn->close();

session_start();

if (isset($_SESSION['valid_user'])) {
    if ($_SESSION['valid_user'] === 'SuperAdmin') {
        // User is a SuperAdmin
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sales Report</title>
</head>
<body>
    <h1>PureFrame Sales Report</h1>

    <!-- Filter by User Name -->
    <label for="filterUserName">Filter by User Name:</label>
    <input type="text" id="filterUserName" oninput="filterSales()">

    <!-- Sales Table -->
    <table id="salesTable" border="1">
        <tr>
            <th>Sale ID</th>
            <th>User Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Total</th>
            <th>Created At</th>
        </tr>
        <?php foreach ($sales as $sale) { ?>
            <tr>
                <td><?php echo $sale['sale_id']; ?></td>
                <td><?php echo $sale['user_name']; ?></td>
                <td><?php echo $sale['contact']; ?></td>
                <td><?php echo $sale['email']; ?></td>
                <td><?php echo $sale['total']; ?></td>
                <td><?php echo $sale['created_at']; ?></td>
            </tr>
            
        <?php }
        $salesByUser = array();

        foreach ($sales as $sale) {
            $userName = $sale['user_name'];
            $total = floatval($sale['total']);
            
            if (!isset($salesByUser[$userName])) {
                $salesByUser[$userName] = $total;
            } else {
                $salesByUser[$userName] += $total;
            }
        } ?>
    </table>
    <canvas id="salesChart" width="400" height="200"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script>
        function filterSales() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("filterUserName");
            filter = input.value.toUpperCase();
            table = document.getElementById("salesTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Index 1 for User Name column
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        
    </script>
    <script>
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesData = <?php echo json_encode($salesByUser); ?>;

        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(salesData),
                datasets: [{
                    label: 'Total Sales',
                    data: Object.values(salesData),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>
</html>
<?php
    } else {
        // User is not a SuperAdmin
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pure Frames</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>YOU ARE NOT AN ADMIN</h1>
</body>
</html>
<?php
        // Exit the script to prevent unauthorized users from seeing the admin content
        exit();
    }
} else {
    // User is not logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pure Frames</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>YOU ARE NOT LOGGED IN</h1>
</body>
</html>
<?php
}
?>