<?php

namespace App\Http\Livewire;

use App\Models\Form;
use Livewire\Component;

class Home extends Component
{

    public $success = false;

    public function mount(){
    }

    public function successFlash(){
        $this->dispatchBrowserEvent('success', ['text' => 'Success, Url berhasil disalin']);
    }
    
    public function deleteForm($id){
        if($id != ""){
            Form::where('id', $id)->delete();
        }
        
        session()->flash('success', 'Formulir berhasil dihapus');
        return redirect()->route('formulir.home');
    }

    public function render()
    {
        if(auth()->check()){
            $forms = Form::where('user_id', auth()->user()->id)->get();
        }

        return view('livewire.home', ['forms' => $forms])->layout('layouts.layout-app');
    }
}
