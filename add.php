<?php

require_once 'init.php';

if(isset($_POST['name'])){
	$name = trim($_POST['name']);

	if(!empty($name)) {
		$addedQuery = $db->prepare("
			INSERT INTO todo (name, id, done, created)
			VALUES (:name, :user, 0, NOW())
			")

		$addedQuery->execute([
			'name' => $name,
			'user' => $_SESSION['user_id']
		])
	}
}

header('Location: index.php')