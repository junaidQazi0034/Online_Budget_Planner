<?php
include("session.php");
include("header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_GET['uid'];
    $query = "UPDATE users SET status='Active' WHERE user_id='$id'";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Records were updated successfully.');</script>";
        header('location: manage_user.php');
    } 
}

$query =  "SELECT * FROM users WHERE status ='Inactive'";
$exp_fetched = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Expense Manager - Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Feather JS for Icons -->
    <script src="js/feather.min.js"></script>

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <?php
        include("navbar.php");
        ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <div class="container-fluid">
                <h3 class="mt-4">User Management</h3>
                <p>All Un-Approved Requests</p>
                <div class="row justify-content-center">

                    <div class="col-md-6">
                        <table class="table table-responsive">
                            <thead>
                                <tr class="text-center">
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <?php while ($row = mysqli_fetch_array($exp_fetched)) { ?>
                                <tr>
                                    <td> <?php echo $row['firstname']; ?></td>
                                    <td><?php echo $row['lastname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td> <form method="post" action="manage_user.php?uid=<?php echo $row['user_id']; ?>"><input type="submit" class="btn btn-success btn-sm" value="Approve Request"></td></form>
                                    
                                </tr>
                            <?php } ?>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script>
        feather.replace()
    </script>

</body>

</html>