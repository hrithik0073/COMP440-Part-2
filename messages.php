<?php

session_start();

if(empty($_SESSION['messages'])){
    return;
}

$messages = $_SESSION['messages'];
unset($_SESSION['messages']);

foreach ($messages as $messages):
echo "<p style='color:#FF7377;'>" .$messages. "</p>";
endforeach;

?>

