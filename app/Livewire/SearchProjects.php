<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchProjects extends Component
{
    public $query;
    public $projects;

    public function mount()
    {
        $this->query = '';
        $this->projects = [];
    }

    public function updatedQuery()
    {
        $this->projects = User::where('name', 'LIKE', "%{$this->query}%")->get();
    }

    public function render()
    {
        return view('livewire.search-projects');
    }
}
