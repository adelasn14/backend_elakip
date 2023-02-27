<?php 

session_start();

require ('db_web.php');

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
    <h1>LOGIN USER</h1>
		<table class="table">
			<tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Logtime</th>
			</tr>
                <?php

                $perPage = 10;

                // Calculate Total pages
                $stmt = $conn->query('SELECT count(*) FROM login_attempt');
                $total_results = $stmt->fetchColumn();
                $total_pages = ceil($total_results / $perPage);

                // Current page
                $page = isset($_GET['page']) ? $_GET['page'] : 1;

                $starting_limit = ($page - 1) * $perPage;

                // Query to fetch login_log
                $query = "SELECT u.username as username, u.password as password, l.id, l.user_id, l.logtime, l.stat
                FROM login_attempt l LEFT JOIN user u ON l.user_id = u.id ORDER BY l.logtime DESC LIMIT $starting_limit,$perPage";

                // Fetch all login_log for current page
                $login_data = $conn->query($query)->fetchAll();

                ?>

                <?php foreach($login_data as $login_log) {
                        echo "<tr><td>".$login_log['id']."</td>";
                        echo "<td>".$login_log['user_id']."</td>";
                        echo "<td>".$login_log['username']."</td>";
                        echo "<td>".$login_log['password']."</td>";
                        echo "<td>".$login_log['logtime']."</td>";
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