<?php

namespace Modules\Product\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Product\Entities\Product;
use Modules\Vendor\Entities\Vendor;

class ProductAttributes extends Component
{

    use WithFileUploads;

    public ?Product $product = null;
    public ?array $name = [];
    public ?array $attributes = [];
    public $logo;
    protected $listeners = [
        'branchSelected',
        'vendorSelected',
        'categorySelected',
    ];
    protected array $rules = [
        'product.price' => 'required|numeric',
        'product.cat_id' => 'required|exists:product_categories,id|numeric',
        'product.branch_id' => 'required|exists:branches,id|numeric',
        'product.is_active' => 'boolean',
        'product.overall_rating' => 'nullable|numeric',
        'product.name.ar' => 'nullable',
        'product.name.en' => 'numeric',
    ];


    public function mount(Product $product): void
    {
        $this->product = $product;
        if ($product->attributes) {
            foreach ($product->attributes as $attribute) {
                $this->attributes[] = [
                    'name' => $attribute->getTranslations('name'),
                    'type' => $attribute['type'],
                    'min' => $attribute['min'],
                    'max' => $attribute['max'],
                    'choices' => [],
                ];
                foreach ($attribute->choices as $choice) {
                    $this->attributes[array_key_last($this->attributes)]['choices'][] = [
                        'name' => $choice->getTranslations('name'),
                        'additional_price' => $choice->additional_price,
                    ];
                }
            }
        }
    }


    public function branchSelected($item): void
    {
        $this->product->branch_id = $item ?? null;
    }

    public function vendorSelected($item): void
    {
        $branches = Vendor::find($item)->branches->pluck('name', 'id');
        $this->emit('sendingBranches', $branches);
    }

    public function categorySelected($item): void
    {
        $this->product->cat_id = $item ?? null;

    }

    public function save()
    {
        $this->validate();
        $this->product->save();
        if (!empty($this->attributes)) {
            $this->product->attributes()->delete();
            foreach ($this->attributes as $attribute) {
                $atr = $this->product->attributes()->create([
                    'name' => $attribute['name'],
                    'type' => $attribute['type'],
                    'min' => $attribute['min'],
                    'max' => $attribute['max'],

                ]);
                foreach ($attribute['choices'] as $choice) {
                    $atr->choices()->create([
                        'name' => $choice['name'],
                        'additional_price' => $choice['additional_price'],
                    ]);
                }
            }
        }
        if ($this->logo) {
            $this->product->addMedia($this->logo->getRealPath())->toMediaCollection('products');
        }
        toast(trans('product::messages.created-successfully'), 'success');
        return redirect()->route('products.index');

    }

    public function addNewAttribute()
    {
        $this->attributes[] = [
            'name' => [
                'ar' => '',
                'en' => '',
            ],
            'type' => '',
            'min' => '',
            'max' => '',
            'choices' => [
                [
                    'name' => [
                        'ar' => '',
                        'en' => '',
                    ],
                    'additional_price' => ''
                ]
            ]
        ];
    }

    public function removeAttribute($index): void
    {
        array_splice($this->attributes, $index, 1);
    }

    public function addNewChoice($index): void
    {
        $this->attributes[$index]['choices'][] = [
            'name' => [
                'ar' => '',
                'en' => '',
            ],
            'additional_price' => ''
        ];
    }

    public function removeChoice($attributeIndex, $choiceIndex): void
    {
        array_splice($this->attributes[$attributeIndex]['choices'], $choiceIndex, 1);
    }

    public function render()
    {
        return view('product::livewire.product-attributes');
    }
}
