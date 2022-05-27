<?php

namespace Modules\Vendor\Http\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;
use Modules\Vendor\Entities\ConsultationPackage;
use Modules\Vendor\Entities\ConsultationPackageAttribute;

class ConsultationPackageCRUD extends Component
{
    public ConsultationPackage $package;
    public array $attributes = [];
    protected $listeners = [
        'vendorSelected'
    ];

    protected function getRules(): array
    {
        return [
            'package.name.ar' => ['required'],
            'package.name.en' => ['required'],
            'package.price' => ['required'],
            'package.vendor_id' => ['required', 'exists:trainers,id'],
        ];
    }

    public function mount(ConsultationPackage $package): void
    {
        $this->package = $package;
        if ($package->exists && $package->packageAttributes()->exists()) {
            foreach ($package->packageAttributes as $attribute) {
                $this->attributes[] = [
                    'name' => [
                        'ar' => $attribute->getTranslation('name', 'ar'),
                        'en' => $attribute->getTranslation('name', 'en'),
                    ],
                    'type' => $attribute['type'],
                ];
            }
        }
    }

    public function vendorSelected($item): void
    {
        $this->package->vendor_id = $item;
    }

    public function addAttribute(): void
    {
        $this->attributes[] = [
            'name' => [
                'ar' => '',
                'en' => ''
            ],
            'type' => ''
        ];
    }

    public function removeAttribute(int $index): void
    {
        array_splice($this->attributes, $index, 1);
    }

    public function save()
    {
        $this->package->save();
        $this->package->packageAttributes()->delete();
        if ($this->attributes) {
            foreach ($this->attributes as $index => $attribute) {
                $this->package->packageAttributes()->create([
                    'name' => $attribute['name'],
                    'type' => $attribute['type'],
                ]);
            }
        }
        toast(__('vendor::messages.updated-successfully'), 'success')->autoClose(1000);
        return redirect()->route('consultation-package.index');
    }

    public function render()
    {
        return view('vendor::livewire.consultation-package-c-r-u-d');
    }
}
