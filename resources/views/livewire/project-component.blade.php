<div class="section">
    <span class="sidebar-button" wire:click="toggleSidebar">&#9776;</span>
    <aside class="mySidebar {{ $sidebarOpen ? 'open' : 'close' }}">
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
        @else
            <p class="section-desc">No projects available.</p>
        @endif
    </aside>

    <div class="sidebarContent {{ $sidebarOpen ? 'open' : 'close' }}">
        @if ($selectedProjectId)
            <livewire:task-component :projectId="$selectedProjectId" wire:key="project-{{ $selectedProjectId }}" />
        @else
            <div class="section">
                <h2 class="section-title">No project selected. Please choose a project from the sidebar.</h2>
            </div>
        @endif
    </div>

</div>
