<?php

use App\Models\StripeConfiguration;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStripeConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stripe_configurations', function (Blueprint $table) {
            $table->id();
            $table->mediumText('public_key')->nullable();
            $table->mediumText('secret_key')->nullable();
            $table->enum('payment_mode', ['test', 'live'])->nullable();
            $table->timestamps();
        });

        StripeConfiguration::create([
            'public_key' => 'pk_test_yKF28OfsGchVLbr4FmAH8x61002zuh3083',
            'secret_key' => 'sk_test_sQJFDUoOy3WAqtUupBH9V5aM00zebNYJaP',
            'payment_mode' => 'test',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stripe_configurations');
    }
}
