<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Register;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class UsersList extends Component
{
    use WithPagination;
 
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
        sleep(3);
        $registers = Register::latest()->paginate(3);
        return view('livewire.users-list', [
            'registers' =>$registers,
            'count' => Register::count(),
        ]);
    }
}
