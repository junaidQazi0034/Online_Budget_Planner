<?php
include("session.php");
include("header.php");
$update = false;
$del = false;
$title = "";
$income = 0;
$saving = 0;

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $income = $_POST['income'];
    $saving = $_POST['saving'];

    $expenses = "INSERT INTO budget (title,income,saving,user_id) VALUES ( '$title','$income','$saving','$userid')";
    $result = mysqli_query($con, $expenses) or die("Something Went Wrong!");
    header('location: add_income.php');
}

if (isset($_POST['update'])) {
    $id = $_GET['edit'];
    $title = $_POST['title'];
    $income = $_POST['income'];
    $saving = $_POST['saving'];

    $sql = "UPDATE budget SET title='$title', income='$income', saving='$saving' WHERE  budget_id='$id'";
    if (mysqli_query($con, $sql)) {
        echo "Records were updated successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
    header('location: manage_income.php');
}

if (isset($_POST['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM budget WHERE budget_id='$id'";
    if (mysqli_query($con, $sql)) {
        echo "Records were updated successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
    header('location: manage_income.php');
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($con, "SELECT * FROM budget WHERE budget_id=$id");
    if (mysqli_num_rows($record) == 1) {
        $row = mysqli_fetch_array($record);
        $title = $row['title'];
        $income = $row['income'];
        $saving = $row['saving'];
    } else {
        echo ("WARNING: AUTHORIZATION ERROR: Trying to Access Unauthorized data");
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $del = true;
    $record = mysqli_query($con, "SELECT * FROM budget WHERE budget_id=$id");

    if (mysqli_num_rows($record) == 1) {
        $row = mysqli_fetch_array($record);
        $title = $row['title'];
        $income = $row['income'];
        $saving = $row['saving'];
    } else {
        echo ("WARNING: AUTHORIZATION ERROR: Trying to Access Unauthorized data");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Income - Dashboard</title>

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
                <h3 class="mt-4">Add or Edit Income</h3>
                <p>Add income and set your savings</p>
                <div class="row">
                    <div class="col-md" style="margin:0 auto;">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Budget Title</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control col-sm-4" value="<?php echo $title; ?>" id="title" name="title" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="income" class="col-sm-2 col-form-label">Budget Amount</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control col-sm-4" value="<?php echo $income; ?>" id="income" name="income" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="saving" class="col-sm-2 col-form-label">Saving Amount</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control col-sm-4" value="<?php echo $saving; ?>" id="saving" name="saving" required>
                                </div>
                            </div>
                         
                            <div class="form-group row">
                                <div class="col-md-6 text-right">
                                    <?php if ($update == true) : ?>
                                        <button  type="submit" name="update" class="btn btn-lg btn-block btn-warning">Update Budget</button>
                                    <?php elseif ($del == true) : ?>
                                        <button type="submit" name="delete" class="btn btn-lg btn-block btn-danger" >Delete Budget</button>
                                    <?php else : ?>
                                        <button type="submit" name="add" class="btn btn-lg btn-block btn-primary">Add Budget</button>
                                    <?php endif ?>
                                </div>
                            </div>
                        </form>
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
        feather.replace();
    </script>
    <script>

    </script>
</body>
</html>