<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserProfile extends Component
{
    // basic vars
    public $title;
    public $user;
    public $general = true;

    //fields
    public $name;
    public $email;
    public $old_password;
    public $new_password;
    public $confirm_password;

    public function changeTabs()
    {
        if($this->general){
            $this->general = false;
        }else{
            $this->general = true;
        }
        $this->emit('toast', [
            'type' => 'success',
            'message' => 'Changed'
        ]);
    }

    public function mount()
    {
        $this->title = 'User profile';
        $this->user = \auth()->user();
        $this->name = \auth()->user()->name;
        $this->email = \auth()->user()->email;
    }

    public function render()
    {
        return view('livewire.admin.user-profile')->layout('admin.layouts.app');
    }
}
