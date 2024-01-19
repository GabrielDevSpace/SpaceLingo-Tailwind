<?php

// database/migrations/xxxx_xx_xx_create_contact_requests_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('contact_requests', function (Blueprint $table) {
            $table->id();
            $table->string('reason');
            $table->text('description');
            $table->string('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_requests');
    }
}
