<?php

use Illuminate\Support\Str;
use App\Models\BusinessStore;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_stores', function (Blueprint $table) {
            $table->id();

            //User id as Foreign Key
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->text('store_name')
                ->unique()
                ->nullable();

            $table->longText('store_description')
                ->nullable();

            $table->string('slug')
                ->unique()->nullable();

            $table->boolean('display_cards')
                ->nullable();

            $table->boolean('display_store_name')
                ->nullable();

            $table->timestamps();
        });

        for ($business = 2; $business < 52; $business++) {
            BusinessStore::create([
                'user_id' => $business,
                'store_name' => 'Store' . $business,
                'store_description' => 'Store Description',
                'slug' => strtoupper(Str::random(20)),
                'display_cards' => true,
                'display_store_name' => true,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_stores');
    }
};
