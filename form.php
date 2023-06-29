<?php
if(isset($_POST['task'])) {
        if(!empty($_POST['task'])) {
            $task = $_POST['task'];
            $sql  = "INSERT INTO `todos` (`id`, `task`, `completed`) VALUE (NULL, '$task', '0')";
            $query_run = mysqli_query($conn, $sql);
            if($query_run) {
                echo "<script>alert('task added succesfully');</script>";
                echo "<script>window.location='index.php'</script>";
            } else {
                echo "<script>alert('Something Went Wrong. Please try again.');</script>";
            }
        } else  {
            echo "please enter a valid string";
        }
    }
?>
<form action="" method="POST" class="form-container">
    <input type="text" name="task" placeholder="Enter today's task" class="input-text" required>
    <button type="submit" value="Submit" class="btn">Add</button>
</form>