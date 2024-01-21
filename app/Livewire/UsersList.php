<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Register;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use League\Flysystem\MountManager;

class UsersList extends Component
{
    use WithPagination;
 
    // THIS IS FOR THE SEARCH
    public $search;
    public $activeUsers;

    public function placeholder(){
        return view('placeholder');
    }

    #[On('user-created')]
    public function updatelist($register = null){
        
    }

    // PASS DATA TO COMPONENTS AND MOUNT, THERE IS A DEFAULT VALUE IN SEARCH IF WE WILL USE THIS
    public function mount($search){
        $this->search = $search;
        $this->activeUsers = Register::latest()->get();

        // to clean cache
        unset($this->registers);   
    }

    // THIS IS FOR THE COMPUTED PROPERTIES
    // persist is for cache
    #[Computed(persist: true, seconds: 3600)]
    public function registers(){
        return Register::latest()
        ->where('name', 'like', "%{$this->search}%")
        ->paginate(3);
    }

    // THIS BELONGS TO THE SEARCH TOO
    public function update(){
        $this->registers = Register::latest()
        ->where('name', 'like', "%{$this->search}%")
        ->paginate(3);
    }

    // public function render()
    // {
    //     // the users will be use in frontend
    //     // sleep(1);
    //     // $registers = Register::latest()->paginate(3);
    //     return view('livewire.users-list', [
    //         // 'registers'=>Register::latest()
    //         // ->where('name', 'like', "%{$this->search}%")
    //         // ->paginate(3),
    //         // 'count' => Register::count(),
    //     ]
    // );
    // }
}
