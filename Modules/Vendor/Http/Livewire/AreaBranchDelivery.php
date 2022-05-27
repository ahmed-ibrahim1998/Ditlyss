<?php

namespace Modules\Vendor\Http\Livewire;

use Livewire\Component;

class AreaBranchDelivery extends Component
{
    public $areas = [];

    public function addNewBranch(): void
    {
        $this->areas[] = [];
    }


    public function removeBranch($index): void
    {
        array_splice($this->areas, $index, 1);
    }

    public function render()
    {
        return view('vendor::livewire.area-branch-delivery');
    }
}
