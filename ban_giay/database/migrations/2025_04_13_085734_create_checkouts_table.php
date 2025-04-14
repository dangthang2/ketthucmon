<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->string('name');
            $table->enum('gender', ['Nam', 'Nữ'])->nullable();
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->text('notes')->nullable();
            $table->string('payment_method')->default('COD');

            $table->timestamps();

            // ✅ Liên kết đúng với bảng ban_giay
            $table->foreign('product_id')->references('id')->on('ban_giay')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
}
