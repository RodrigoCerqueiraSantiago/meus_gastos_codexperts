<?php

namespace App\Http\Livewire\Payment;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class CreditCard extends Component
{
    public $sessionId;
    public $email;
    public $token;

    public function mount(){

        $email = config('pagseguro.email');
        $token = config('pagseguro.token');
        $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions?email={$email}&token={$token}";
        $response = Http::post($url);
        $response = simplexml_load_string($response->body());
        $this->sessionId = (string) $response->id;
       // dd($this->sessionId);

    }
    public function render()
    {
        return view('livewire.payment.credit-card')->layout('layouts.front');
    }
}
