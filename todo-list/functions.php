<?php 

    function addTodo($todo_list, $language){
        //AGGIUNTA DI UN ELEMENTO
        
            
        //ALTRO MODO PER EFFETTUARE L'AGGIUNTA DI UN ELEMENTO
        // $todo_item = $_POST['language'];
        // $done = $_POST['done'];
        
        // $todo_array = [
        //     "language" => $todo_item,
        //     "done"  => $done,
        // ];

        // $todo_array = $_POST;
        //FINE ESEMPIO ALTERNATIVO

        //aggiungo in coda un nuovo elemento all'array
        
        $todo_list[] = $language;

        
        //3° scrivo il dato all'interno del file json
        file_put_contents('todo-list.json', json_encode($todo_list, JSON_PRETTY_PRINT));

        return $todo_list;
    }
    

    //CANCELLAZIONE DI UN ELEMENTO DALL'ARRAY
    function deleteTodo($todo_list, $index){
        
        unset($todo_list[$index]);

        file_put_contents('todo-list.json', json_encode($todo_list, JSON_PRETTY_PRINT));

        return $todo_list;
    }
    
    //MODIFICA DI UN ELEMENTO DALL'ARRAY
    function editTodo($todo_list, $post){
        
        $replacement = array( 
            //INDIVIDUA L'ELEMENTO AVENTE INDICE CONTENUTO IN $_POST['EDIT] E LO SOSTITUISCE CON IL SUO VALORE CORRISPONDENTE CHE IN QUESTO CASO E' L'ARRAY
            $post['edit'] => array(
                "language"  => $post['language_edit'],
                "done"      => false
            )
        );
        
        $todo_list = array_replace($todo_list, $replacement);
        
        file_put_contents('todo-list.json', json_encode($todo_list, JSON_PRETTY_PRINT));
        
        return $todo_list;
    }
?>