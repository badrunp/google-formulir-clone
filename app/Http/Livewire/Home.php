<?php

namespace App\Http\Livewire;

use App\Models\Form;
use Livewire\Component;

class Home extends Component
{

    public $forms;

    public function mount(){
        if(auth()->check()){
            $this->forms = Form::where('user_id', auth()->user()->id)->get();
        }
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
        return view('livewire.home')->layout('layouts.layout-app');
    }
}
