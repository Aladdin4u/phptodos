<?php
    include("conn.php");
    if(isset($_POST['task'])) {
        if(!empty($_POST['task'])) {
            $task = $_POST['task'];
            $sql  = "INSERT INTO `todos` (`id`, `task`, `completed`) VALUE (NULL, '$task', '0')";
            $query_run = mysqli_query($conn, $sql);
            if($query_run) {
                echo "<script>alert('task added succesfully');</script>";
            } else {
                echo "<script>alert('Something Went Wrong. Please try again.');</script>";
            }
        } else  {
            echo "please enter a valid string";
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
<!-- style="max-width:600;margin:auto; background-color:#f1f1f1 -->
    <header>
        <form action="index.php" method="POST" class="form-container">
            <input type="text" name="task" placeholder="today's task" class="input-text">
            <button type="submit" value="Submit" class="btn">submit</button>
        </form>
    </header>
    <div class="box-container">
        <?php
            $query=mysqli_query($conn,"select * from todos;");
            $count=mysqli_num_rows($query);
            while ($row=mysqli_fetch_array($query)) {
        ?>
            <div class="content">
                <p><?php echo $row['task'] ?></p>
                <p><?php echo $row['id'] ?></p>
                <div class="box-btn">
                    <span class="btn-edit">Edit</span>
                    <span class="btn-trash">delete</span>
                </div>
            </div>

        <?php }?>
    </div>
</body>
</html>