<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminCustomersComponent extends Component
{
    public $user_id;
    public function deleteUser()
    {
        $user = User::find($this->user_id);
        $user->delete();
        session()->flash('message', 'User has been deleted successfully!');
    }
    public function render()
    {
        $users = User::all();
        return view('livewire.admin.admin-customers-component', ['users' => $users]);
    }
}
