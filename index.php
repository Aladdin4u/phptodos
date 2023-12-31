<?php
    include("conn.php");

    if(isset($_GET['delete-task']) && !empty($_GET['delete-task']) ) {
     
        $id = $_GET['delete-task'];
        $sql  = "DELETE FROM todos WHERE `todos`.`id` = $id";
        $query_run = mysqli_query($conn, $sql);
        if($query_run) {
            echo "<script>window.location='index.php'</script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again.');</script>";
        }
     }

    if(isset($_GET['completed-task']) == 0 || isset($_GET['completed-task']) == 1) {
        if(!empty($_GET['id'])) {
            $completed = $_GET['completed-task'];
            $id = $_GET['id'];
            if($completed == 1) {
                $completed = 0;
            } else {
                $completed = 1;
            }
            $sql  = "UPDATE todos SET completed = $completed WHERE `todos`.`id` = $id";
            $query_run = mysqli_query($conn, $sql);
            if($query_run) {
                echo "<script>window.location='index.php'</script>";
            } else {
                echo "<script>alert('Something Went Wrong. Please try again.');</script>";
            }

        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header>
    <h1>Todolist</h1>
<?php
    include("form.php");
    
?>
</header>
    <div class="box-container">
        <?php
            $query=mysqli_query($conn,"select * from todos;");
            $count=mysqli_num_rows($query);
            while ($row=mysqli_fetch_array($query)) {
        ?>
            <div class="content">
                <?php if($row['completed'] == 1) { ?>
                <a href="index.php?completed-task=<?php echo $row['completed']; ?>&&id=<?php echo $row['id']?>" style="text-decoration: none;color:black;border-left: 4px solid red;">
                <p><?php echo $row['task'] ?></p>
                </a>
                <?php } else { ?>
                <a href="index.php?completed-task=<?php echo $row['completed']; ?>&&id=<?php echo $row['id']?>" style="text-decoration: none;color:black;">
                <p><?php echo $row['task'] ?></p>
                </a>
                <?php } ?>
                <div class="box-btn">
                    <div style="margin-right: 10px;">
                    <a href="edit.php?edit-task=<?php echo $row['id']; ?>&&get-task=<?php echo $row['task']; ?>" class="btn-edit" style="text-decoration: none;color:white">edit</a>
                    </div>
                    <div>
                    <a href="index.php?delete-task=<?php echo $row['id']; ?>" class="btn-trash" style="text-decoration: none;color:white">delete</a>
                    </div>
                </div>
            </div>
       

        <?php }?>
    </div>
</body>
</html>
