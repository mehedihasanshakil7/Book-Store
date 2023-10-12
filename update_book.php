<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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
?>
    <div class="container">
        <div>
            <div><a href="index.php">Home Page</a></div>
            <p>Update the Book Information. <br /></p>
            <form action="update.php" method="post" >
                <?php
            $index = $_GET['index'];
            $books = getBooks();
        ?>
                <input type="hidden" name="index" value="<?php echo $index ?>">
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
                <input type="submit" value="Submit" name="update">
            </form>
        </div>
    </div>
</body>

</html>