<?php include('inc/header.php')?>


<div class="container">
    <form id="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mt-4 w-75">
            <label class="h2 mb-3" for="form">Create a New Blog!</label>
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="New blog title">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Enter a short description">
          </div>
          <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" placeholder="Take credit!">
          </div>
          <div class="mb-3">
            <label for="body" class="form-label">Feedback</label>
            <textarea class="form-control" id="body" name="body" placeholder="What are your thoughts today?"></textarea>
          </div>
          <div class="mb-3">
            <input type="submit" name="submit" value="submit" class="btn btn-dark w-100">
          </div>
        </form>
</div>



<?php include('inc/footer.php')?>
