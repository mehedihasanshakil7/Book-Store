<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    input {
        margin-bottom: 5px;
    }

    select {
        margin-bottom: 5px;
    }
    </style>

</head>

<body>
    <?php
    require_once 'functions.php';
    $index = $_GET['index'];
    $books = getBooks();
    if(isset($_POST['update'])){
        $update_book = array(
                "title"=>$_POST['title'],
                "author"=> $_POST['author'],
                "available" => $_POST['available'],
                "pages"=> $_POST['pages'],
                "isbn" => $_POST['isbn']
        );
        $books[$index] = $update_book;
        $books = json_encode($books, JSON_PRETTY_PRINT);
        file_put_contents('books.json',$books);
        $updateSuccess = true;
    }
?>
    <div class="container">
        <div>
            <div><a href="index.php">Home Page</a></div>
            <?php if(isset($updateSuccess) && $updateSuccess) { ?>
            <p>Information Updated Successfully. Go to the Home Page.<br /></p>
            <?php } else { ?>
            <p>Update the Book Information. <br /></p>
            <form method="post">
                <?php
            $index = $_GET['index'];
            $books = getBooks();
        ?>
                <label for="title">Title</label> <br>
                <input type="text" name="title" value="<?php echo $books[$index]['title']?>"
                    placeholder="Update Book Title" required> <br>
                <label for="author">Author</label> <br>
                <input type="text" name="author" value="<?php echo $books[$index]['author']?>"
                    placeholder="Update Author Name" required> <br>
                <label for="avail">Availability</label><br>
                <select name="available" required>
                    <option value="Yes" <?php if($books[$index]['available'] == "Yes") echo "selected"; ?>>Yes</option>
                    <option value="No" <?php if($books[$index]['available'] == "No") echo "selected"; ?>>No</option>
                </select> <br>
                <label for="pages">Pages</label><br>
                <input type="number" name="pages" value="<?php echo $books[$index]['pages']?>"
                    placeholder="Update No. of Pages" required> <br>
                <label for="isbn">ISBN</label><br>
                <input type="text" name="isbn" value="<?php echo $books[$index]['isbn']?>"
                    placeholder="Update ISBN No."> <br>
                <input type="submit" value="submit" name="update">
            </form>
            <?php } ?>
        </div>
    </div>
</body>

</html>