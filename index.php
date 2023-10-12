<?php
require_once 'functions.php';
$index=0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <style>
    input {
        margin-bottom: 5px;
    }

    select {
        margin-bottom: 5px;
    }
    </style>
</head>

<?php $books = getBooks(); ?>

<body>
    <form action="create.php" method="post">
        <label for="title">Title</label> <br>
        <input type="text" name="title" placeholder="Enter Book Title" required> <br>
        <label for="author">Author</label> <br>
        <input type="text" name="author" placeholder="Enter Author Name" required> <br>
        <label for="avail">Availability</label> <br>
        <select name="available" required>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select> <br>
        <label for="pages">Pages</label> <br>
        <input type="number" name="pages" placeholder="Enter No. of Pages" required> <br>
        <label for="isbn">ISBN</label> <br>
        <input type="text" name="isbn" placeholder="Enter ISBN No."> <br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <br><br><br>
    <div style="position: absolute; top: 10px; right: 10px;">
        <form action="search.php" method="post">
            <input type="text" name="search" placeholder="Title or Author">
            <input type="submit" value="Search">
        </form>
        <table border="1">
            <thead>
                <tr>
                    <th width="300">Title</th>
                    <th width="200">Author</th>
                    <th width="5">Availability</th>
                    <th width="10">Pages</th>
                    <th width="20">ISBN</th>
                    <th width="30">Update</th>
                    <th width="30">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $key => $book): ?>
                <tr>
                    <td> <?= $book['title'] ?> </td>
                    <td><?= $book['author'] ?></td>
                    <td><?= $book['available']?></td>
                    <td><?= $book['pages'] ?> </td>
                    <td><?= $book['isbn'] ?></td>
                    <td><a href="update_book.php?index=<?php echo $index?>">Update</a></td>
                    <td><a href="delete.php?index=<?php echo $index?>">Delete</a></td>
                </tr>
                <?php $index++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
?>
</body>

</html>