<?php
    $index = $_GET['index'];
    $booksJson = file_get_contents('books.json');
    $books = json_decode($booksJson, true);
    unset($books[$index]);
    $books = array_values($books);
    $books = json_encode($books, JSON_PRETTY_PRINT);
    file_put_contents("books.json", $books);
    header("location:index.php");
?>