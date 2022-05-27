<?php

namespace Modules\Admin\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\This;
use function Symfony\Component\Translation\t;

class Datatables extends Component
{

    use WithPagination;

    public $search;
    public $model = null;
    public $perPage = 5;
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $exclude = [];
    public $viewColumns = [];
    public $with = [];
    public $include = [];
    public $routeName = '';

    public function mount()
    {
        $this->viewColumns = $this->getIncluded();
    }

    public function getRelations()
    {

    }

    public function sortBy($field)
    {
        if ($this->sortField == $field) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function getIncluded(): array
    {
        $included = [];
        foreach ($this->include as $item) {
            [$type, $col] = explode(':', $item);
            if ($type == 'normal') {
                [$index, $dis] = explode(',', $col);
                $included[trim($index)] = [
                    'type' => 'normal',
                    'display' => $dis,
                ];
            } else {
                [$colName, $relationName, $relationField, $display] = explode(',', $col);
                $included[trim($colName)] = [
                    'type' => 'relation',
                    'relation' => trim($relationName),
                    'field' => trim($relationField),
                    'display' => trim($display)
                ];

            }
        }
        return $included;
    }

    public function render()
    {
        return view('admin::livewire.datatables', [
            'Collection' =>
                $this->model::with($this->with)
                    ->search('id', $this->search)
                    ->orderBy($this->sortField, $this->sortDirection)
                    ->paginate($this->perPage)
        ]);
    }
}
