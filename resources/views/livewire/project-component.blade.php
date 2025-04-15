<div class="section">
    <span class="sidebar-button" wire:click="toggleSidebar">&#9776;</span>
    <aside class="mySidebar" style="{{ $sidebarOpen ? 'left: 0;' : 'left: -300px;' }}">
        <span class="close-btn" wire:click="toggleSidebar">&#10005;</span>
        <h2 class="section-title">All Projects</h2>

        @if ($projects)
            <ul class="projects">
                @foreach ($projects as $project)
                    <li wire:click='selectProject({{ $project->id }})'
                        class="{{ $selectedProjectId == $project->id ? 'selected' : '' }}">
                        {{ $project->title }}
                    </li>
                @endforeach
            </ul>
        @endif
    </aside>

    @if ($selectedProjectId)
        <div class="sidebarContent {{ $sidebarOpen ? 'open' : 'close' }}">
            <livewire:task-component :projectId="$selectedProjectId" wire:key="project-{{ $selectedProjectId }}" />
        </div>
    @endif
</div>
