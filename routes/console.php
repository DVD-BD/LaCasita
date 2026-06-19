<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('about:lacasita', function () {
    $this->info('La Casita Laravel Pro: autenticación, roles, MySQL y paneles protegidos.');
});
