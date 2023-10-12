<?php
    if (!isset($_POST['index'])) {
        header('Location: index.php');
    }
    require_once 'functions.php';
    $index = $_POST['index'];
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
        header('Location: index.php');
    }
?>