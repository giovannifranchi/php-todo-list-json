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

    $index = $params['index'];

    $todos[$index]['text'] = array(
        'text' => $params['text'],
        'done' => false
    );


    file_put_contents(__DIR__. '/todo-list.json', json_encode($todos));

    return $todos;
}