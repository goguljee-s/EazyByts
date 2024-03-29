<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Document</title>
</head>

<body>

    <header class="head-admin">Admins CRUD Process</header>
    <div class="admin">
        <div>

        </div>
        <div class="admin-container">
            <div>
                <h2 class="list-details">List Of Cars</h2>
                <a href="./add.php" class="add-btn"><i class="fa fa-plus"></i>Add New Car</a>
            </div>

            <?php
            require_once '../Php/config.php';
            $sql = "SELECT * FROM cars";
            if ($res = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($res) > 0) {
                    echo '<table class="admin-table">';
                    echo '<thead>';
                    echo '<tr>';
                    echo "<th>ID</th>";
                    echo "<th>Brand</th>";
                    echo "<th>Model</th>";
                    echo "<th>Price</th>";
                    echo "<th>Top Model</th>";
                    echo "<th>Vehicle Number</th>";
                    echo '</tr>';
                    echo '</thead>';

                    echo "<tbody>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo '<tr>';
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['brand_name'] . "</td>";
                        echo "<td>" . $row['model_name'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo '<td><form id="table-form" action="#" method="post"> <input type="hidden" name="id" value="' . $row["id"] . '"> <input type="checkbox" name="check" id="check" "' . $row['top_model'] . '"> <input type="submit" value="Update" id="check-btn"></form></td>';
                        echo "<td>" . $row['vehicle_no'] . "</td>";
                        echo "<td>";
                        // echo '< a href="read.php?id' . $row['id'] . '"class="btn-style" title="View Cars" ><span class="fa fa-eye"></span></a>';
                        echo '<a href="update.php?id=' . $row['id'] . '" class="admin-btn-style" title="Update Record"> <i class="fa fa-pencil"></i></a>';
                        echo '<a href="delete.php?id=' . $row['id'] . '"  class="admin-btn-style" tittle="Delete the Record"><i class="fa fa-trash"></i></a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<div class alert-mssg><em> No records were found.</em></div>";
                }
            } else {
                echo "Something went wrong";
            }
            mysqli_free_result($res);

            ?>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../JavaScript/admin.js"></script>

</body>

</html>