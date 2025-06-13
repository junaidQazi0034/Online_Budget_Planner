
<div class="border-right" id="sidebar-wrapper" style="width:300px;">
            <div class="user">
                <img class="img img-fluid rounded-circle" src="uploads/profile1.jpg" width="120">
                <h5><?php echo $username ?></h5>
                <p><?php echo $useremail ?></p>
            </div>
            <div class="sidebar-heading" style="background:gray;color:white;">Budget Management</div>
            <div class="list-group list-group-flush">
                <a href="index.php" class="list-group-item list-group-item-action sidebar-active"><span data-feather="home"></span> Dashboard</a>

                <a href="add_income.php" class="list-group-item list-group-item-action sidebar-active"><span data-feather="dollar-sign"></span> Add Budget</a>
                <a href="manage_income.php" class="list-group-item list-group-item-action sidebar-active"><span data-feather="trello"></span> Manage Budget</a>

                <a href="add_expense.php" class="list-group-item list-group-item-action sidebar-active"><span data-feather="shopping-cart"></span> Add Expense</a>
                <a href="manage_expense.php" class="list-group-item list-group-item-action sidebar-active"><span data-feather="trello"></span> Manage Expenses</a>
                
               <?php if($usertype=="Admin"){ ?>
                <a href="manage_user.php" class="list-group-item list-group-item-action sidebar-active"><span data-feather="users"></span> Manage Users</a>
           <?php } ?>
            </div>
            <div class="sidebar-heading" style="background:gray;color:white;">Settings </div>
            <div class="list-group list-group-flush">
                <a href="profile.php" class="list-group-item list-group-item-action sidebar-active"><span data-feather="user"></span> Profile</a>
                <a href="logout.php" class="list-group-item list-group-item-action text-danger"><span  data-feather="power"></span> Logout</a>
            </div>
        </div>