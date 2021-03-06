<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormUser extends Component
{

    public $form;
    public $questions = [];
    public $datas = [];

    public function rules()
    {
        $errors = [
            'datas.h.0' => 'nullable'
        ];
        foreach ($this->questions as $key => $item) {
            if ($item->requiredfill == 1) {
                if ($item->type == 'singkat') {
                    $errors['datas.singkat.' . $item->id] = 'required';
                } else if ($item->type == 'paragraf') {
                    $errors['datas.paragraf.' . $item->id] = 'required';
                } else if ($item->type == 'ganda') {
                    $errors['datas.ganda.' . $item->id] = 'required';
                } else if ($item->type == 'dropdown') {
                    $errors['datas.dropdown.' . $item->id] = 'required';
                } else if ($item->type == 'centang') {
                    $errors['datas.centang.' . $item->id] = 'required';
                }
            }
        }
        // dd($errors);
        if (count($errors) > 0) {
            return $errors;
        }
    }

    public function mount(Form $form)
    {
        $this->form = $form;
        $this->questions = $form->questions->load('options');
        foreach ($form->questions->load('options') as $item) {
            if ($item->type == 'centang') {
                foreach ($item->options as $key => $value) {
                    $this->datas[$item->type][$item->id][$key] = null;
                }
            } else {
                $this->datas[$item->type][$item->id] = null;
            }
        }
    }


    public function store()
    {
        // dd($this->datas);
        if (count($this->datas) > 0) {
            $this->validate();

            $rand = rand(111111111, 999999999);
            $user_id = $rand;

            $answer = Answer::where('user_id', $user_id)->first();
            if ($answer) {
                $rand = rand(111111111, 999999999);
                $user_id = $rand;
            }

            $this->insertAnswers('paragraf', $user_id);
            $this->insertAnswers('singkat', $user_id);
            $this->insertAnswers('ganda', $user_id);
            $this->insertAnswers('dropdown', $user_id);
            $this->insertAnswers('centang', $user_id);

            session()->flash('hasSuccess', 1);
        } else {
            session()->flash('hasSuccess', 0);
        }

        session()->flash('send_success', $this->form->title);
        session()->flash('url', $this->form->has);
        return redirect()->route('formulir.response');
    }

    public function insertAnswers($type, $user_id)
    {

        if (isset($this->datas[$type])) {
            foreach ($this->datas[$type] as $key => $data) {
                if ($type == 'centang') {
                    foreach ($data as $item) {
                        Answer::create([
                            'answer' => null,
                            'user_id' => $user_id,
                            'type' => 'centang',
                            'option_id' => $item,
                            'question_id' => $key,
                            'form_id' => $this->form->id
                        ]);
                    }
                } else {
                    Answer::create([
                        'answer' => $type == 'singkat' || $type == 'paragraf' ? $data : null,
                        'user_id' => $user_id,
                        'type' => $type,
                        'option_id' => $type == 'ganda' || $type == 'dropdown' ? $data : null,
                        'question_id' => $key,
                        'form_id' => $this->form->id
                    ]);
                }
            }
        }
    }


    public function render()
    {
        // dd($this->datas);
        return view('livewire.form-user')->layout('layouts.layout-app');
    }
}
