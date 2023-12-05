<?php

namespace App\Http\Livewire\Expense;

use Livewire\Component;
use App\Models\Expense;
use Livewire\WithFileUploads;  //Habilitas uploads no component do jeito do liveware

class ExpenseCreate extends Component
{
    use WithFileUploads;  //trait livewire -checar isso
    //Na classe do component, tudo que for public terá o match
    // com o componente na view
    public $amount;
    public $type;
    public $description;
    public $photo;
    public $expenseDate;


    protected $rules = [
        'amount'     => 'required|numeric',
        'type'       => 'required',
        'description'=> 'required',
        'photo'      => 'image|nullable'
    ];

    public function createExpense(){

        $this->validate();

        if($this->photo){
            $this->photo = $this->photo->store('expenses-photos','public');
        }

        auth()->user()->expenses()->create([
            'amount'     => $this->amount,
            'type'       => $this->type,
            'description'=> $this->description,
            'user_id'    => auth()->user()->id,
            'photo'      => $this->photo,
            'expense_date' => $this->expenseDate,
        ]);

        session()->flash('message', 'Registro criado com sucesso');
        //Zerando campos na view
        $this->amount = $this->type = $this->description =NULL;
    }

    public function render()
    {
        return view('livewire.expense.expense-create');
    }


}
