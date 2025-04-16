<div class="section">
    <div class="section-header">
        <button wire:click="create" class="btn">Add Task</button>
    </div>
    @if (session('message'))
        <div class="alert success">
            {{ session('message') }}
        </div>
    @endif


    @if (count($tasks))
    <h2 class="section-title">Tasks for Project ID: {{ $projectId }}</h2>
        <ul class="tasks">
            @foreach ($tasks as $task)
                <li>
                    <button wire:click="toggleTaskStatus({{ $task->id }})" class="task-button">
                        <div class="task {{ $task->is_done ? 'done' : 'pending' }}" id="task-{{ $task->id }}">
                            <h3>{{ $task->title }}</h3>
                            <div>
                                <span class="status-text">
                                    {{ $task->is_done ? '✓ Done' : '⏳ Pending' }}
                                </span>
                            </div>
                        </div>
                    </button>
                </li>
            @endforeach
        </ul>
    @else
            <h2 class="section-title">No Tasks for Project ID: {{ $projectId }}</h2>
    @endif


    @if ($isOpen)
        <div class="modal">
            <div class="modalContent">
                <button wire:click="closeModal" class="modalClose">&#10005;</button>
                <h2 class="section-title">Create Task</h2>

                <form wire:submit.prevent="store">
                    <input type="hidden" wire:model="projectId">

                    <div class="form-group">
                        <label for="title">Task Title</label>
                        <input id="title" type="text" wire:model="title" class="form-control">
                        @error('title')
                            <div class="alert error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="due_date">Due Date</label>
                        <input id="due_date" type="date" wire:model="due_date" class="form-control">
                        @error('due_date')
                            <div class="alert error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="section-footer">
                        <button type="submit" class="btn">Save Task</button>
                    </div>
                </form>

            </div>
        </div>
    @endif

    {{ $tasks->links() }}

</div>
