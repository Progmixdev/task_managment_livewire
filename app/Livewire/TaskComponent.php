<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class TaskComponent extends Component
{
    use WithPagination;

    public $title;
    public $due_date;
    public $isOpen = 0;
    public $projectId;
    protected $rules = [
        'title' => 'required|string|max:255',
        'due_date' => 'required|date',
    ];
    public function mount($projectId)
    {
        $this->projectId = $projectId;
    }
    public function create()
    {
        $this->openModal();
    }

    public function store()
    {
        $this->validate();
        Task::create([
            'title' => $this->title,
            'due_date' => $this->due_date,
            'project_id' => $this->projectId,
        ]);
        session()->flash('message', 'Task created successfully.');
        $this->closeModal();
    }
    public function openModal()
    {
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function toggleTaskStatus($taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->is_done = !$task->is_done;
        $task->save();
    }

    public function render()
    {
        $tasks = Task::where('project_id', $this->projectId)
            ->latest()
            ->paginate(5);

        return view('livewire.task-component', [
            'tasks' => $tasks,
        ]);
    }
}
