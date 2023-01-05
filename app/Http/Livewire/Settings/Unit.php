<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use App\Models\Unit as UnitModel;
use Livewire\WithPagination;

class Unit extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteConfirmed' => 'deleteUnit'];

    public $name, $unitId, $deleteId;

    public function render()
    {
        $units = UnitModel::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.settings.unit', ['units' => $units]);
    }

    protected function rules()
    {
        return ['name' => 'required|max:100|unique:units'];
    }

    protected $messages = [
        'name.required' => 'Unit Name Is Required',
        'name.unique' => 'Unit Already Exists',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function store()
    {
        $validatedData = $this->validate();

        UnitModel::create($validatedData);
        $this->alert(
            'success',
            'Unit Added Successfully',
            ['topCenter', 'bounceInUp'],
        );
        $this->resetForm();
        $this->dispatchBrowserEvent('close-Modal');
    }

    public function edit(int $unitId)
    {
        $unit = UnitModel::find($unitId);
        if ($unit) {
            $this->unitId = $unit->id;
            $this->name = $unit->name;
        } else {
            return redirect()->to('/units');
        }
    }

    public function update()
    {
        $validatedData = $this->validate();

        UnitModel::where('id', $this->unitId)->update([
            'name' => $validatedData['name']
        ]);
        session()->flash('message', 'Unit Updated Successfully');
        $this->resetForm();
        $this->dispatchBrowserEvent('close-Modal');
    }

    public function delete($id)
    {
        $this->deleteId = $id;
        $this->dispatchBrowserEvent('deleteConfirmation');
    }

    public function deleteUnit()
    {
        $unit = UnitModel::where('id', $this->deleteId)->delete();
        $this->dispatchBrowserEvent('deleteConfirmed');
    }

    public function closeModal()
    {
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->name = null;
        $this->resetErrorBag();
    }
}
