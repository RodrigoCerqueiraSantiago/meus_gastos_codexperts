<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use App\Services\PagSeguro\Plan\PlanCreateService;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PlanCreate extends Component
{
    public $plan = [];

    protected $rules=[
        'plan.name'=>'required',
        'plan.description'=>'required',
        'plan.price'=>'required',
        'plan.slug'=>'required',
    ];

    public function render()
    {
        return view('livewire.plan.plan-create');
    }

    public function createPlan(){

        $this->validate();

        $plan =$this->plan;

        $planPagSeguroReference = (new PlanCreateService())->makeRequest($plan);

        $plan['reference'] = $planPagSeguroReference;

        Plan::create($plan);

        $this->plan = []; //Limpando os campos(liveware)

        session()->flash('message', 'Plano criado com sucesso!');
    }
}
