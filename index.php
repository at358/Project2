<?php

require_once 'init.php';

$todoQuery = db->prepare("
    SELECT id, name, done
    FROM items
    WHERE id = :id
  ");

$todoQuery->execute([
  'user' => $_SESSION['user_id']
]);

$todo = $todoQuery->rowCount() ? $todoQuery : [];

foreach($todo as $item){
  print_r($item);
}

echo '<pre>', print_r($todo, true), '</pre>'

?>

<!doctype html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>To-Do List</title>
  </head>
  <body>
    <div class="list">
      <h1 class="header">To-do List</h1>
      
      <?php if(!empty($todo)):  ?>
      <ol class="items">
        <?php foreach ($todo as $item): ?>
          <li>
            <span class="item<?php echo $item['done'] ? ' done' : '' ?>"> <?php echo item['name']; ?></span>
            <?php if(!$item['done'];): ?>
              <a href="mark.php?as=done&item=<?php echo $item['id']; ?>" class='done-button'>Mark as done</a>
              <a href="delete.php?as=done&item=<?php echo $item['id']; ?>" class='done-button'>Delete</a>
              <a href="edit.php?as=done&item=<?php echo $item['id']; ?>" class='done-button'>Edit</a>              
            <?php endif; ?> 
          </li>
        <?php endforeach; ?>
      </ol>
      <?php else: ?>
        <p>
          "You havent added any items yet."
        </p>
      <?php endif; ?>  
      
      <form class="item-add" action = "add.php" method="post">
        <input type="text" name="name" placeholder="Type a new To do Item here." class="input" autocomplete="off" required>
        <input type="submit" value="Add" class="submit">
      </form>
  </body>
</html>