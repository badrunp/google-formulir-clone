<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        $data = $this->validate();

        if($this->isForm == 'Login'){
            if(auth()->attempt($data, $this->remember)){
                session()->regenerate();

                return redirect('/');
            }

            $this->addError('login-error', 'Something wrong, check your creadential again!');
            $this->password = '';
        }else if($this->isForm == 'Register'){
            $user = User::create([
                'username' => $this->username,
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password)
            ]);

            session()->flash('register-success', 'Register success, please login');
            $this->isModal = true;
            $this->isForm = 'Login';

            $this->email = $user->email;
            $this->password = $this->password;
        }

    }

    public function logout(){
        auth()->logout();

        session()->invalidate();

        session()->regenerateToken();

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
