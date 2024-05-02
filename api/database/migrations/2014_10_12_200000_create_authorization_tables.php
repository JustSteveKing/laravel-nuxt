<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('roles', static function (Blueprint $table): void {
            $table->uuid('id')->primary();

            $table->string('name')->unique()->index();
            $table->string('label')->nullable();

            $table->timestamps();
        });

        Schema::create('permissions', static function (Blueprint $table): void {
            $table->uuid('id')->primary();

            $table->string('name')->unique()->index();
            $table->string('label')->nullable();

            $table->timestamps();
        });

        Schema::create('permission_role', static function (Blueprint $table): void {
            $table
                ->foreignUuid('permission_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table
                ->foreignUuid('role_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->primary(['permission_id', 'role_id']);
        });

        Schema::create('permission_user', static function (Blueprint $table): void {
            $table
                ->foreignUuid('permission_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table
                ->foreignUuid('user_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->primary(['permission_id', 'user_id']);
        });

        Schema::create('role_user', static function (Blueprint $table): void {
            $table
                ->foreignUuid('role_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table
                ->foreignUuid('user_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->primary(['role_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('permission_user');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('roles');
    }
};
