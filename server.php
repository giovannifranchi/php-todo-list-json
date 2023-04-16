<?php

require_once(__DIR__. '/functions.php');


if(isset($_POST['action'])){
    $action = $_POST['action'];
    if($action === 'login'){
        $user = login($_POST['username'], $_POST['password']);
        if($user === null){
            header('Content-type: application/json');
            $result = json_encode(['error' => 'utente non trovato']);
            echo $result;
            return;
        }

        header('Content-type: application/json');
        unset($user['password']);
        $reult = json_encode($user);
        echo $result;
        return;
    }
}














$databse = file_get_contents(__DIR__. '/todos.json');


$todos = json_decode($databse, true);


if(isset($_POST['add'])){
    $todos  = addTodo($todos, $_POST['add']);
}


if(isset($_POST['delete'])){
    
    $todos = deleteTodos($todos, $_POST['delete']);
}


if(isset($_POST['edit'])){
    $todos = editTodos($todos, $_POST);
}



header('Content-Type: application/json');

echo json_encode(($todos));

