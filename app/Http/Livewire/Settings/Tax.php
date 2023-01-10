<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use App\Models\Tax as TaxModel;
use Livewire\WithPagination;

class Tax extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteConfirmed' => 'deleteTax'];

    public $name, $rate, $taxId, $deleteId;

    public function render()
    {
        $taxes = TaxModel::orderBy('id', 'Desc')->paginate(5);
        return view('livewire.settings.tax', ['taxes' => $taxes]);
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:taxes,name',
            'rate' => 'required|numeric|between:0,100',
        ];
    }

    protected $messages = [
        'name.required' => 'Tax Name Is Required',
        'name.unique' => 'Tax Already Exists',
        'rate.numeric' => 'Tax Rate Must Be a Number in Percentage',
        'rate.required' => 'Tax Value Is Required',
        'rate.numeric' => 'Tax Value Must be and Integer',
        'rate.between:0,100' => 'Tax Value Must Be Between 0 and 100',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function store()
    {
        $validatedData = $this->validate();

        TaxModel::create($validatedData);
        $this->alert(
            'success',
            'Tax Added Successfully',
            ['topCenter', 'bounceInUp'],
        );
        $this->resetForm();
        $this->dispatchBrowserEvent('close-Modal');
    }

    public function edit(int $taxId)
    {
        $tax = TaxModel::find($taxId);
        if ($tax) {
            $this->taxId = $tax->id;
            $this->name = $tax->name;
            $this->rate = $tax->rate;
        } else {
            return redirect()->to('/taxes');
        }
    }

    public function update()
    {
        $validatedData = $this->validate();
        TaxModel::where('id', $this->taxId)->update([
            'name' => $validatedData['name'],
            'rate' => $validatedData['rate']
        ]);
        session()->flash('message', 'Tax Updated Successfully');
        $this->resetForm();
        $this->dispatchBrowserEvent('close-Modal');
    }

    public function delete($id)
    {
        $this->deleteId = $id;
        $this->dispatchBrowserEvent('deleteConfirmation');
    }

    public function deleteTax()
    {
        $tax = TaxModel::where('id', $this->deleteId)->delete();
        $this->dispatchBrowserEvent('deleteConfirmed');
    }

    public function closeModal()
    {
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->name = null;
        $this->rate = null;
        $this->resetErrorBag();
    }
}
