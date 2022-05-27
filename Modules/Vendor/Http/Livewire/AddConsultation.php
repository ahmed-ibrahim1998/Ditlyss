<?php

namespace Modules\Vendor\Http\Livewire;

use Livewire\Component;
use Modules\Vendor\Entities\Consultation;

class AddConsultation extends Component
{
    public Consultation $consultation;


    protected function getRules()
    {
        return [

        ];
    }

    public function mount(Consultation $consultation)
    {
        $this->consultation = new Consultation();
        if ($consultation->exists) {
            $this->consultation = $consultation;
        }
    }

    public function addConsultation()
    {


    }

    public function render()
    {

        return view('vendor::livewire.consultation-package-create');
    }
}
