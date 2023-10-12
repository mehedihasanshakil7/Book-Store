<?php
function getBooks() : array {
    $booksJson = file_get_contents('books.json');
    return json_decode($booksJson, true);
}