<?php
//funzione per aggiungere un todo
function addTodo($todos, $params){
    $todo = [
        'text' => $params,
        'done' => false,
    ];

    $todos[] = $todo;

    file_put_contents(__DIR__. '/todo-list.json', json_encode($todos));

    return $todos;
}


function deleteTodos($todos, $index){
    unset($todos[$index]);

    file_put_contents(__DIR__. '/todo-list.json', json_encode($todos));

    return $todos;
}

function editTodos($todos, $params){

    $index = $params['edit'];

    $todos[$index] = array(
        'text' => $todos[$index]['text'],
        'done' => $todos[$index]['done'] == true ? false : true,
    );


    file_put_contents(__DIR__. '/todo-list.json', json_encode($todos));

    return $todos;
}