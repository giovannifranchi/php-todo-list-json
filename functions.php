<?php

function login($user, $password){
    $usersFile = file_get_contents(__DIR__. '/users.json');
    $users = json_decode($usersFile, true);


    $foundUser = null;

    for($i = 0; $i < count($users); $i++){
        $currentUser = $users[$i];
        if($currentUser['username'] === $user && $currentUser['password'] === $password){
            $foundUser = $currentUser;
            break;
        }
    }

    return $foundUser;

}


//funzione per aggiungere un todo
function addTodo($todos, $params){
    $todo = [
        'text' => $params,
        'done' => false,
    ];

    $todos[] = $todo;

    file_put_contents(__DIR__. '/tods.json', json_encode($todos));

    return $todos;
}


function deleteTodos($todos, $index){
    unset($todos[$index]);

    file_put_contents(__DIR__. '/todos.json', json_encode($todos));

    return $todos;
}

function editTodos($todos, $params){

    $index = $params['edit'];

    $todos[$index] = array(
        'text' => $todos[$index]['text'],
        'done' => $todos[$index]['done'] == true ? false : true,
    );


    file_put_contents(__DIR__. '/todos.json', json_encode($todos));

    return $todos;
}