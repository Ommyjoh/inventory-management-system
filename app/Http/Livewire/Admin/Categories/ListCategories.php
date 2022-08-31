<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class ListCategories extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleted' => 'deleteCategory'];

    public $state = [];
    public $searchTerm;

    public $editModal = false;
    public $category;
    public $categoryToDelete;

    public function addCategory(){
        Validator::make($this->state,[
            'name' => 'required',
            'code' => 'required|numeric|digits:4',
        ],
        [
            'name.required' => 'Please fill category name',
            'code.required' =>'Please fill category code',
            'code.numeric' => 'Please remove Letters in a number',
            'code.digits' => 'Please enter valid category code',
        ])->validate();

        Category::create($this->state);
        $this->dispatchBrowserEvent('hideForm', ['message'=>'Category Added Successfully!']);
    }

    public function addNewCategoryModal(){
        $this->editModal = false;
        $this->reset();
        $this->dispatchBrowserEvent('showForm');
    }

    public function editCategoryForm(Category $category){
        $this->editModal = true;
        $this->category = $category;
        $this->state = $category->toArray();
        $this->dispatchBrowserEvent('showForm');
    }

    public function editCategory(){
        $validatedData =  Validator::make($this->state,[
                                'name' => 'required',
                                'code' => 'required|numeric|digits:4',
                            ],
                            [
                                'name.required' => 'Please fill category name',
                                'code.required' =>'Please fill category code',
                                'code.digits' => 'Please enter valid category code'
                            ])->validate();

        $this->category->update($validatedData);
        $this->dispatchBrowserEvent('hideForm', ['message' => 'Category Updated Successfully!']);
    }

    public function showDeleteConfirmation($id){
        $this->categoryToDelete = $id;
        $this->dispatchBrowserEvent('deleteConfirmation');
    }

    public function deleteCategory(){
        $category = Category::findOrFail($this->categoryToDelete);
        
        $category->delete();
        $this->dispatchBrowserEvent('deletedSuccessModal', ['message' => 'Category Deleted Successfully!']);
    }
    public function render()
    {
        $categories = Category::query()
        ->where('name', 'like', '%'. $this->searchTerm . '%')
        ->orWhere('code', 'like', '%'. $this->searchTerm . '%')
        ->latest()->paginate(20);

        return view('livewire.admin.categories.list-categories',
        [
            'categories' => $categories
        ]
    );
    }
}
