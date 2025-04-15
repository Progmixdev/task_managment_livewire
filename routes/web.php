<?php


use App\Livewire\ProjectComponent;
use App\Livewire\TaskComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', ProjectComponent::class)->name('projects');
Route::get('/projects/{projectId}/tasks', TaskComponent::class)->name('project.tasks');
