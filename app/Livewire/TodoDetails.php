<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TodoDetails extends Component
{
    public $todoId;
    public $todo;

    public function loadTodoDetails($id)
    {
        $this->todoId = $id;
        $this->todo = Todo::find($id);
    }

    public function render()
    {
        return view('livewire.todo-details');
    }
}
