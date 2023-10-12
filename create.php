<?php
    require_once('functions.php');
    $books = getBooks();
    $books[] = $_POST;
    $books = json_encode($books, JSON_PRETTY_PRINT);
    file_put_contents("books.json", $books);
    header("location: index.php");
?>