<?php 
try{
  $mysql = new mysqli('localhost', 'root', 'root', 'message');

  if (empty($_POST['content'])) exit("Поле не заполнено");
  if (empty($_POST['content'])) exit("Поле не заполнено");

  $query = "INSERT INTO message VALUES (NULL , :name, NOW())";
  $msg = $conn->prepare($query);
  $msg->execute(['name' => $_POST['name']]);

  $msg_id = $conn->lastInsertId();

  $query = "INSERT INTO message content VALUES (NULL , :content, :message_id)";
  $msg = $conn->prepare($query);
  $msg->execute(['content' => $_POST['content'], 'message_id' => $msg_id]);

  header('Location: /Conditerskya/index.html');
}
catch(PDOException $e)
{
  echo "error" .$e->getMessage();
}
?>