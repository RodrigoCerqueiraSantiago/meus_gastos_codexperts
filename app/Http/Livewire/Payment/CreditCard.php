<?php

namespace App\Http\Livewire\Payment;

use App\Models\User;
use App\Models\Plan;
use App\Services\PagSeguro\Credentials;
use App\Services\PagSeguro\Subscription\SubscriptionService;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class CreditCard extends Component
{
    public $sessionId;
    public $email;
    public $token;

    public Plan $plan;

    protected $listeners = [
        'paymentData' => 'proccessSubscription'
    ];

    public function mount(){

        $url = Credentials::getCredentials('/v2/sessions');
        $response = Http::post($url);
        $response = simplexml_load_string($response->body());
        $this->sessionId = (string) $response->id;

    }

    public function proccessSubscription($data){

        $data['plan_reference'] = $this->plan->reference;
        $makeSubscription = (new SubscriptionService($data))->makeSubscription();



        //Pegar o usuário autenticado
        $user = auth()->user();

        //Criar plano localmente
        $user->plan()->create([
            'plan_id' => $this->plan->id,
            'status'  => $makeSubscription['status'],
            'date_subscription' => (\DateTime::createFromFormat(DATE_ATOM,
                        $makeSubscription['date']))->format('Y-m-d H:i:s'),
            'reference_transaction' => $makeSubscription['code'],
        ]);

        session()->flash('message','Plano aderido com Sucesso');
    }

    public function render()
    {
        return view('livewire.payment.credit-card')->layout('layouts.front');
    }
}
