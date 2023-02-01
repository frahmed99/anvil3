<?php

namespace App\Http\Livewire\Settings;

use App\Models\category as CategoryModel;
use Livewire\WithPagination;

use Livewire\Component;

class Category extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    protected $listeners = ['deleteConfirmed' => 'deleteCategory'];

    public $name, $type, $description, $categoryId, $deleteId;

    public function render()
    {
        $categories = CategoryModel::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(10);

        // $categories = CategoryModel::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.settings.category', ['categories' => $categories]);
    }

    protected function rules()
    {
        return [
            'name' => 'required|max:100|unique:categories',
            'type' => 'required',
            'description' => 'max:250',
        ];
    }

    protected $messages = [
        'name.required' => 'The Category Name Is Required',
        'name.unique' => 'Category Already Exists',
        'type.required' => 'Category Type Is Required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function store()
    {
        $validatedData = $this->validate();

        CategoryModel::create($validatedData);
        $this->alert(
            'success',
            'Category Added Successfully',
            ['topCenter', 'bounceInUp'],
        );
        $this->resetForm();
        $this->dispatchBrowserEvent('close-Modal');
    }

    public function edit(int $categoryId)
    {
        $category = CategoryModel::find($categoryId);
        if ($category) {
            $this->categoryId = $category->id;
            $this->name = $category->name;
            $this->type = $category->type;
            $this->description = $category->description;
        } else {
            return redirect()->to('/categories');
        }
    }

    public function update()
    {
        $validatedData = $this->validate();

        CategoryModel::where('id', $this->categoryId)->update([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'description' => $validatedData['description'],
        ]);
        session()->flash('message', 'Category Updated Successfully');
        $this->resetForm();
        $this->dispatchBrowserEvent('close-Modal');
    }

    public function delete($id)
    {
        $this->deleteId = $id;
        $this->dispatchBrowserEvent('deleteConfirmation');
    }

    public function deleteCategory()
    {
        $category = CategoryModel::where('id', $this->deleteId)->delete();
        $this->dispatchBrowserEvent('deleteConfirmed');
    }

    public function closeModal()
    {
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->name = null;
        $this->type = null;
        $this->description = null;
        $this->resetErrorBag();
    }
}
