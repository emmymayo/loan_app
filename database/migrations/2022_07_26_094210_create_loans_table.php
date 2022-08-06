<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Loan;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('principal');
            $table->bigInteger('interest');
            $table->bigInteger('payment');
            $table->tinyInteger('interest_type')->default(Loan::INTEREST_TYPE_PERCENT);
            $table->tinyInteger('tenure');
            $table->boolean('compounding')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
