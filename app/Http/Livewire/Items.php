<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Item;
class Items extends Component
{
    use WithPagination;
    public $perPage = 5;
    public function loadMore(){
        $this->perPage+=5;
    }
    public function render()
    {
        $items = Item::paginate($this->perPage);
        return view('livewire.items' , compact('items'));
    }
}
