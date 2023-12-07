<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserPlanTableAddColumnsStatusAndDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_plan', function (Blueprint $table){
            $table->string('status')->default('INITIATED');
            $table->dateTime('date_subscription')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_plan', function (Blueprint $table){
            $table->dropColumn('status');
            $table->dropColumn('date_subscription');
        });
    }

    /*
     * INITIATED	O comprador iniciou o processo de pagamento, mas abandonou o checkout e não concluiu a compra.
PENDING	O processo de pagamento foi concluído e transação está em análise ou aguardando a confirmação da operadora.
ACTIVE	A criação da recorrência, transação validadora ou transação recorrente foi aprovada.
PAYMENT_METHOD_CHANGE	Uma transação retornou como "Cartão Expirado, Cancelado ou Bloqueado" e o cartão da recorrência precisa ser substituído pelo comprador.
SUSPENDED	A recorrência foi suspensa pelo vendedor.
CANCELLED	A criação da recorrência foi cancelada pelo PagSeguro
CANCELLED_BY_RECEIVER	A recorrência foi cancelada a pedido do vendedor.
CANCELLED_BY_SENDER	A recorrência foi cancelada a pedido do comprador.
EXPIRED	A recorrência expirou por atingir a data limite da vigência ou por ter atingido o valor máximo de cobrança definido na cobrança do plano.*/
}
