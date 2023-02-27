<?php 

session_start();

require('db_web.php');

$database = new Database();
$conn = $database->connect();

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="backend/css_file.css">
</head>

<body>
    <div class="container">
    <h1>DATA LOG OLEH USER</h1>
		<table class="table">
			<tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Aksi</th>
                <th>Tabel</th>
                <th>Konteks</th>
                <th>Logtime</th>
			</tr>
                <?php

                $perPage = 10;

                // Calculate Total pages
                $stmt = $conn->query('SELECT count(*) FROM data_log');
                $total_results = $stmt->fetchColumn();
                $total_pages = ceil($total_results / $perPage);

                // Current page
                $page = isset($_GET['page']) ? $_GET['page'] : 1;

                $starting_limit = ($page - 1) * $perPage;

                // Query to fetch data_log
                $query = "SELECT * FROM data_log ORDER BY logtime DESC LIMIT $starting_limit,$perPage";

                // Fetch all data_log for current page
                $log_data = $conn->query($query)->fetchAll();

                ?>

                <?php foreach($log_data as $data_log) {
                        echo "<tr><td>".$data_log['id']."</td>";
                        echo "<td>".$data_log['user_id']."</td>";
                        echo "<td>".$data_log['aksi']."</td>";
                        echo "<td>".$data_log['tabel']."</td>";
                        echo "<td>".$data_log['konteks']."</td>";
                        echo "<td>".$data_log['logtime']."</td>";
                        echo "</tr>";
                    };
                    ?>
                    
                <div style="width: 100%; text-align: center;">
                    <?php for ($page = 1; $page <= $total_pages ; $page++):?>
                        <a href='<?php echo "?page=$page"; ?>' class="links">
                            <?php echo $page; ?>
                        </a>
                    <?php endfor; ?>
                </div>

        </table> 
    </div> 
</body>
</html>