<?php
require_once 'functions.php';

if(isset($_POST['search'])) {
    $search = $_POST['search'];
    $books = getBooks();

    $found_books = array_filter($books, function($book) use ($search) {
        return stripos($book['title'], $search) !== false ||
               stripos($book['author'], $search) !== false;
    });

    if(empty($found_books)) {
        echo "<h3>No books found.</h3>";
    } else {
        ?>
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
        <?php foreach ($found_books as $key => $book): ?>
        <tr>
            <td> <?= $book['title'] ?> </td>
            <td><?= $book['author'] ?></td>
            <td><?= $book['available']?></td>
            <td><?= $book['pages'] ?> </td>
            <td><?= $book['isbn'] ?></td>
            <td><a href="delete.php?index=<?php echo $key?>">Delete</a></td>
            <td><a href="update.php?index=<?php echo $key?>">Update</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
    }
} else {
    echo "Please enter a search query.";
}
?>