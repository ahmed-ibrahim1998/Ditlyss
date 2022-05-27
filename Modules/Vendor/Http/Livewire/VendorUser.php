<?php

namespace Modules\Vendor\Http\Livewire;

use Livewire\Component;

class VendorUser extends Component
{
    public $users = [];

    public function mount()
    {
        $this->users[] = [];
    }

    public function addNewUser(): void
    {
        $this->users[] = [];
    }

    public function removeUser($index): void
    {
        array_splice($this->users, $index, 1);
    }

    public function render()
    {
        return view('vendor::livewire.vendor-user');
    }
}
