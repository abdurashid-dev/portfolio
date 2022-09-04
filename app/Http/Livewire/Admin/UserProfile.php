<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserProfile extends Component
{
    protected $listeners = ['UserDataChanged' => '$refresh'];
    // basic vars
    public $title;
    public $general = true;

    //fields
    public $name;
    public $email;
    public $old_password;
    public $new_password;
    public $confirm_password;

    public function changeTabs($status)
    {
        $this->general = $status;
    }

    public function mount()
    {
        $this->title = 'User profile';
        $this->name = \auth()->user()->name;
        $this->email = \auth()->user()->email;
    }

    public function updateGeneralInfo()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email, ' . \auth()->user()->id,
        ]);
        $user = User::findOrFail(\auth()->user()->id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();
        $this->emit('UserDataChanged');
        $this->emit('toast', [
            'type' => 'success',
            'message' => 'Successfully updated!'
        ]);
    }

    public function render()
    {
        empty($this->name) ? $this->name = Auth::user()->name : $this->name = $this->name;
        empty($this->email) ? $this->email = Auth::user()->email : $this->email = $this->email;
        return view('livewire.admin.user-profile', [
            'user' => auth()->user()
        ])->layout('admin.layouts.app');
    }
}
