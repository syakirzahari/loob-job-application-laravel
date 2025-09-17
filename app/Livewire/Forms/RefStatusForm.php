<?php

namespace App\Livewire\Forms;

use App\Models\Ref\Status;
use Livewire\Form;

class RefStatusForm extends Form
{
    public ?Status $refStatusModel;
    
    public $name = '';
    public $parent_id = '';

    public function rules(): array
    {
        return [
			'name' => 'required|string',
        ];
    }

    public function setRefStatusModel(Status $refStatusModel): void
    {
        $this->refStatusModel = $refStatusModel;
        
        $this->name = $this->refStatusModel->name;
        $this->parent_id = $this->refStatusModel->parent_id;
    }

    public function store(): void
    {
        $this->refStatusModel->create($this->validate());

        $this->reset();
    }

    public function update(): void
    {
        $this->refStatusModel->update($this->validate());

        $this->reset();
    }
}
