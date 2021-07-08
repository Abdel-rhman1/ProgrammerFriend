<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Job;
class Posts extends Component
{
    use WithPagination;
    public $prePage = 5;
    public function loadMore(){
        $this->prePage+=5;
    }
    public function render()
    { 
        $jobs = Job::paginate($this->prePage);
        return view('livewire.posts' , compact('jobs'));
    }
}
