<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    public $search = '';
    public $roleUpdate = [];

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->where('id', '!=', 1)
            ->paginate(10);

        foreach ($users as $user) {
            $this->roleUpdate[$user->id] = $user->role;
        }

        return view('livewire.user-table', [
            'users' => $users
        ]);
    }



    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updateRole($userId)
    {
        $user = User::findOrFail($userId);
        $user->role = $this->roleUpdate[$userId];
        $user->save();
    }
}
