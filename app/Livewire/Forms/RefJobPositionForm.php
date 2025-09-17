<?php

namespace App\Livewire\Forms;

use App\Models\Ref\Position;
use Livewire\Form;

class RefJobPositionForm extends Form
{
    public ?Position $refJobPositionModel;
    
    public $name = '';
    public $is_active = '';

    public function rules(): array
    {
        return [
			'name' => 'required|string',
			'is_active' => 'required',
        ];
    }

    public function setRefJobPositionModel(Position $refJobPositionModel): void
    {
        $this->refJobPositionModel = $refJobPositionModel;
        
        $this->name = $this->refJobPositionModel->name;
        $this->is_active = $this->refJobPositionModel->is_active;
    }

    public function store(): void
    {
        $this->refJobPositionModel->create($this->validate());

        $this->reset();
    }

    public function update(): void
    {
        $this->refJobPositionModel->update($this->validate());

        $this->reset();
    }
}
