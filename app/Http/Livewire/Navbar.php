<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public $isModal = false;
    public $isForm = 'Login';

    public $username = '';
    public $name = '';
    public $email = '';
    public $password = '';
    public $remember = false;

    protected function rules(){
        if($this->isForm == 'Login'){
            return [
                'email' => 'required|email',
                'password' => 'required|min:6|max:255',
            ];
        }else if($this->isForm == 'Register'){
            return [
                'username' => 'required|min:3|max:255',
                'name' => 'required|min:3|max:255',
                'email' => 'required|email',
                'password' => 'required|min:6|max:255',
            ];
        }
    }
    
    public function closeModal(){
        $this->isModal = false;
        $this->resetValidation();
        $this->resetInput();
    }

    public function resetAll($type){
        $this->resetValidation();
        $this->resetInput();
        $this->isForm = $type;
    }

    public function resetInput(){
        $this->reset(['username', 'name', 'email', 'password', 'remember']);
    }

    public function handleForm(){
        $this->validate();
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
