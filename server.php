<?php

require_once(__DIR__. '/functions.php');

$databse = file_get_contents(__DIR__. '/todo-list.json');


$todos = json_decode($databse, true);

// var_dump($todos);

// if(isset($_GET['done'])){
//     if($_GET['done'] == true){
//         $temp_array = [];
//         foreach($todos as $key => $todo){
//             if($todo['done']){
//                 $temp_array[] = $todo;
//             }
//         }
//     }else {
//         $temp_array = [];
//         foreach($todos as $key => $todo){
//             if(!$todo['done']){
//                 $temp_array[] = $todo;
//             }
//         }
//     }
//     return $temp_array;
// }


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

