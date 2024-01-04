<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Register;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class UsersList extends Component
{
    use WithPagination;
 
    // THIS IS FOR THE SEARCH
    public $search;
    
    // THIS BELONGS TO THE SEARCH TOO
    public function update(){

    }

    // PASS DATA TO COMPONENTS AND MOUNT, THERE IS A DEFAULT VALUE IN SEARCH IF WE WILL USE THIS
    public function mount($search){
        $this->search = $search;
    }

    #[On('user-created')]
    public function updatelist($register = null){
        
    }

    public function placeholder(){
        return view('placeholder');
    }

    public function render()
    // {
    //     return view('livewire.users-list',[
    //         'registers' => Register::latest()->paginate(3)
    //     ]);
    // }
    {
        // the users will be use in frontend
        sleep(1);
        // $registers = Register::latest()->paginate(3);
        return view('livewire.users-list', [
            'registers'=>Register::latest()
            ->where('name', 'like', "%{$this->search}%")
            ->paginate(3),
            'count' => Register::count(),
        ]);
    }
}
