<?php include('inc/header.php')?>
<?php 
    $sql = 'SELECT * FROM blogs ORDER BY time DESC';
    $result = mysqli_query($conn, $sql);
    $blogs = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
            <a class="btn btn-danger" href="#">Delete</a>
        </li>
         </ul>
    </div>
        <?php endforeach; ?>
</div>
<div class="my-5 p-1"></div>
<?php include('inc/footer.php')?>
