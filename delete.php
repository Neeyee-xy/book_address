<?php
include('conn_book.php');
$qry="DELETE from book_sheet";
$stat=$connect->prepare($qry);

$stat->execute();
$qry="DELETE from family";
$stat=$connect->prepare($qry);

$stat->execute();
?>