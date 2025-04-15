<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectComponent extends Component
{
    public $projects;
    public $selectedProjectId;
    public $tasks;
    public $sidebarOpen = false;

    public function mount()
    {
        $this->projects = Project::get();
    }

    public function selectProject($projectId)
    {
        $this->selectedProjectId = $projectId;
        $this->tasks = Project::find($projectId)?->tasks ?? [];
        $this->sidebarOpen = false; // Auto close after selection (optional)
    }

    public function toggleSidebar()
    {
        $this->sidebarOpen = !$this->sidebarOpen;
    }

    public function render()
    {
        return view('livewire.project-component');
    }
}
