<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserProfile extends Component
{
    public $title;
    public $name;
    public $email;
    public $session;
    public $password;
    public $password_confirmation;
    public $password_old;
    public $general = true;

    /*
     * validation rules
     */
    protected $rulesGeneral;
    protected $rulesPassword = [
        'password' => 'required|min:8|confirmed',
        'password_old' => 'required',
    ];

    public function mount()
    {
        $this->title = __('words.profile');
    }

    public function updated($field)
    {
        $this->validateOnly(
            $field,
            array_merge([
                'name' => 'required|max:255',
                "email" => "required|unique:users,email, " . auth()->user()->id,
            ], $this->rulesPassword),
        );
    }
    public function passwordTab()
    {
        $this->clearValidation();
        $this->general = false;
    }

    public function general()
    {
        $this->reset([
            'password',
            'password_old',
            'password_confirmation',
        ]);
        $this->clearValidation();
        $this->general = true;
    }

    public function formSubmit()
    {
        $this->validate(
            [
                'name' => 'required|max:255',
                "email" => "required|unique:users,email, " . Auth::user()->id,
            ],
        );
        $user = Auth::user();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();
        $this->emit('UserDataChanged');
    }

    public function passwordSubmit()
    {
        $this->validate(
            $this->rulesPassword,
        );
        if (Hash::check($this->password_old, auth()->user()->password)) {
            $password = Hash::make($this->password);
            $user = Auth::user();
            $user->password = $password;
            $user->save();
            $this->emit('UserDataChanged');
            $this->reset();
//            $this->general = false;
        } else {
            $this->addError('password_old', 'Parol noto\'g\'ri');
        }
    }

    public function render()
    {
        empty($this->name) ? $this->name = Auth::user()->name : $this->name = $this->name;
        empty($this->email) ? $this->email = Auth::user()->email : $this->email = $this->email;
        return view('livewire.admin.user-profile', [
            'user' => auth()->user(),
        ])->layout('admin.layouts.app');
    }
}
