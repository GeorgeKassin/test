<?php

$localhost = 'localhost';
$user = 'root';
$password = '';
$database = 'books_authors';


$mysqli = new mysqli($localhost, $user, $password, $database);


$mysqli->set_charset("utf8");


if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " 
    . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";
echo "Авторы, написавших не более 6 книг\n";

 
$request = "SELECT authors.id,authors.name FROM authors 
JOIN book_author ON authors.id=book_author.author_id 
JOIN books ON books.id=book_author.book_id 
GROUP BY authors.id HAVING(COUNT(authors.id)<=6)";


$result = $mysqli->query($request, MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id(". $row['id'].") Автор - ". $row['name']."\n";
    }
}


mysqli_close($mysqli);

?>