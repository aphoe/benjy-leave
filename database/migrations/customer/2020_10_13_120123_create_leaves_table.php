<?php

use App\Enums\LeaveStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leave_type_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('supervisor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('hr_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('reliever_id')->nullable()->constrained('users')->nullOnDelete();
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->dateTime('extension')->nullable();
            $table->unsignedTinyInteger('supervisor_status')->default(LeaveStatus::Pending);
            $table->unsignedTinyInteger('reliever_status')->default(LeaveStatus::Pending);
            $table->unsignedTinyInteger('status')->default(LeaveStatus::Pending);
            $table->boolean('taken')->default(false);
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
