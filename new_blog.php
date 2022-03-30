<?php include('inc/header.php')?>
<?php
    //variables
    $title = $description = $author = $body ='';
    $titleErr = $descriptionErr = $authorErr = $bodyErr ='';
    // if submitted
    if(isset($_POST['submit'])){
        if(empty($_POST['title'])){
            //if no title
            $titleErr = 'Title is required';
        } else {
            //Sanitize
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        if(empty($_POST['description'])){
            //if no description
            $descriptionErr = 'Description is required';
        } else {
            //Sanitize
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        if(empty($_POST['author'])){
            //if no author
            $authorErr = 'Author is required';
        } else {
            //Sanitize
            $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        if(empty($_POST['body'])){
            //if no body
            $bodyErr = 'Body is required';
        } else {
            //Sanitize
            $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
    }
?>

<div class="container">
    <form id="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mt-4 w-75">
            <label class="h2 mb-3" for="form">Create a New Blog!</label>
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control <?php echo ($titleErr) ? 'is-invalid' : null ; ?>" id="title" name="title" placeholder="New blog title">
            <div class="invalid-feedback">
                <?php echo $titleErr ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control <?php echo ($descriptionErr) ? 'is-invalid' : null ; ?>" id="description" name="description" placeholder="Enter a short description">
            <div class="invalid-feedback">
                <?php echo $descriptionErr ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control <?php echo ($authorErr) ? 'is-invalid' : null ; ?>" id="author" name="author" placeholder="Take credit!">
            <div class="invalid-feedback">
                <?php echo $authorErr ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control <?php echo ($bodyErr) ? 'is-invalid' : null ; ?>" id="body" name="body" placeholder="What are your thoughts today?"></textarea>
            <div class="invalid-feedback">
                <?php echo $bodyErr ?>
            </div>
          </div>
          <div class="mb-3">
            <input type="submit" name="submit" value="Submit" class="btn btn-dark w-100">
          </div>
        </form>
</div>



<?php include('inc/footer.php')?>
