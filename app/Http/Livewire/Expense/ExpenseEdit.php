<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ExpenseEdit extends Component
{
    use WithFileUploads;

    public Expense $expense;
    public $description;
    public $amount;
    public $type;
    public $photo;

    protected $rules = [
        'amount'     => 'required|numeric',
        'type'       => 'required',
        'description'=> 'required',
        'photo'      => 'image|nullable',
    ];


    //mount é o contrutor de classes Components
    public function mount(Expense $expense){
        $this->description = $expense->description;
        $this->amount      = $expense->amount;
        $this->type        = $expense->type;
    }

    public function updateExpense(){

        $this->validate();

        //NO update, se user já postou uma photo, preciso remove-la e por a nova no update
        if($this->photo){
            if(Storage::disk('public')->exists($this->expense->photo)){
                Storage::disk('public')->delete($this->expense->photo);
            }
            $this->photo = $this->photo->store('expenses-photos','public');
        }

        //Fazendo atualização
        $this->expense->update([
            'description' => $this->description,
            'amount'      => $this->amount,
            'type '       => $this->type,
            //'photo'       => $this->photo ?? $this->expense->photo
            'photo' => isset($this->photo) ? $this->photo : $this->expense->photo

        ]);

        session()->flash('message','Registro atualizado com sucesso');
    }

    public function render()
    {
        return view('livewire.expense.expense-edit');
    }
}
