<?php include('inc/header.php')?>
<?php
    // If GET
    if (isset($_GET['id'])){
        // get ID
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    // Query
    $sqlQuery= 'SELECT * FROM blogs WHERE id = '.$id;
    //result
    $result = mysqli_query($conn, $sqlQuery);
    // Fetch
    $post = mysqli_fetch_assoc($result);
    //variables
    $update_id = $post['id'];
    $title = $post['title'];
    $summary = $post['summary'];
    $author = $post['author'];
    $body = $post['body'];
    $titleErr = $summaryErr = $authorErr = $bodyErr ='';}

    // if submitted
    if(isset($_POST['submit'])){
        if(empty($_POST['title'])){
            //if no title
            $titleErr = 'Title is required';
        } else {
            //Sanitize
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        if(empty($_POST['summary'])){
            //if no summary
            $summaryErr = 'summary is required';
        } else {
            //Sanitize
            $summary = filter_input(INPUT_POST, 'summary', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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

        if(empty($titleErr) && empty($summaryErr) && empty($authorErr) && empty($bodyErr)){
            $update_id = $_POST['update_id'];
            $sql = "UPDATE blogs SET
            title = '$title',
            summary = '$summary',
            author = '$author',
            body = '$body'
            WHERE id = {$update_id}";
            if(mysqli_query($conn, $sql)){
                //Success
                header('Location: index.php');
            } else {
                echo 'Error: '. mysqli_error($conn);
            };
        };
    }
?>

<div class="container">
    <form id="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mt-4 w-75">
            <label class="h2 mb-3" for="form">Edit existing blog!</label>
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input value="<?php echo ($title) ? $title : null; ?>" type="text" class="form-control <?php echo ($titleErr) ? 'is-invalid' : null ; ?>" id="title" name="title" placeholder="New blog title">
            <div class="invalid-feedback">
                <?php echo $titleErr ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <input value="<?php echo ($summary) ? $summary : null; ?>" type="text" class="form-control <?php echo ($summaryErr) ? 'is-invalid' : null ; ?>" id="summary" name="summary" placeholder="Enter a short summary">
            <div class="invalid-feedback">
                <?php echo $summaryErr ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input value="<?php echo ($author) ? $author : null; ?>" type="text" class="form-control <?php echo ($authorErr) ? 'is-invalid' : null ; ?>" id="author" name="author" placeholder="Take credit!">
            <div class="invalid-feedback">
                <?php echo $authorErr ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control <?php echo ($bodyErr) ? 'is-invalid' : null ; ?>" id="body" name="body" placeholder="What are your thoughts today?"><?php echo ($body) ? $body : null; ?></textarea>
            <div class="invalid-feedback">
                <?php echo $bodyErr ?>
            </div>
          </div>
          <input type="text" class="invisible" name='update_id' value="<?php echo $update_id ?>">
          <div class="mb-3">
            <input type="submit" name="submit" value="Submit" class="btn btn-dark w-100">
          </div>
        </form>
</div>



<?php include('inc/footer.php')?>
