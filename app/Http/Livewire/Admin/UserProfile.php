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
    protected $messages = [
        'name.required' => 'Bo\'sh bo\'lmasligi kerak',
        'name.max' => '255 ta belgidan oshmasligi kerak!',
        'login.required' => 'Bo\'sh bo\'lmasligi kerak',
        'password.required' => 'Bo\'sh bo\'lmasligi kerak',
        'password.min' => 'Parol 8 ta belgidan kam bo\'lmasligi kerak!',
        'password.confirmed' => 'Parol tasdiqlash noto\'g\'ri!',
        'password_old.required' => 'Bo\'sh bo\'lmasligi kerak',
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
                "login" => "required|unique:users,login, " . Auth::user()->id,
            ], $this->rulesPassword),
            $this->messages
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
                "login" => "required|unique:users,login, " . Auth::user()->id,
            ],
            $this->messages
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
            $this->messages
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
