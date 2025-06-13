<?php
include("session.php");
include("header.php");
$income_fetched = mysqli_query($con, "SELECT * FROM budget WHERE user_id = '$userid'");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Income Manager - Dashboard</title>

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
                <h3 class="mt-4">Dashboard</h3>
                <p>All your incomes in one place</p>
                <div class="row justify-content-center">

                    <div class="col-md-6">
                        <table class="table table-responsive">
                            <thead>
                                <tr class="text-center">
                                    <th>Budget Title</th>
                                    <th>Budget (PKR)</th>
                                    <th>Saving (PKR)</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>

                            <?php while ($row = mysqli_fetch_array($income_fetched)) { ?>
                                <tr>
                                    <td> <?php echo $row['title']; ?> </td>
                                    <td><?php echo $row['income']; ?> </td>
                                    <td><?php echo $row['saving']; ?></td>
                                    <td class="text-center">
                                        <a href="add_income.php?edit=<?php echo $row['budget_id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="add_income.php?delete=<?php echo $row['budget_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
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
    <!-- Menu Toggle Script -->
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