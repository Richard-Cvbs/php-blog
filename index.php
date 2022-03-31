<?php include('inc/header.php')?>
<?php 
    $sql = 'SELECT * FROM blogs ORDER BY time DESC';
    $result = mysqli_query($conn, $sql);
    $blogs = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(isset($_POST['submit'])){
        $postToDelete = $_POST['delete_id'];
        $sql = "DELETE FROM blogs WHERE id = {$postToDelete}";
        if(mysqli_query($conn, $sql)){
            //Success
            header('Location: index.php');
        } else {
            echo 'Error: '. mysqli_error($conn);
        };
    };
    ?>
<div class="container">
        <?php if(!$blogs):?>
        <div class="alert alert-warning">
        <h4 class="alert-heading">Warning!</h4>
        <p class="mb-0">There are no Blogs at this time, why not make one?</p>
        </div>
        <?php endif ;?>
        <?php foreach($blogs as $blog):?>

    <div class="card mb-3">
        <h3 class="card-header p-3">
        <?php
        echo $blog['title']
        ?>
        </h3>
        <div class="card-body">
            <h4 class="card-subtitle text-muted">
            <?php
        echo $blog['summary']
        ?>
            </h4>
        </div>
        <ul class="list-group list-group-flush">
        <li class="list-group-item"><?php
        echo $blog['body']
        ?>
        </h3></li>
        <li class="list-group-item fst-italic text-end me-3"><?php
        echo "By {$blog['author']} at {$blog['time']}"
        ?>
        </h3></li>
        <li class="list-group-item">
            <a class="btn btn-warning" href="edit.php?id=<?php echo $blog['id'];?>">Edit</a>
            <form class="d-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <button class="btn btn-danger ms-3" name="submit" type="submit">Delete</button>
                <input type="text" class="invisible" name='delete_id' value="<?php echo $blog['id'] ?>">
            </form>
        </li>
         </ul>
    </div>
        <?php endforeach; ?>
</div>
<div class="my-5 p-1"></div>
<?php include('inc/footer.php')?>
