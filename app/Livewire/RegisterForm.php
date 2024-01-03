<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Register;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class RegisterForm extends Component
{
    use WithFileUploads;

    #[Rule('required| min:3| max:50')]
    public $name;

    #[Rule('required| email| max:255| unique:registers')]
    public $email;

    #[Rule('required| min:3')]
    public $password;

    #[Rule('nullable|sometimes|image|max:1024')]
    public $image;

    public function update(){

    }

    public function create(){

        // THIS IS THE AJAX REQUEST
        sleep(1);
        // VALIDATE 
        $validate = $this->validate();

        // THIS IS FOR THE PHOTO
        if($this->image){
            $validate['image']=$this->image->store('uploads', 'public');
        }

        $register = Register::create($validate);

        // REMOVE VALUES AFTER CREATE
        $this->reset('name', 'email', 'password', 'image');

        // GIVE MESSAGE AFTER CREATE
        session()->flash('success', 'User Created!');

        // // RESET PAGE AFTER, GO TO FIRST PAGE
        // $this->resetPage();

        $this->dispatch('user-created', $register);
    }

    public function ReloadList(){
        $this->dispatch('user-created');
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
