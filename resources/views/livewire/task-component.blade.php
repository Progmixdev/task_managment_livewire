<div class="section">
    <div class="section-btn">
        <button wire:click="create" class="btn">Add Task</button>
    </div>
    <h2>Tasks for Project ID: {{ $projectId }}</h2>
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

    @if ($isOpen)
        <div class="modal">
            <div class="modalContent">
                <button wire:click="closeModal" class="modalClose">X</button>
                <h2>Create Task</h2>

                <form wire:submit.prevent="store">
                    <input type="hidden" wire:model="projectId">

                    <div class="form-group">
                        <label for="title">Task Title</label>
                        <input id="title" type="text" wire:model="title">
                        @error('title')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="due_date">Due Date</label>
                        <input id="due_date" type="date" wire:model="due_date">
                        @error('due_date')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="section-btn">
                        <button type="submit" class="btn">Save Task</button>
                    </div>
                </form>

            </div>
        </div>
    @endif

    {{ $tasks->links() }}

</div>
