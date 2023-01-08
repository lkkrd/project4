<?php
$mysqli = new mysqli ("localhost", "root", "Mikamen2", "biblioteka");

//declare values
$title = strtoupper($_REQUEST['book-title']);
$author = strtoupper($_REQUEST['book-author']);
$genere = strtoupper($_REQUEST['book-genere']);

//checking connection
if($mysqli -> connect_errno) {
   echo "error: ".$mysqli -> connect_error;
}

//statement prepare
$stmt = $mysqli -> prepare('INSERT INTO books (title, author, genere) VALUES (?, ?, ?)');

//parameters binding. Why can't just use variables instead of markers?
$stmt->bind_param('sss', $title, $author, $genere);

//execution
if ($stmt -> execute()) {
   echo '<br><strong>"'.$title.'"</strong> has been added to the library db';
   echo '<br><a href="..\forms\add-book.html">Go back to add-book page</a>';
} else {
   echo '<br> Execution went wrong';
}
