<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->integer('expiration');
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->integer('expiration');
        });

        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue')->index();
            $table->longText('payload');
            $table->unsignedTinyInteger('attempts');
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });

        Schema::create('cliente', function (Blueprint $table) {
            $table->id('id_cliente');
            $table->string('nombre', 120);
            $table->string('telefono', 30)->nullable();
            $table->string('correo', 150)->unique();
            $table->string('ciudad', 80)->nullable();
            $table->string('codigo_postal', 12)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->enum('estado', ['Activo', 'Inactivo'])->default('Activo');
            $table->timestamps();
        });

        Schema::create('sucursal', function (Blueprint $table) {
            $table->id('id_sucursal');
            $table->string('nombre', 100);
            $table->string('direccion', 255);
            $table->string('telefono', 30)->nullable();
            $table->string('ciudad', 80)->nullable();
            $table->enum('estado', ['Activa', 'Inactiva'])->default('Activa');
            $table->decimal('latitud', 10, 7)->nullable();
            $table->decimal('longitud', 10, 7)->nullable();
            $table->string('url_maps', 500)->nullable();
            $table->timestamps();
        });

        Schema::create('puesto', function (Blueprint $table) {
            $table->id('id_puesto');
            $table->string('nombre', 80)->unique();
            $table->string('descripcion', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('empleado', function (Blueprint $table) {
            $table->id('id_empleado');
            $table->string('nombre', 120);
            $table->string('telefono', 30)->nullable();
            $table->string('correo', 150)->unique();
            $table->foreignId('id_puesto')->constrained('puesto', 'id_puesto')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('id_sucursal')->constrained('sucursal', 'id_sucursal')->cascadeOnUpdate()->restrictOnDelete();
            $table->enum('nivel_responsabilidad', ['Baja', 'Media', 'Alta'])->default('Media');
            $table->decimal('bono', 10, 2)->default(0);
            $table->enum('estado', ['Activo', 'Inactivo'])->default('Activo');
            $table->timestamps();
        });

        Schema::create('usuario', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre', 120);
            $table->string('correo', 150)->unique();
            $table->string('password_hash');
            $table->enum('rol', ['cliente', 'empleado', 'administrador'])->default('cliente');
            $table->foreignId('id_cliente')->nullable()->constrained('cliente', 'id_cliente')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_empleado')->nullable()->constrained('empleado', 'id_empleado')->cascadeOnUpdate()->nullOnDelete();
            $table->enum('estado', ['Activo', 'Inactivo', 'Bloqueado'])->default('Activo');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('categoria', function (Blueprint $table) {
            $table->id('id_categoria');
            $table->string('nombre', 80)->unique();
            $table->string('descripcion', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('proveedor', function (Blueprint $table) {
            $table->id('id_proveedor');
            $table->string('nombre', 120);
            $table->string('telefono', 30)->nullable();
            $table->string('correo', 150)->nullable();
            $table->string('ciudad', 80)->nullable();
            $table->string('codigo_postal', 12)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->enum('estado', ['Activo', 'Inactivo'])->default('Activo');
            $table->timestamps();
        });

        Schema::create('producto', function (Blueprint $table) {
            $table->id('id_producto');
            $table->foreignId('id_categoria')->constrained('categoria', 'id_categoria')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('id_proveedor')->nullable()->constrained('proveedor', 'id_proveedor')->cascadeOnUpdate()->nullOnDelete();
            $table->string('nombre', 120);
            $table->text('descripcion')->nullable();
            $table->string('codigo_barras', 40)->unique();
            $table->decimal('precio', 10, 2);
            $table->integer('stock')->default(0);
            $table->string('imagen', 255)->default('fondo.png');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        Schema::create('inventario', function (Blueprint $table) {
            $table->id('id_inventario');
            $table->foreignId('id_producto')->constrained('producto', 'id_producto')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_sucursal')->constrained('sucursal', 'id_sucursal')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('stock')->default(0);
            $table->integer('stock_minimo')->default(5);
            $table->unique(['id_producto', 'id_sucursal']);
            $table->timestamps();
        });

        Schema::create('metodo_pago', function (Blueprint $table) {
            $table->id('id_metodo');
            $table->string('nombre', 80);
            $table->string('tipo', 60)->nullable();
            $table->string('descripcion', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('promocion', function (Blueprint $table) {
            $table->id('id_promocion');
            $table->string('nombre', 120);
            $table->decimal('descuento', 5, 2);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->boolean('vigente')->default(true);
            $table->text('descripcion')->nullable();
            $table->string('imagen', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('producto_promocion', function (Blueprint $table) {
            $table->foreignId('id_producto')->constrained('producto', 'id_producto')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_promocion')->constrained('promocion', 'id_promocion')->cascadeOnUpdate()->cascadeOnDelete();
            $table->primary(['id_producto', 'id_promocion']);
        });

        Schema::create('venta', function (Blueprint $table) {
            $table->id('id_venta');
            $table->foreignId('id_cliente')->nullable()->constrained('cliente', 'id_cliente')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_empleado')->nullable()->constrained('empleado', 'id_empleado')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_sucursal')->constrained('sucursal', 'id_sucursal')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('id_metodo')->constrained('metodo_pago', 'id_metodo')->cascadeOnUpdate()->restrictOnDelete();
            $table->date('fecha');
            $table->time('hora');
            $table->enum('estado', ['Pendiente', 'Pagada', 'Cancelada'])->default('Pagada');
            $table->decimal('total', 10, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id('id_detalle_venta');
            $table->foreignId('id_venta')->constrained('venta', 'id_venta')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_producto')->constrained('producto', 'id_producto')->cascadeOnUpdate()->restrictOnDelete();
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->timestamps();
        });

        Schema::create('faq', function (Blueprint $table) {
            $table->id('id_faq');
            $table->string('pregunta', 255);
            $table->text('respuesta');
            $table->string('categoria', 80)->default('General');
            $table->boolean('visible')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faq');
        Schema::dropIfExists('detalle_venta');
        Schema::dropIfExists('venta');
        Schema::dropIfExists('producto_promocion');
        Schema::dropIfExists('promocion');
        Schema::dropIfExists('metodo_pago');
        Schema::dropIfExists('inventario');
        Schema::dropIfExists('producto');
        Schema::dropIfExists('proveedor');
        Schema::dropIfExists('categoria');
        Schema::dropIfExists('usuario');
        Schema::dropIfExists('empleado');
        Schema::dropIfExists('puesto');
        Schema::dropIfExists('sucursal');
        Schema::dropIfExists('cliente');
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('cache_locks');
        Schema::dropIfExists('cache');
        Schema::dropIfExists('sessions');
    }
};
