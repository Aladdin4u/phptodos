<?php
include("conn.php");
$getTask = $_GET["get-task"];
if(isset($_POST['task'])) {
        if(!empty($_POST['task']) && !empty($_GET['edit-task'])) {
            $task = $_POST['task'];
            $id = $_GET['edit-task'];
            echo $id;
            $sql  = "UPDATE `todos` SET `task` = '$task' WHERE `todos`.`id` = $id";
            $query_run = mysqli_query($conn, $sql);
            if($query_run) {
                echo "<script>alert('task updated succesfully');</script>";
                echo "<script>window.location='index.php'</script>";
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
<header>
    <h1>Edit Todolist</h1>
    <form action="" method="POST" class="form-container">
    <input type="text" name="task" placeholder="Enter today's task" value="<?php echo $getTask ?>" class="input-text" required>
    <button type="submit" value="Submit" class="btn">Update</button>
    </form>
</header>
</body>
</html>