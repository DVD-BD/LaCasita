<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $seed = [
            'sucursales' => [
                [
                    'id' => 1,
                    'nombre' => 'Sucursal Centro',
                    'direccion' => 'Av. Principal 100, Centro Histórico',
                    'telefono' => '55 1000 2000',
                    'ciudad' => 'CDMX',
                    'estado' => 'Activa',
                    'latitud' => 19.432608,
                    'longitud' => -99.133209,
                    'url_maps' => 'https://www.google.com/maps?q=19.432608,-99.133209'
                ],
                [
                    'id' => 2,
                    'nombre' => 'Sucursal Norte',
                    'direccion' => 'Av. Montevideo 363, Lindavista',
                    'telefono' => '55 2222 1100',
                    'ciudad' => 'CDMX',
                    'estado' => 'Activa',
                    'latitud' => 19.489741,
                    'longitud' => -99.125541,
                    'url_maps' => 'https://www.google.com/maps?q=19.489741,-99.125541'
                ],
                [
                    'id' => 3,
                    'nombre' => 'Sucursal Sur',
                    'direccion' => 'Calz. Acoxpa 430, Coapa',
                    'telefono' => '55 3333 2200',
                    'ciudad' => 'CDMX',
                    'estado' => 'Activa',
                    'latitud' => 19.299583,
                    'longitud' => -99.136856,
                    'url_maps' => 'https://www.google.com/maps?q=19.299583,-99.136856'
                ],
                [
                    'id' => 4,
                    'nombre' => 'Sucursal Oriente',
                    'direccion' => 'Av. Tláhuac 4760, Iztapalapa',
                    'telefono' => '55 4444 2200',
                    'ciudad' => 'CDMX',
                    'estado' => 'Activa',
                    'latitud' => 19.357564,
                    'longitud' => -99.073195,
                    'url_maps' => 'https://www.google.com/maps?q=19.357564,-99.073195'
                ],
                [
                    'id' => 5,
                    'nombre' => 'Sucursal Poniente',
                    'direccion' => 'Av. Vasco de Quiroga 3800, Santa Fe',
                    'telefono' => '55 5555 3300',
                    'ciudad' => 'CDMX',
                    'estado' => 'Activa',
                    'latitud' => 19.36184,
                    'longitud' => -99.274108,
                    'url_maps' => 'https://www.google.com/maps?q=19.361840,-99.274108'
                ],
                [
                    'id' => 6,
                    'nombre' => 'Sucursal Coyoacán',
                    'direccion' => 'Miguel Ángel de Quevedo 687, Coyoacán',
                    'telefono' => '55 6666 4400',
                    'ciudad' => 'CDMX',
                    'estado' => 'Activa',
                    'latitud' => 19.3467,
                    'longitud' => -99.1629,
                    'url_maps' => 'https://www.google.com/maps?q=19.346700,-99.162900'
                ]
            ],
            'puestos' => [
                [
                    'id' => 1,
                    'nombre' => 'Cajero',
                    'descripcion' => 'Registra ventas y atiende pagos'
                ],
                [
                    'id' => 2,
                    'nombre' => 'Gerente',
                    'descripcion' => 'Supervisa empleados, ventas e inventario'
                ],
                [
                    'id' => 3,
                    'nombre' => 'Almacenista',
                    'descripcion' => 'Administra productos, stock y proveedores'
                ],
                [
                    'id' => 4,
                    'nombre' => 'Seguridad',
                    'descripcion' => 'Apoya el control de acceso y vigilancia'
                ],
                [
                    'id' => 5,
                    'nombre' => 'Personal_Limpieza',
                    'descripcion' => 'Mantiene el área asignada en condiciones adecuadas'
                ],
                [
                    'id' => 6,
                    'nombre' => 'Repartidor',
                    'descripcion' => 'Apoya entregas locales y pedidos'
                ],
                [
                    'id' => 7,
                    'nombre' => 'Supervisor de sucursal',
                    'descripcion' => 'Coordina la operación diaria de una sucursal'
                ]
            ],
            'clientes' => [
                [
                    'id' => 1,
                    'nombre' => 'Ana López',
                    'telefono' => '55 1234 5678',
                    'correo' => 'cliente@lacasita.com',
                    'ciudad' => 'CDMX',
                    'codigo_postal' => '09000',
                    'direccion' => 'Calle Magnolia 23',
                    'estado' => 'Activo'
                ],
                [
                    'id' => 2,
                    'nombre' => 'Carlos Méndez',
                    'telefono' => '55 8765 4321',
                    'correo' => 'carlos@mail.com',
                    'ciudad' => 'CDMX',
                    'codigo_postal' => '07800',
                    'direccion' => 'Av. Norte 77',
                    'estado' => 'Activo'
                ],
                [
                    'id' => 3,
                    'nombre' => 'Fernanda Salas',
                    'telefono' => '55 2468 1357',
                    'correo' => 'fernanda@mail.com',
                    'ciudad' => 'CDMX',
                    'codigo_postal' => '04400',
                    'direccion' => 'Calle Pacífico 120',
                    'estado' => 'Activo'
                ],
                [
                    'id' => 4,
                    'nombre' => 'Luis Hernández',
                    'telefono' => '55 1357 2468',
                    'correo' => 'luis@mail.com',
                    'ciudad' => 'CDMX',
                    'codigo_postal' => '01120',
                    'direccion' => 'Av. Observatorio 48',
                    'estado' => 'Activo'
                ]
            ],
            'empleados' => [
                [
                    'id' => 1,
                    'nombre' => 'Mariana Ruiz',
                    'telefono' => '55 1111 1111',
                    'correo' => 'admin@lacasita.com',
                    'id_puesto' => 2,
                    'id_sucursal' => 1,
                    'nivel_responsabilidad' => 'Alta',
                    'bono' => 2500,
                    'estado' => 'Activo'
                ],
                [
                    'id' => 2,
                    'nombre' => 'Jorge Pérez',
                    'telefono' => '55 2222 2222',
                    'correo' => 'empleado@lacasita.com',
                    'id_puesto' => 3,
                    'id_sucursal' => 1,
                    'nivel_responsabilidad' => 'Media',
                    'bono' => 900,
                    'estado' => 'Activo'
                ],
                [
                    'id' => 3,
                    'nombre' => 'Diana Torres',
                    'telefono' => '55 3333 3333',
                    'correo' => 'diana@lacasita.com',
                    'id_puesto' => 1,
                    'id_sucursal' => 2,
                    'nivel_responsabilidad' => 'Media',
                    'bono' => 750,
                    'estado' => 'Activo'
                ],
                [
                    'id' => 4,
                    'nombre' => 'Raúl Castillo',
                    'telefono' => '55 4444 4444',
                    'correo' => 'raul@lacasita.com',
                    'id_puesto' => 7,
                    'id_sucursal' => 4,
                    'nivel_responsabilidad' => 'Alta',
                    'bono' => 1600,
                    'estado' => 'Activo'
                ],
                [
                    'id' => 5,
                    'nombre' => 'Sofía Morales',
                    'telefono' => '55 5555 5555',
                    'correo' => 'sofia@lacasita.com',
                    'id_puesto' => 1,
                    'id_sucursal' => 3,
                    'nivel_responsabilidad' => 'Media',
                    'bono' => 650,
                    'estado' => 'Activo'
                ],
                [
                    'id' => 6,
                    'nombre' => 'Iván García',
                    'telefono' => '55 6666 6666',
                    'correo' => 'ivan@lacasita.com',
                    'id_puesto' => 6,
                    'id_sucursal' => 5,
                    'nivel_responsabilidad' => 'Baja',
                    'bono' => 500,
                    'estado' => 'Activo'
                ],
                [
                    'id' => 7,
                    'nombre' => 'Paola Jiménez',
                    'telefono' => '55 7777 7777',
                    'correo' => 'paola@lacasita.com',
                    'id_puesto' => 3,
                    'id_sucursal' => 6,
                    'nivel_responsabilidad' => 'Media',
                    'bono' => 850,
                    'estado' => 'Activo'
                ],
                [
                    'id' => 8,
                    'nombre' => 'Miguel Santos',
                    'telefono' => '55 8888 8888',
                    'correo' => 'miguel@lacasita.com',
                    'id_puesto' => 4,
                    'id_sucursal' => 2,
                    'nivel_responsabilidad' => 'Baja',
                    'bono' => 400,
                    'estado' => 'Activo'
                ]
            ],
            'usuarios' => [
                [
                    'id' => 1,
                    'nombre' => 'Mariana Ruiz',
                    'correo' => 'admin@lacasita.com',
                    'password' => '123456',
                    'rol' => 'administrador',
                    'id_empleado' => 1,
                    'id_cliente' => null,
                    'estado' => 'Activo'
                ],
                [
                    'id' => 2,
                    'nombre' => 'Jorge Pérez',
                    'correo' => 'empleado@lacasita.com',
                    'password' => '123456',
                    'rol' => 'empleado',
                    'id_empleado' => 2,
                    'id_cliente' => null,
                    'estado' => 'Activo'
                ],
                [
                    'id' => 3,
                    'nombre' => 'Ana López',
                    'correo' => 'cliente@lacasita.com',
                    'password' => '123456',
                    'rol' => 'cliente',
                    'id_empleado' => null,
                    'id_cliente' => 1,
                    'estado' => 'Activo'
                ],
                [
                    'id' => 4,
                    'nombre' => 'Diana Torres',
                    'correo' => 'diana@lacasita.com',
                    'password' => '123456',
                    'rol' => 'empleado',
                    'id_empleado' => 3,
                    'id_cliente' => null,
                    'estado' => 'Activo'
                ],
                [
                    'id' => 5,
                    'nombre' => 'Raúl Castillo',
                    'correo' => 'raul@lacasita.com',
                    'password' => '123456',
                    'rol' => 'empleado',
                    'id_empleado' => 4,
                    'id_cliente' => null,
                    'estado' => 'Activo'
                ]
            ],
            'categorias' => [
                [
                    'id' => 1,
                    'nombre' => 'Bebidas',
                    'descripcion' => 'Refrescos, café, agua, jugos y bebidas listas'
                ],
                [
                    'id' => 2,
                    'nombre' => 'Snacks',
                    'descripcion' => 'Botanas, papas, nachos, galletas y antojos'
                ],
                [
                    'id' => 3,
                    'nombre' => 'Frutas y verduras',
                    'descripcion' => 'Productos frescos de consumo diario'
                ],
                [
                    'id' => 4,
                    'nombre' => 'Limpieza',
                    'descripcion' => 'Productos para limpieza del hogar y negocio'
                ],
                [
                    'id' => 5,
                    'nombre' => 'Hogar',
                    'descripcion' => 'Artículos generales para casa'
                ],
                [
                    'id' => 6,
                    'nombre' => 'Abarrotes',
                    'descripcion' => 'Básicos de despensa como arroz, frijol, azúcar y aceite'
                ],
                [
                    'id' => 7,
                    'nombre' => 'Lácteos y refrigerados',
                    'descripcion' => 'Leche, queso y productos refrigerados'
                ],
                [
                    'id' => 8,
                    'nombre' => 'Panadería',
                    'descripcion' => 'Pan dulce, pan de caja y productos horneados'
                ],
                [
                    'id' => 9,
                    'nombre' => 'Higiene personal',
                    'descripcion' => 'Cuidado personal, jabón, shampoo y pasta dental'
                ],
                [
                    'id' => 10,
                    'nombre' => 'Dulcería',
                    'descripcion' => 'Chocolates y dulces de impulso'
                ],
                [
                    'id' => 11,
                    'nombre' => 'Mascotas',
                    'descripcion' => 'Productos básicos para mascotas'
                ]
            ],
            'proveedores' => [
                [
                    'id' => 1,
                    'nombre' => 'Distribuidora Sol',
                    'telefono' => '55 4444 1000',
                    'correo' => 'ventas@sol.com',
                    'ciudad' => 'CDMX',
                    'codigo_postal' => '06000',
                    'direccion' => 'Bodega 12, Central de Abasto',
                    'estado' => 'Activo'
                ],
                [
                    'id' => 2,
                    'nombre' => 'Abarrotes del Valle',
                    'telefono' => '55 5555 1200',
                    'correo' => 'contacto@valle.com',
                    'ciudad' => 'CDMX',
                    'codigo_postal' => '03100',
                    'direccion' => 'Eje 7 Sur 15, Del Valle',
                    'estado' => 'Activo'
                ],
                [
                    'id' => 3,
                    'nombre' => 'Limpieza Total',
                    'telefono' => '55 6666 1300',
                    'correo' => 'pedidos@limpiezatotal.com',
                    'ciudad' => 'CDMX',
                    'codigo_postal' => '09810',
                    'direccion' => 'Av. Industrial 88, Iztapalapa',
                    'estado' => 'Activo'
                ],
                [
                    'id' => 4,
                    'nombre' => 'Frescos La Merced',
                    'telefono' => '55 7777 1400',
                    'correo' => 'compras@frescoslamerced.com',
                    'ciudad' => 'CDMX',
                    'codigo_postal' => '15810',
                    'direccion' => 'Mercado de La Merced, Nave mayor',
                    'estado' => 'Activo'
                ],
                [
                    'id' => 5,
                    'nombre' => 'Lácteos Rivera',
                    'telefono' => '55 8888 1500',
                    'correo' => 'ventas@lacteosrivera.com',
                    'ciudad' => 'CDMX',
                    'codigo_postal' => '02000',
                    'direccion' => 'Calz. Vallejo 240',
                    'estado' => 'Activo'
                ],
                [
                    'id' => 6,
                    'nombre' => 'Panificadora Aurora',
                    'telefono' => '55 9999 1600',
                    'correo' => 'pedidos@panificadoraaurora.com',
                    'ciudad' => 'CDMX',
                    'codigo_postal' => '03660',
                    'direccion' => 'Av. Plutarco Elías Calles 517',
                    'estado' => 'Activo'
                ],
                [
                    'id' => 7,
                    'nombre' => 'Hogar Plus Mayoreo',
                    'telefono' => '55 1010 1700',
                    'correo' => 'mayoreo@hogarplus.com',
                    'ciudad' => 'CDMX',
                    'codigo_postal' => '11200',
                    'direccion' => 'Lago Alberto 320',
                    'estado' => 'Activo'
                ],
                [
                    'id' => 8,
                    'nombre' => 'Mascotas y Más',
                    'telefono' => '55 2020 1800',
                    'correo' => 'contacto@mascotasymas.com',
                    'ciudad' => 'CDMX',
                    'codigo_postal' => '04480',
                    'direccion' => 'Av. Universidad 1900',
                    'estado' => 'Activo'
                ]
            ],
            'productos' => [
                [
                    'id' => 1,
                    'nombre' => 'Agua natural',
                    'descripcion' => 'Botella de agua 1 L',
                    'codigo_barras' => '750100000001',
                    'precio' => 14.5,
                    'stock' => 180,
                    'id_categoria' => 1,
                    'id_proveedor' => 1,
                    'activo' => true,
                    'imagen' => 'agua.jpg'
                ],
                [
                    'id' => 2,
                    'nombre' => 'Café soluble',
                    'descripcion' => 'Frasco de café clásico 120 g',
                    'codigo_barras' => '750100000002',
                    'precio' => 62.0,
                    'stock' => 82,
                    'id_categoria' => 1,
                    'id_proveedor' => 2,
                    'activo' => true,
                    'imagen' => 'cafe.jpg'
                ],
                [
                    'id' => 3,
                    'nombre' => 'Chocolate',
                    'descripcion' => 'Barra de chocolate individual',
                    'codigo_barras' => '750100000003',
                    'precio' => 18.0,
                    'stock' => 140,
                    'id_categoria' => 10,
                    'id_proveedor' => 2,
                    'activo' => true,
                    'imagen' => 'chocolate.jpg'
                ],
                [
                    'id' => 4,
                    'nombre' => 'Refresco Coca-Cola',
                    'descripcion' => 'Refresco 600 ml',
                    'codigo_barras' => '750100000004',
                    'precio' => 19.0,
                    'stock' => 160,
                    'id_categoria' => 1,
                    'id_proveedor' => 1,
                    'activo' => true,
                    'imagen' => 'cocacola.jpg'
                ],
                [
                    'id' => 5,
                    'nombre' => 'Galletas',
                    'descripcion' => 'Paquete familiar de galletas',
                    'codigo_barras' => '750100000005',
                    'precio' => 27.5,
                    'stock' => 128,
                    'id_categoria' => 2,
                    'id_proveedor' => 2,
                    'activo' => true,
                    'imagen' => 'galletas.jpg'
                ],
                [
                    'id' => 6,
                    'nombre' => 'Jabón de tocador',
                    'descripcion' => 'Jabón antibacterial individual',
                    'codigo_barras' => '750100000006',
                    'precio' => 16.0,
                    'stock' => 150,
                    'id_categoria' => 9,
                    'id_proveedor' => 3,
                    'activo' => true,
                    'imagen' => 'jabon.jpg'
                ],
                [
                    'id' => 7,
                    'nombre' => 'Lechuga',
                    'descripcion' => 'Lechuga fresca por pieza',
                    'codigo_barras' => '750100000007',
                    'precio' => 21.0,
                    'stock' => 65,
                    'id_categoria' => 3,
                    'id_proveedor' => 4,
                    'activo' => true,
                    'imagen' => 'lechuga.jpg'
                ],
                [
                    'id' => 8,
                    'nombre' => 'Limpiador multiusos',
                    'descripcion' => 'Botella 1 L aroma cítrico',
                    'codigo_barras' => '750100000008',
                    'precio' => 34.0,
                    'stock' => 96,
                    'id_categoria' => 4,
                    'id_proveedor' => 3,
                    'activo' => true,
                    'imagen' => 'limpiadormultiusos.jpg'
                ],
                [
                    'id' => 9,
                    'nombre' => 'Manzana',
                    'descripcion' => 'Manzana roja por kg',
                    'codigo_barras' => '750100000009',
                    'precio' => 39.0,
                    'stock' => 72,
                    'id_categoria' => 3,
                    'id_proveedor' => 4,
                    'activo' => true,
                    'imagen' => 'manzana.jpg'
                ],
                [
                    'id' => 10,
                    'nombre' => 'Trapeador',
                    'descripcion' => 'Trapeador de microfibra',
                    'codigo_barras' => '750100000010',
                    'precio' => 48.0,
                    'stock' => 44,
                    'id_categoria' => 4,
                    'id_proveedor' => 3,
                    'activo' => true,
                    'imagen' => 'trapeador.jpg'
                ],
                [
                    'id' => 11,
                    'nombre' => 'Reloj de pared',
                    'descripcion' => 'Reloj decorativo para cocina',
                    'codigo_barras' => '750100000011',
                    'precio' => 119.0,
                    'stock' => 23,
                    'id_categoria' => 5,
                    'id_proveedor' => 7,
                    'activo' => true,
                    'imagen' => 'relojdepared.jpg'
                ],
                [
                    'id' => 12,
                    'nombre' => 'Papas fritas',
                    'descripcion' => 'Bolsa de papas 150 g',
                    'codigo_barras' => '750100000012',
                    'precio' => 22.0,
                    'stock' => 144,
                    'id_categoria' => 2,
                    'id_proveedor' => 2,
                    'activo' => true,
                    'imagen' => 'papasfritas.jpg'
                ],
                [
                    'id' => 13,
                    'nombre' => 'Refresco Pepsi',
                    'descripcion' => 'Refresco 600 ml',
                    'codigo_barras' => '750100000013',
                    'precio' => 18.5,
                    'stock' => 135,
                    'id_categoria' => 1,
                    'id_proveedor' => 1,
                    'activo' => true,
                    'imagen' => 'pepsi.jpg'
                ],
                [
                    'id' => 14,
                    'nombre' => 'Jugo de naranja',
                    'descripcion' => 'Jugo natural embotellado 500 ml',
                    'codigo_barras' => '750100000014',
                    'precio' => 24.0,
                    'stock' => 86,
                    'id_categoria' => 1,
                    'id_proveedor' => 1,
                    'activo' => true,
                    'imagen' => 'jugodenaranja.jpg'
                ],
                [
                    'id' => 15,
                    'nombre' => 'Nachos',
                    'descripcion' => 'Bolsa de nachos 180 g',
                    'codigo_barras' => '750100000015',
                    'precio' => 25.5,
                    'stock' => 118,
                    'id_categoria' => 2,
                    'id_proveedor' => 2,
                    'activo' => true,
                    'imagen' => 'nachos.jpg'
                ],
                [
                    'id' => 16,
                    'nombre' => 'Palomitas',
                    'descripcion' => 'Palomitas sabor mantequilla 100 g',
                    'codigo_barras' => '750100000016',
                    'precio' => 17.0,
                    'stock' => 110,
                    'id_categoria' => 2,
                    'id_proveedor' => 2,
                    'activo' => true,
                    'imagen' => 'palomitas.jpg'
                ],
                [
                    'id' => 17,
                    'nombre' => 'Plátano',
                    'descripcion' => 'Plátano por kg',
                    'codigo_barras' => '750100000017',
                    'precio' => 28.0,
                    'stock' => 78,
                    'id_categoria' => 3,
                    'id_proveedor' => 4,
                    'activo' => true,
                    'imagen' => 'platanos.jpg'
                ],
                [
                    'id' => 18,
                    'nombre' => 'Tomate rojo',
                    'descripcion' => 'Tomate saladet por kg',
                    'codigo_barras' => '750100000018',
                    'precio' => 32.0,
                    'stock' => 74,
                    'id_categoria' => 3,
                    'id_proveedor' => 4,
                    'activo' => true,
                    'imagen' => 'tomate.jpg'
                ],
                [
                    'id' => 19,
                    'nombre' => 'Zanahoria',
                    'descripcion' => 'Zanahoria por kg',
                    'codigo_barras' => '750100000019',
                    'precio' => 24.0,
                    'stock' => 66,
                    'id_categoria' => 3,
                    'id_proveedor' => 4,
                    'activo' => true,
                    'imagen' => 'zanahoria.jpg'
                ],
                [
                    'id' => 20,
                    'nombre' => 'Detergente líquido',
                    'descripcion' => 'Detergente para ropa 1 L',
                    'codigo_barras' => '750100000020',
                    'precio' => 46.0,
                    'stock' => 90,
                    'id_categoria' => 4,
                    'id_proveedor' => 3,
                    'activo' => true,
                    'imagen' => 'detergente.jpg'
                ],
                [
                    'id' => 21,
                    'nombre' => 'Escoba reforzada',
                    'descripcion' => 'Escoba para interiores',
                    'codigo_barras' => '750100000021',
                    'precio' => 42.0,
                    'stock' => 39,
                    'id_categoria' => 4,
                    'id_proveedor' => 3,
                    'activo' => true,
                    'imagen' => 'escoba.jpg'
                ],
                [
                    'id' => 22,
                    'nombre' => 'Cojín decorativo',
                    'descripcion' => 'Cojín para sala',
                    'codigo_barras' => '750100000022',
                    'precio' => 89.0,
                    'stock' => 30,
                    'id_categoria' => 5,
                    'id_proveedor' => 7,
                    'activo' => true,
                    'imagen' => 'cojin.jpg'
                ],
                [
                    'id' => 23,
                    'nombre' => 'Lámpara LED',
                    'descripcion' => 'Lámpara de mesa LED',
                    'codigo_barras' => '750100000023',
                    'precio' => 149.0,
                    'stock' => 24,
                    'id_categoria' => 5,
                    'id_proveedor' => 7,
                    'activo' => true,
                    'imagen' => 'lampara.jpg'
                ],
                [
                    'id' => 24,
                    'nombre' => 'Manta cobija',
                    'descripcion' => 'Manta cobija individual',
                    'codigo_barras' => '750100000024',
                    'precio' => 179.0,
                    'stock' => 26,
                    'id_categoria' => 5,
                    'id_proveedor' => 7,
                    'activo' => true,
                    'imagen' => 'mantacobija.jpg'
                ],
                [
                    'id' => 25,
                    'nombre' => 'Sábanas matrimoniales',
                    'descripcion' => 'Juego de sábanas matrimonial',
                    'codigo_barras' => '750100000025',
                    'precio' => 249.0,
                    'stock' => 18,
                    'id_categoria' => 5,
                    'id_proveedor' => 7,
                    'activo' => true,
                    'imagen' => 'sabanas.jpg'
                ],
                [
                    'id' => 26,
                    'nombre' => 'Arroz súper extra',
                    'descripcion' => 'Bolsa de arroz 1 kg',
                    'codigo_barras' => '750100000026',
                    'precio' => 31.0,
                    'stock' => 125,
                    'id_categoria' => 6,
                    'id_proveedor' => 2,
                    'activo' => true,
                    'imagen' => 'arroz.jpeg'
                ],
                [
                    'id' => 27,
                    'nombre' => 'Frijol negro',
                    'descripcion' => 'Bolsa de frijol 900 g',
                    'codigo_barras' => '750100000027',
                    'precio' => 38.0,
                    'stock' => 103,
                    'id_categoria' => 6,
                    'id_proveedor' => 2,
                    'activo' => true,
                    'imagen' => 'frijol.jpeg'
                ],
                [
                    'id' => 28,
                    'nombre' => 'Azúcar estándar',
                    'descripcion' => 'Bolsa de azúcar 1 kg',
                    'codigo_barras' => '750100000028',
                    'precio' => 29.0,
                    'stock' => 112,
                    'id_categoria' => 6,
                    'id_proveedor' => 2,
                    'activo' => true,
                    'imagen' => 'azucar.jpeg'
                ],
                [
                    'id' => 29,
                    'nombre' => 'Aceite vegetal',
                    'descripcion' => 'Botella de aceite 946 ml',
                    'codigo_barras' => '750100000029',
                    'precio' => 48.5,
                    'stock' => 98,
                    'id_categoria' => 6,
                    'id_proveedor' => 2,
                    'activo' => true,
                    'imagen' => 'aceite.jpg'
                ],
                [
                    'id' => 30,
                    'nombre' => 'Leche entera',
                    'descripcion' => 'Leche entera 1 L',
                    'codigo_barras' => '750100000030',
                    'precio' => 27.0,
                    'stock' => 92,
                    'id_categoria' => 7,
                    'id_proveedor' => 5,
                    'activo' => true,
                    'imagen' => 'fondo.png'
                ],
                [
                    'id' => 31,
                    'nombre' => 'Queso panela',
                    'descripcion' => 'Queso panela 400 g',
                    'codigo_barras' => '750100000031',
                    'precio' => 69.0,
                    'stock' => 40,
                    'id_categoria' => 7,
                    'id_proveedor' => 5,
                    'activo' => true,
                    'imagen' => 'queso.jfif'
                ],
                [
                    'id' => 32,
                    'nombre' => 'Pan dulce surtido',
                    'descripcion' => 'Charola de pan dulce',
                    'codigo_barras' => '750100000032',
                    'precio' => 45.0,
                    'stock' => 55,
                    'id_categoria' => 8,
                    'id_proveedor' => 6,
                    'activo' => true,
                    'imagen' => 'pan.jpg'
                ],
                [
                    'id' => 33,
                    'nombre' => 'Pan de caja',
                    'descripcion' => 'Pan blanco familiar',
                    'codigo_barras' => '750100000033',
                    'precio' => 49.0,
                    'stock' => 60,
                    'id_categoria' => 8,
                    'id_proveedor' => 6,
                    'activo' => true,
                    'imagen' => 'pancaja.jpg'
                ],
                [
                    'id' => 34,
                    'nombre' => 'Pasta dental',
                    'descripcion' => 'Pasta dental 100 ml',
                    'codigo_barras' => '750100000034',
                    'precio' => 36.0,
                    'stock' => 76,
                    'id_categoria' => 9,
                    'id_proveedor' => 3,
                    'activo' => true,
                    'imagen' => 'pasta.jpeg'
                ],
                [
                    'id' => 35,
                    'nombre' => 'Shampoo familiar',
                    'descripcion' => 'Shampoo 750 ml',
                    'codigo_barras' => '750100000035',
                    'precio' => 78.0,
                    'stock' => 58,
                    'id_categoria' => 9,
                    'id_proveedor' => 3,
                    'activo' => true,
                    'imagen' => 'shampoo.jpg'
                ],
                [
                    'id' => 36,
                    'nombre' => 'Croquetas adulto',
                    'descripcion' => 'Bolsa de croquetas 2 kg',
                    'codigo_barras' => '750100000036',
                    'precio' => 139.0,
                    'stock' => 34,
                    'id_categoria' => 11,
                    'id_proveedor' => 8,
                    'activo' => true,
                    'imagen' => 'croquetas.jpg'
                ]
            ],
            'inventario' => [
                [
                    'id' => 1,
                    'id_producto' => 1,
                    'id_sucursal' => 1,
                    'stock' => 51,
                    'stock_minimo' => 9
                ],
                [
                    'id' => 2,
                    'id_producto' => 1,
                    'id_sucursal' => 2,
                    'stock' => 26,
                    'stock_minimo' => 9
                ],
                [
                    'id' => 3,
                    'id_producto' => 1,
                    'id_sucursal' => 3,
                    'stock' => 26,
                    'stock_minimo' => 9
                ],
                [
                    'id' => 4,
                    'id_producto' => 1,
                    'id_sucursal' => 4,
                    'stock' => 26,
                    'stock_minimo' => 9
                ],
                [
                    'id' => 5,
                    'id_producto' => 1,
                    'id_sucursal' => 5,
                    'stock' => 26,
                    'stock_minimo' => 9
                ],
                [
                    'id' => 6,
                    'id_producto' => 1,
                    'id_sucursal' => 6,
                    'stock' => 25,
                    'stock_minimo' => 9
                ],
                [
                    'id' => 7,
                    'id_producto' => 2,
                    'id_sucursal' => 1,
                    'stock' => 23,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 8,
                    'id_producto' => 2,
                    'id_sucursal' => 2,
                    'stock' => 12,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 9,
                    'id_producto' => 2,
                    'id_sucursal' => 3,
                    'stock' => 12,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 10,
                    'id_producto' => 2,
                    'id_sucursal' => 4,
                    'stock' => 12,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 11,
                    'id_producto' => 2,
                    'id_sucursal' => 5,
                    'stock' => 12,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 12,
                    'id_producto' => 2,
                    'id_sucursal' => 6,
                    'stock' => 11,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 13,
                    'id_producto' => 3,
                    'id_sucursal' => 1,
                    'stock' => 40,
                    'stock_minimo' => 7
                ],
                [
                    'id' => 14,
                    'id_producto' => 3,
                    'id_sucursal' => 2,
                    'stock' => 20,
                    'stock_minimo' => 7
                ],
                [
                    'id' => 15,
                    'id_producto' => 3,
                    'id_sucursal' => 3,
                    'stock' => 20,
                    'stock_minimo' => 7
                ],
                [
                    'id' => 16,
                    'id_producto' => 3,
                    'id_sucursal' => 4,
                    'stock' => 20,
                    'stock_minimo' => 7
                ],
                [
                    'id' => 17,
                    'id_producto' => 3,
                    'id_sucursal' => 5,
                    'stock' => 20,
                    'stock_minimo' => 7
                ],
                [
                    'id' => 18,
                    'id_producto' => 3,
                    'id_sucursal' => 6,
                    'stock' => 20,
                    'stock_minimo' => 7
                ],
                [
                    'id' => 19,
                    'id_producto' => 4,
                    'id_sucursal' => 1,
                    'stock' => 46,
                    'stock_minimo' => 8
                ],
                [
                    'id' => 20,
                    'id_producto' => 4,
                    'id_sucursal' => 2,
                    'stock' => 23,
                    'stock_minimo' => 8
                ],
                [
                    'id' => 21,
                    'id_producto' => 4,
                    'id_sucursal' => 3,
                    'stock' => 23,
                    'stock_minimo' => 8
                ],
                [
                    'id' => 22,
                    'id_producto' => 4,
                    'id_sucursal' => 4,
                    'stock' => 23,
                    'stock_minimo' => 8
                ],
                [
                    'id' => 23,
                    'id_producto' => 4,
                    'id_sucursal' => 5,
                    'stock' => 23,
                    'stock_minimo' => 8
                ],
                [
                    'id' => 24,
                    'id_producto' => 4,
                    'id_sucursal' => 6,
                    'stock' => 22,
                    'stock_minimo' => 8
                ],
                [
                    'id' => 25,
                    'id_producto' => 5,
                    'id_sucursal' => 1,
                    'stock' => 37,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 26,
                    'id_producto' => 5,
                    'id_sucursal' => 2,
                    'stock' => 18,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 27,
                    'id_producto' => 5,
                    'id_sucursal' => 3,
                    'stock' => 18,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 28,
                    'id_producto' => 5,
                    'id_sucursal' => 4,
                    'stock' => 18,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 29,
                    'id_producto' => 5,
                    'id_sucursal' => 5,
                    'stock' => 18,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 30,
                    'id_producto' => 5,
                    'id_sucursal' => 6,
                    'stock' => 19,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 31,
                    'id_producto' => 6,
                    'id_sucursal' => 1,
                    'stock' => 43,
                    'stock_minimo' => 8
                ],
                [
                    'id' => 32,
                    'id_producto' => 6,
                    'id_sucursal' => 2,
                    'stock' => 21,
                    'stock_minimo' => 8
                ],
                [
                    'id' => 33,
                    'id_producto' => 6,
                    'id_sucursal' => 3,
                    'stock' => 21,
                    'stock_minimo' => 8
                ],
                [
                    'id' => 34,
                    'id_producto' => 6,
                    'id_sucursal' => 4,
                    'stock' => 21,
                    'stock_minimo' => 8
                ],
                [
                    'id' => 35,
                    'id_producto' => 6,
                    'id_sucursal' => 5,
                    'stock' => 21,
                    'stock_minimo' => 8
                ],
                [
                    'id' => 36,
                    'id_producto' => 6,
                    'id_sucursal' => 6,
                    'stock' => 23,
                    'stock_minimo' => 8
                ],
                [
                    'id' => 37,
                    'id_producto' => 7,
                    'id_sucursal' => 1,
                    'stock' => 19,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 38,
                    'id_producto' => 7,
                    'id_sucursal' => 2,
                    'stock' => 9,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 39,
                    'id_producto' => 7,
                    'id_sucursal' => 3,
                    'stock' => 9,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 40,
                    'id_producto' => 7,
                    'id_sucursal' => 4,
                    'stock' => 9,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 41,
                    'id_producto' => 7,
                    'id_sucursal' => 5,
                    'stock' => 9,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 42,
                    'id_producto' => 7,
                    'id_sucursal' => 6,
                    'stock' => 10,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 43,
                    'id_producto' => 8,
                    'id_sucursal' => 1,
                    'stock' => 27,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 44,
                    'id_producto' => 8,
                    'id_sucursal' => 2,
                    'stock' => 14,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 45,
                    'id_producto' => 8,
                    'id_sucursal' => 3,
                    'stock' => 14,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 46,
                    'id_producto' => 8,
                    'id_sucursal' => 4,
                    'stock' => 14,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 47,
                    'id_producto' => 8,
                    'id_sucursal' => 5,
                    'stock' => 14,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 48,
                    'id_producto' => 8,
                    'id_sucursal' => 6,
                    'stock' => 13,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 49,
                    'id_producto' => 9,
                    'id_sucursal' => 1,
                    'stock' => 21,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 50,
                    'id_producto' => 9,
                    'id_sucursal' => 2,
                    'stock' => 10,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 51,
                    'id_producto' => 9,
                    'id_sucursal' => 3,
                    'stock' => 10,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 52,
                    'id_producto' => 9,
                    'id_sucursal' => 4,
                    'stock' => 10,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 53,
                    'id_producto' => 9,
                    'id_sucursal' => 5,
                    'stock' => 10,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 54,
                    'id_producto' => 9,
                    'id_sucursal' => 6,
                    'stock' => 11,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 55,
                    'id_producto' => 10,
                    'id_sucursal' => 1,
                    'stock' => 13,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 56,
                    'id_producto' => 10,
                    'id_sucursal' => 2,
                    'stock' => 6,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 57,
                    'id_producto' => 10,
                    'id_sucursal' => 3,
                    'stock' => 6,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 58,
                    'id_producto' => 10,
                    'id_sucursal' => 4,
                    'stock' => 6,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 59,
                    'id_producto' => 10,
                    'id_sucursal' => 5,
                    'stock' => 6,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 60,
                    'id_producto' => 10,
                    'id_sucursal' => 6,
                    'stock' => 7,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 61,
                    'id_producto' => 11,
                    'id_sucursal' => 1,
                    'stock' => 7,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 62,
                    'id_producto' => 11,
                    'id_sucursal' => 2,
                    'stock' => 3,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 63,
                    'id_producto' => 11,
                    'id_sucursal' => 3,
                    'stock' => 3,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 64,
                    'id_producto' => 11,
                    'id_sucursal' => 4,
                    'stock' => 3,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 65,
                    'id_producto' => 11,
                    'id_sucursal' => 5,
                    'stock' => 3,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 66,
                    'id_producto' => 11,
                    'id_sucursal' => 6,
                    'stock' => 4,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 67,
                    'id_producto' => 12,
                    'id_sucursal' => 1,
                    'stock' => 41,
                    'stock_minimo' => 7
                ],
                [
                    'id' => 68,
                    'id_producto' => 12,
                    'id_sucursal' => 2,
                    'stock' => 21,
                    'stock_minimo' => 7
                ],
                [
                    'id' => 69,
                    'id_producto' => 12,
                    'id_sucursal' => 3,
                    'stock' => 21,
                    'stock_minimo' => 7
                ],
                [
                    'id' => 70,
                    'id_producto' => 12,
                    'id_sucursal' => 4,
                    'stock' => 21,
                    'stock_minimo' => 7
                ],
                [
                    'id' => 71,
                    'id_producto' => 12,
                    'id_sucursal' => 5,
                    'stock' => 21,
                    'stock_minimo' => 7
                ],
                [
                    'id' => 72,
                    'id_producto' => 12,
                    'id_sucursal' => 6,
                    'stock' => 19,
                    'stock_minimo' => 7
                ],
                [
                    'id' => 73,
                    'id_producto' => 13,
                    'id_sucursal' => 1,
                    'stock' => 39,
                    'stock_minimo' => 7
                ],
                [
                    'id' => 74,
                    'id_producto' => 13,
                    'id_sucursal' => 2,
                    'stock' => 19,
                    'stock_minimo' => 7
                ],
                [
                    'id' => 75,
                    'id_producto' => 13,
                    'id_sucursal' => 3,
                    'stock' => 19,
                    'stock_minimo' => 7
                ],
                [
                    'id' => 76,
                    'id_producto' => 13,
                    'id_sucursal' => 4,
                    'stock' => 19,
                    'stock_minimo' => 7
                ],
                [
                    'id' => 77,
                    'id_producto' => 13,
                    'id_sucursal' => 5,
                    'stock' => 19,
                    'stock_minimo' => 7
                ],
                [
                    'id' => 78,
                    'id_producto' => 13,
                    'id_sucursal' => 6,
                    'stock' => 20,
                    'stock_minimo' => 7
                ],
                [
                    'id' => 79,
                    'id_producto' => 14,
                    'id_sucursal' => 1,
                    'stock' => 25,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 80,
                    'id_producto' => 14,
                    'id_sucursal' => 2,
                    'stock' => 12,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 81,
                    'id_producto' => 14,
                    'id_sucursal' => 3,
                    'stock' => 12,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 82,
                    'id_producto' => 14,
                    'id_sucursal' => 4,
                    'stock' => 12,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 83,
                    'id_producto' => 14,
                    'id_sucursal' => 5,
                    'stock' => 12,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 84,
                    'id_producto' => 14,
                    'id_sucursal' => 6,
                    'stock' => 13,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 85,
                    'id_producto' => 15,
                    'id_sucursal' => 1,
                    'stock' => 34,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 86,
                    'id_producto' => 15,
                    'id_sucursal' => 2,
                    'stock' => 17,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 87,
                    'id_producto' => 15,
                    'id_sucursal' => 3,
                    'stock' => 17,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 88,
                    'id_producto' => 15,
                    'id_sucursal' => 4,
                    'stock' => 17,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 89,
                    'id_producto' => 15,
                    'id_sucursal' => 5,
                    'stock' => 17,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 90,
                    'id_producto' => 15,
                    'id_sucursal' => 6,
                    'stock' => 16,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 91,
                    'id_producto' => 16,
                    'id_sucursal' => 1,
                    'stock' => 31,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 92,
                    'id_producto' => 16,
                    'id_sucursal' => 2,
                    'stock' => 16,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 93,
                    'id_producto' => 16,
                    'id_sucursal' => 3,
                    'stock' => 16,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 94,
                    'id_producto' => 16,
                    'id_sucursal' => 4,
                    'stock' => 16,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 95,
                    'id_producto' => 16,
                    'id_sucursal' => 5,
                    'stock' => 16,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 96,
                    'id_producto' => 16,
                    'id_sucursal' => 6,
                    'stock' => 15,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 97,
                    'id_producto' => 17,
                    'id_sucursal' => 1,
                    'stock' => 22,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 98,
                    'id_producto' => 17,
                    'id_sucursal' => 2,
                    'stock' => 11,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 99,
                    'id_producto' => 17,
                    'id_sucursal' => 3,
                    'stock' => 11,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 100,
                    'id_producto' => 17,
                    'id_sucursal' => 4,
                    'stock' => 11,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 101,
                    'id_producto' => 17,
                    'id_sucursal' => 5,
                    'stock' => 11,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 102,
                    'id_producto' => 17,
                    'id_sucursal' => 6,
                    'stock' => 12,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 103,
                    'id_producto' => 18,
                    'id_sucursal' => 1,
                    'stock' => 21,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 104,
                    'id_producto' => 18,
                    'id_sucursal' => 2,
                    'stock' => 11,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 105,
                    'id_producto' => 18,
                    'id_sucursal' => 3,
                    'stock' => 11,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 106,
                    'id_producto' => 18,
                    'id_sucursal' => 4,
                    'stock' => 11,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 107,
                    'id_producto' => 18,
                    'id_sucursal' => 5,
                    'stock' => 11,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 108,
                    'id_producto' => 18,
                    'id_sucursal' => 6,
                    'stock' => 9,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 109,
                    'id_producto' => 19,
                    'id_sucursal' => 1,
                    'stock' => 19,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 110,
                    'id_producto' => 19,
                    'id_sucursal' => 2,
                    'stock' => 9,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 111,
                    'id_producto' => 19,
                    'id_sucursal' => 3,
                    'stock' => 9,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 112,
                    'id_producto' => 19,
                    'id_sucursal' => 4,
                    'stock' => 9,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 113,
                    'id_producto' => 19,
                    'id_sucursal' => 5,
                    'stock' => 9,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 114,
                    'id_producto' => 19,
                    'id_sucursal' => 6,
                    'stock' => 11,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 115,
                    'id_producto' => 20,
                    'id_sucursal' => 1,
                    'stock' => 26,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 116,
                    'id_producto' => 20,
                    'id_sucursal' => 2,
                    'stock' => 13,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 117,
                    'id_producto' => 20,
                    'id_sucursal' => 3,
                    'stock' => 13,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 118,
                    'id_producto' => 20,
                    'id_sucursal' => 4,
                    'stock' => 13,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 119,
                    'id_producto' => 20,
                    'id_sucursal' => 5,
                    'stock' => 13,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 120,
                    'id_producto' => 20,
                    'id_sucursal' => 6,
                    'stock' => 12,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 121,
                    'id_producto' => 21,
                    'id_sucursal' => 1,
                    'stock' => 11,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 122,
                    'id_producto' => 21,
                    'id_sucursal' => 2,
                    'stock' => 6,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 123,
                    'id_producto' => 21,
                    'id_sucursal' => 3,
                    'stock' => 6,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 124,
                    'id_producto' => 21,
                    'id_sucursal' => 4,
                    'stock' => 6,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 125,
                    'id_producto' => 21,
                    'id_sucursal' => 5,
                    'stock' => 6,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 126,
                    'id_producto' => 21,
                    'id_sucursal' => 6,
                    'stock' => 4,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 127,
                    'id_producto' => 22,
                    'id_sucursal' => 1,
                    'stock' => 9,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 128,
                    'id_producto' => 22,
                    'id_sucursal' => 2,
                    'stock' => 4,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 129,
                    'id_producto' => 22,
                    'id_sucursal' => 3,
                    'stock' => 4,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 130,
                    'id_producto' => 22,
                    'id_sucursal' => 4,
                    'stock' => 4,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 131,
                    'id_producto' => 22,
                    'id_sucursal' => 5,
                    'stock' => 4,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 132,
                    'id_producto' => 22,
                    'id_sucursal' => 6,
                    'stock' => 5,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 133,
                    'id_producto' => 23,
                    'id_sucursal' => 1,
                    'stock' => 7,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 134,
                    'id_producto' => 23,
                    'id_sucursal' => 2,
                    'stock' => 3,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 135,
                    'id_producto' => 23,
                    'id_sucursal' => 3,
                    'stock' => 3,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 136,
                    'id_producto' => 23,
                    'id_sucursal' => 4,
                    'stock' => 3,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 137,
                    'id_producto' => 23,
                    'id_sucursal' => 5,
                    'stock' => 3,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 138,
                    'id_producto' => 23,
                    'id_sucursal' => 6,
                    'stock' => 5,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 139,
                    'id_producto' => 24,
                    'id_sucursal' => 1,
                    'stock' => 7,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 140,
                    'id_producto' => 24,
                    'id_sucursal' => 2,
                    'stock' => 4,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 141,
                    'id_producto' => 24,
                    'id_sucursal' => 3,
                    'stock' => 4,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 142,
                    'id_producto' => 24,
                    'id_sucursal' => 4,
                    'stock' => 4,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 143,
                    'id_producto' => 24,
                    'id_sucursal' => 5,
                    'stock' => 4,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 144,
                    'id_producto' => 24,
                    'id_sucursal' => 6,
                    'stock' => 3,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 145,
                    'id_producto' => 25,
                    'id_sucursal' => 1,
                    'stock' => 5,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 146,
                    'id_producto' => 25,
                    'id_sucursal' => 2,
                    'stock' => 3,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 147,
                    'id_producto' => 25,
                    'id_sucursal' => 3,
                    'stock' => 3,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 148,
                    'id_producto' => 25,
                    'id_sucursal' => 4,
                    'stock' => 3,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 149,
                    'id_producto' => 25,
                    'id_sucursal' => 5,
                    'stock' => 3,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 150,
                    'id_producto' => 25,
                    'id_sucursal' => 6,
                    'stock' => 1,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 151,
                    'id_producto' => 26,
                    'id_sucursal' => 1,
                    'stock' => 36,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 152,
                    'id_producto' => 26,
                    'id_sucursal' => 2,
                    'stock' => 18,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 153,
                    'id_producto' => 26,
                    'id_sucursal' => 3,
                    'stock' => 18,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 154,
                    'id_producto' => 26,
                    'id_sucursal' => 4,
                    'stock' => 18,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 155,
                    'id_producto' => 26,
                    'id_sucursal' => 5,
                    'stock' => 18,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 156,
                    'id_producto' => 26,
                    'id_sucursal' => 6,
                    'stock' => 17,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 157,
                    'id_producto' => 27,
                    'id_sucursal' => 1,
                    'stock' => 29,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 158,
                    'id_producto' => 27,
                    'id_sucursal' => 2,
                    'stock' => 15,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 159,
                    'id_producto' => 27,
                    'id_sucursal' => 3,
                    'stock' => 15,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 160,
                    'id_producto' => 27,
                    'id_sucursal' => 4,
                    'stock' => 15,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 161,
                    'id_producto' => 27,
                    'id_sucursal' => 5,
                    'stock' => 15,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 162,
                    'id_producto' => 27,
                    'id_sucursal' => 6,
                    'stock' => 14,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 163,
                    'id_producto' => 28,
                    'id_sucursal' => 1,
                    'stock' => 32,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 164,
                    'id_producto' => 28,
                    'id_sucursal' => 2,
                    'stock' => 16,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 165,
                    'id_producto' => 28,
                    'id_sucursal' => 3,
                    'stock' => 16,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 166,
                    'id_producto' => 28,
                    'id_sucursal' => 4,
                    'stock' => 16,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 167,
                    'id_producto' => 28,
                    'id_sucursal' => 5,
                    'stock' => 16,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 168,
                    'id_producto' => 28,
                    'id_sucursal' => 6,
                    'stock' => 16,
                    'stock_minimo' => 6
                ],
                [
                    'id' => 169,
                    'id_producto' => 29,
                    'id_sucursal' => 1,
                    'stock' => 28,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 170,
                    'id_producto' => 29,
                    'id_sucursal' => 2,
                    'stock' => 14,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 171,
                    'id_producto' => 29,
                    'id_sucursal' => 3,
                    'stock' => 14,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 172,
                    'id_producto' => 29,
                    'id_sucursal' => 4,
                    'stock' => 14,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 173,
                    'id_producto' => 29,
                    'id_sucursal' => 5,
                    'stock' => 14,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 174,
                    'id_producto' => 29,
                    'id_sucursal' => 6,
                    'stock' => 14,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 175,
                    'id_producto' => 30,
                    'id_sucursal' => 1,
                    'stock' => 26,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 176,
                    'id_producto' => 30,
                    'id_sucursal' => 2,
                    'stock' => 13,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 177,
                    'id_producto' => 30,
                    'id_sucursal' => 3,
                    'stock' => 13,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 178,
                    'id_producto' => 30,
                    'id_sucursal' => 4,
                    'stock' => 13,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 179,
                    'id_producto' => 30,
                    'id_sucursal' => 5,
                    'stock' => 13,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 180,
                    'id_producto' => 30,
                    'id_sucursal' => 6,
                    'stock' => 14,
                    'stock_minimo' => 5
                ],
                [
                    'id' => 181,
                    'id_producto' => 31,
                    'id_sucursal' => 1,
                    'stock' => 11,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 182,
                    'id_producto' => 31,
                    'id_sucursal' => 2,
                    'stock' => 6,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 183,
                    'id_producto' => 31,
                    'id_sucursal' => 3,
                    'stock' => 6,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 184,
                    'id_producto' => 31,
                    'id_sucursal' => 4,
                    'stock' => 6,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 185,
                    'id_producto' => 31,
                    'id_sucursal' => 5,
                    'stock' => 6,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 186,
                    'id_producto' => 31,
                    'id_sucursal' => 6,
                    'stock' => 5,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 187,
                    'id_producto' => 32,
                    'id_sucursal' => 1,
                    'stock' => 16,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 188,
                    'id_producto' => 32,
                    'id_sucursal' => 2,
                    'stock' => 8,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 189,
                    'id_producto' => 32,
                    'id_sucursal' => 3,
                    'stock' => 8,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 190,
                    'id_producto' => 32,
                    'id_sucursal' => 4,
                    'stock' => 8,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 191,
                    'id_producto' => 32,
                    'id_sucursal' => 5,
                    'stock' => 8,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 192,
                    'id_producto' => 32,
                    'id_sucursal' => 6,
                    'stock' => 7,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 193,
                    'id_producto' => 33,
                    'id_sucursal' => 1,
                    'stock' => 17,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 194,
                    'id_producto' => 33,
                    'id_sucursal' => 2,
                    'stock' => 9,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 195,
                    'id_producto' => 33,
                    'id_sucursal' => 3,
                    'stock' => 9,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 196,
                    'id_producto' => 33,
                    'id_sucursal' => 4,
                    'stock' => 9,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 197,
                    'id_producto' => 33,
                    'id_sucursal' => 5,
                    'stock' => 9,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 198,
                    'id_producto' => 33,
                    'id_sucursal' => 6,
                    'stock' => 7,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 199,
                    'id_producto' => 34,
                    'id_sucursal' => 1,
                    'stock' => 22,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 200,
                    'id_producto' => 34,
                    'id_sucursal' => 2,
                    'stock' => 11,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 201,
                    'id_producto' => 34,
                    'id_sucursal' => 3,
                    'stock' => 11,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 202,
                    'id_producto' => 34,
                    'id_sucursal' => 4,
                    'stock' => 11,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 203,
                    'id_producto' => 34,
                    'id_sucursal' => 5,
                    'stock' => 11,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 204,
                    'id_producto' => 34,
                    'id_sucursal' => 6,
                    'stock' => 10,
                    'stock_minimo' => 4
                ],
                [
                    'id' => 205,
                    'id_producto' => 35,
                    'id_sucursal' => 1,
                    'stock' => 17,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 206,
                    'id_producto' => 35,
                    'id_sucursal' => 2,
                    'stock' => 8,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 207,
                    'id_producto' => 35,
                    'id_sucursal' => 3,
                    'stock' => 8,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 208,
                    'id_producto' => 35,
                    'id_sucursal' => 4,
                    'stock' => 8,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 209,
                    'id_producto' => 35,
                    'id_sucursal' => 5,
                    'stock' => 8,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 210,
                    'id_producto' => 35,
                    'id_sucursal' => 6,
                    'stock' => 9,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 211,
                    'id_producto' => 36,
                    'id_sucursal' => 1,
                    'stock' => 10,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 212,
                    'id_producto' => 36,
                    'id_sucursal' => 2,
                    'stock' => 5,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 213,
                    'id_producto' => 36,
                    'id_sucursal' => 3,
                    'stock' => 5,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 214,
                    'id_producto' => 36,
                    'id_sucursal' => 4,
                    'stock' => 5,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 215,
                    'id_producto' => 36,
                    'id_sucursal' => 5,
                    'stock' => 5,
                    'stock_minimo' => 3
                ],
                [
                    'id' => 216,
                    'id_producto' => 36,
                    'id_sucursal' => 6,
                    'stock' => 4,
                    'stock_minimo' => 3
                ]
            ],
            'promociones' => [
                [
                    'id' => 1,
                    'nombre' => 'Semana del ahorro',
                    'descuento' => 15,
                    'fecha_inicio' => '2026-05-01',
                    'fecha_fin' => '2026-05-31',
                    'vigente' => true,
                    'descripcion' => 'Descuento en productos seleccionados de despensa y snacks',
                    'imagen' => 'promo1.jpeg'
                ],
                [
                    'id' => 2,
                    'nombre' => 'Limpieza en casa',
                    'descuento' => 10,
                    'fecha_inicio' => '2026-05-10',
                    'fecha_fin' => '2026-06-10',
                    'vigente' => true,
                    'descripcion' => 'Promoción para artículos de limpieza',
                    'imagen' => 'promo2.jpeg'
                ],
                [
                    'id' => 3,
                    'nombre' => 'Combo botanas',
                    'descuento' => 12,
                    'fecha_inicio' => '2026-05-15',
                    'fecha_fin' => '2026-06-15',
                    'vigente' => true,
                    'descripcion' => 'Ahorro en botanas para reuniones',
                    'imagen' => 'promo3.jpeg'
                ],
                [
                    'id' => 4,
                    'nombre' => 'Frescos del día',
                    'descuento' => 8,
                    'fecha_inicio' => '2026-05-01',
                    'fecha_fin' => '2026-05-30',
                    'vigente' => true,
                    'descripcion' => 'Descuento temporal en frutas y verduras',
                    'imagen' => 'promo4.jpeg'
                ],
                [
                    'id' => 5,
                    'nombre' => 'Hogar renovado',
                    'descuento' => 18,
                    'fecha_inicio' => '2026-05-20',
                    'fecha_fin' => '2026-06-30',
                    'vigente' => true,
                    'descripcion' => 'Promoción en artículos para el hogar',
                    'imagen' => 'promo5.jpeg'
                ],
                [
                    'id' => 6,
                    'nombre' => 'Bebidas 2x semana',
                    'descuento' => 10,
                    'fecha_inicio' => '2026-05-18',
                    'fecha_fin' => '2026-06-08',
                    'vigente' => true,
                    'descripcion' => 'Ahorro en bebidas seleccionadas',
                    'imagen' => 'promo6.jpeg'
                ]
            ],
            'producto_promocion' => [
                [
                    'id_producto' => 3,
                    'id_promocion' => 1
                ],
                [
                    'id_producto' => 5,
                    'id_promocion' => 1
                ],
                [
                    'id_producto' => 26,
                    'id_promocion' => 1
                ],
                [
                    'id_producto' => 28,
                    'id_promocion' => 1
                ],
                [
                    'id_producto' => 8,
                    'id_promocion' => 2
                ],
                [
                    'id_producto' => 10,
                    'id_promocion' => 2
                ],
                [
                    'id_producto' => 20,
                    'id_promocion' => 2
                ],
                [
                    'id_producto' => 21,
                    'id_promocion' => 2
                ],
                [
                    'id_producto' => 12,
                    'id_promocion' => 3
                ],
                [
                    'id_producto' => 15,
                    'id_promocion' => 3
                ],
                [
                    'id_producto' => 16,
                    'id_promocion' => 3
                ],
                [
                    'id_producto' => 9,
                    'id_promocion' => 4
                ],
                [
                    'id_producto' => 17,
                    'id_promocion' => 4
                ],
                [
                    'id_producto' => 18,
                    'id_promocion' => 4
                ],
                [
                    'id_producto' => 19,
                    'id_promocion' => 4
                ],
                [
                    'id_producto' => 22,
                    'id_promocion' => 5
                ],
                [
                    'id_producto' => 23,
                    'id_promocion' => 5
                ],
                [
                    'id_producto' => 24,
                    'id_promocion' => 5
                ],
                [
                    'id_producto' => 25,
                    'id_promocion' => 5
                ],
                [
                    'id_producto' => 1,
                    'id_promocion' => 6
                ],
                [
                    'id_producto' => 4,
                    'id_promocion' => 6
                ],
                [
                    'id_producto' => 13,
                    'id_promocion' => 6
                ],
                [
                    'id_producto' => 14,
                    'id_promocion' => 6
                ]
            ],
            'metodos_pago' => [
                [
                    'id' => 1,
                    'nombre' => 'Efectivo',
                    'tipo' => 'Presencial',
                    'descripcion' => 'Pago en caja'
                ],
                [
                    'id' => 2,
                    'nombre' => 'Tarjeta',
                    'tipo' => 'Bancario',
                    'descripcion' => 'Crédito o débito'
                ],
                [
                    'id' => 3,
                    'nombre' => 'Transferencia',
                    'tipo' => 'Digital',
                    'descripcion' => 'Pago por transferencia bancaria'
                ],
                [
                    'id' => 4,
                    'nombre' => 'Vales',
                    'tipo' => 'Beneficio',
                    'descripcion' => 'Pago con vales de despensa'
                ]
            ],
            'ventas' => [
                [
                    'id' => 1,
                    'id_cliente' => 1,
                    'id_empleado' => 3,
                    'id_sucursal' => 2,
                    'id_metodo' => 2,
                    'fecha' => '2026-05-16',
                    'hora' => '14:20',
                    'estado' => 'Pagada',
                    'total' => 86.5
                ],
                [
                    'id' => 2,
                    'id_cliente' => 2,
                    'id_empleado' => 2,
                    'id_sucursal' => 1,
                    'id_metodo' => 1,
                    'fecha' => '2026-05-17',
                    'hora' => '10:05',
                    'estado' => 'Pagada',
                    'total' => 82.0
                ],
                [
                    'id' => 3,
                    'id_cliente' => 3,
                    'id_empleado' => 5,
                    'id_sucursal' => 3,
                    'id_metodo' => 4,
                    'fecha' => '2026-05-18',
                    'hora' => '18:45',
                    'estado' => 'Pagada',
                    'total' => 135.0
                ],
                [
                    'id' => 4,
                    'id_cliente' => 4,
                    'id_empleado' => 4,
                    'id_sucursal' => 4,
                    'id_metodo' => 2,
                    'fecha' => '2026-05-19',
                    'hora' => '12:12',
                    'estado' => 'Pagada',
                    'total' => 202.5
                ]
            ],
            'detalle_venta' => [
                [
                    'id' => 1,
                    'id_venta' => 1,
                    'id_producto' => 1,
                    'cantidad' => 2,
                    'precio_unitario' => 14.5
                ],
                [
                    'id' => 2,
                    'id_venta' => 1,
                    'id_producto' => 5,
                    'cantidad' => 1,
                    'precio_unitario' => 27.5
                ],
                [
                    'id' => 3,
                    'id_venta' => 1,
                    'id_producto' => 3,
                    'cantidad' => 1,
                    'precio_unitario' => 18.0
                ],
                [
                    'id' => 4,
                    'id_venta' => 2,
                    'id_producto' => 2,
                    'cantidad' => 1,
                    'precio_unitario' => 62.0
                ],
                [
                    'id' => 5,
                    'id_venta' => 2,
                    'id_producto' => 4,
                    'cantidad' => 1,
                    'precio_unitario' => 19.0
                ],
                [
                    'id' => 6,
                    'id_venta' => 3,
                    'id_producto' => 12,
                    'cantidad' => 2,
                    'precio_unitario' => 22.0
                ],
                [
                    'id' => 7,
                    'id_venta' => 3,
                    'id_producto' => 15,
                    'cantidad' => 2,
                    'precio_unitario' => 25.5
                ],
                [
                    'id' => 8,
                    'id_venta' => 3,
                    'id_producto' => 16,
                    'cantidad' => 2,
                    'precio_unitario' => 17.0
                ],
                [
                    'id' => 9,
                    'id_venta' => 4,
                    'id_producto' => 20,
                    'cantidad' => 2,
                    'precio_unitario' => 46.0
                ],
                [
                    'id' => 10,
                    'id_venta' => 4,
                    'id_producto' => 8,
                    'cantidad' => 1,
                    'precio_unitario' => 34.0
                ],
                [
                    'id' => 11,
                    'id_venta' => 4,
                    'id_producto' => 23,
                    'cantidad' => 1,
                    'precio_unitario' => 149.0
                ]
            ],
            'faqs' => [
                [
                    'id' => 1,
                    'pregunta' => '¿Cuál es el horario de atención de La Casita?',
                    'respuesta' => 'La mayoría de las sucursales atienden de lunes a sábado en horario comercial. Los horarios pueden variar por zona, por eso se recomienda revisar la sucursal más cercana o llamar antes de acudir.',
                    'categoria' => 'Atención',
                    'visible' => true
                ],
                [
                    'id' => 2,
                    'pregunta' => '¿Dónde puedo encontrar la sucursal más cercana?',
                    'respuesta' => 'En la sección de sucursales puedes consultar dirección, teléfono y el botón “Cómo llegar”, el cual abre la ubicación en Google Maps para facilitar la ruta.',
                    'categoria' => 'Sucursales',
                    'visible' => true
                ],
                [
                    'id' => 3,
                    'pregunta' => '¿Puedo revisar productos antes de iniciar sesión?',
                    'respuesta' => 'Sí. El catálogo público permite consultar productos, precios, categorías y promociones sin iniciar sesión.',
                    'categoria' => 'Catálogo',
                    'visible' => true
                ],
                [
                    'id' => 4,
                    'pregunta' => '¿Necesito una cuenta para confirmar una compra?',
                    'respuesta' => 'Puedes navegar y agregar productos al carrito sin cuenta, pero para confirmar una compra se solicita iniciar sesión como cliente.',
                    'categoria' => 'Compras',
                    'visible' => true
                ],
                [
                    'id' => 5,
                    'pregunta' => '¿Qué métodos de pago acepta la tienda?',
                    'respuesta' => 'La tienda contempla pagos en efectivo, tarjeta, transferencia y vales. La disponibilidad puede variar según la sucursal o el tipo de compra.',
                    'categoria' => 'Pagos',
                    'visible' => true
                ],
                [
                    'id' => 6,
                    'pregunta' => '¿Las promociones aplican en todos los productos?',
                    'respuesta' => 'No necesariamente. Algunas promociones aplican solo a productos seleccionados o durante fechas específicas. La descripción de cada oferta muestra su vigencia y condiciones generales.',
                    'categoria' => 'Promociones',
                    'visible' => true
                ],
                [
                    'id' => 7,
                    'pregunta' => '¿Cómo sé si un producto está disponible?',
                    'respuesta' => 'Cada producto muestra su existencia aproximada. Si el stock es bajo, se recomienda confirmar disponibilidad en la sucursal antes de realizar el pedido.',
                    'categoria' => 'Inventario',
                    'visible' => true
                ],
                [
                    'id' => 8,
                    'pregunta' => '¿Puedo pedir productos para recoger en tienda?',
                    'respuesta' => 'El flujo de compra permite preparar un pedido asociado a una sucursal. Para una entrega escolar o demo, puede manejarse como recolección en tienda.',
                    'categoria' => 'Compras',
                    'visible' => true
                ],
                [
                    'id' => 9,
                    'pregunta' => '¿Qué hago si necesito cambiar mis datos de contacto?',
                    'respuesta' => 'Después de iniciar sesión como cliente puedes entrar a tu perfil y actualizar nombre, teléfono, correo, ciudad y dirección.',
                    'categoria' => 'Cuenta',
                    'visible' => true
                ],
                [
                    'id' => 10,
                    'pregunta' => '¿Puedo solicitar ayuda sobre un pedido?',
                    'respuesta' => 'Sí. Puedes comunicarte con la sucursal más cercana usando el teléfono registrado en la sección de sucursales.',
                    'categoria' => 'Atención',
                    'visible' => true
                ],
                [
                    'id' => 11,
                    'pregunta' => '¿Manejan productos frescos?',
                    'respuesta' => 'Sí. El catálogo incluye frutas, verduras, lácteos y otros productos de consumo diario. La disponibilidad puede cambiar por temporada o sucursal.',
                    'categoria' => 'Catálogo',
                    'visible' => true
                ],
                [
                    'id' => 12,
                    'pregunta' => '¿Las ofertas tienen fecha límite?',
                    'respuesta' => 'Sí. Cada promoción muestra fecha de inicio y fecha de fin para que el cliente pueda identificar si todavía está vigente.',
                    'categoria' => 'Promociones',
                    'visible' => true
                ]
            ]
        ];

        foreach ($seed['sucursales'] as $s) {
            DB::table('sucursal')->insert([
                'id_sucursal' => $s['id'], 'nombre' => $s['nombre'], 'direccion' => $s['direccion'], 'telefono' => $s['telefono'], 'ciudad' => $s['ciudad'], 'estado' => $s['estado'], 'latitud' => $s['latitud'], 'longitud' => $s['longitud'], 'url_maps' => $s['url_maps'], 'created_at' => now(), 'updated_at' => now(),
            ]);
        }
        foreach ($seed['puestos'] as $p) { DB::table('puesto')->insert(['id_puesto'=>$p['id'],'nombre'=>$p['nombre'],'descripcion'=>$p['descripcion'],'created_at'=>now(),'updated_at'=>now()]); }
        foreach ($seed['clientes'] as $c) { DB::table('cliente')->insert(['id_cliente'=>$c['id'],'nombre'=>$c['nombre'],'telefono'=>$c['telefono'],'correo'=>$c['correo'],'ciudad'=>$c['ciudad'],'codigo_postal'=>$c['codigo_postal'],'direccion'=>$c['direccion'],'estado'=>$c['estado'],'created_at'=>now(),'updated_at'=>now()]); }
        foreach ($seed['empleados'] as $e) { DB::table('empleado')->insert(['id_empleado'=>$e['id'],'nombre'=>$e['nombre'],'telefono'=>$e['telefono'],'correo'=>$e['correo'],'id_puesto'=>$e['id_puesto'],'id_sucursal'=>$e['id_sucursal'],'nivel_responsabilidad'=>$e['nivel_responsabilidad'],'bono'=>$e['bono'],'estado'=>$e['estado'],'created_at'=>now(),'updated_at'=>now()]); }
        foreach ($seed['usuarios'] as $u) { DB::table('usuario')->insert(['id_usuario'=>$u['id'],'nombre'=>$u['nombre'],'correo'=>$u['correo'],'password_hash'=>Hash::make($u['password']),'rol'=>$u['rol'],'id_empleado'=>$u['id_empleado'],'id_cliente'=>$u['id_cliente'],'estado'=>$u['estado'],'created_at'=>now(),'updated_at'=>now()]); }
        foreach ($seed['categorias'] as $c) { DB::table('categoria')->insert(['id_categoria'=>$c['id'],'nombre'=>$c['nombre'],'descripcion'=>$c['descripcion'],'created_at'=>now(),'updated_at'=>now()]); }
        foreach ($seed['proveedores'] as $p) { DB::table('proveedor')->insert(['id_proveedor'=>$p['id'],'nombre'=>$p['nombre'],'telefono'=>$p['telefono'],'correo'=>$p['correo'],'ciudad'=>$p['ciudad'],'codigo_postal'=>$p['codigo_postal'],'direccion'=>$p['direccion'],'estado'=>$p['estado'],'created_at'=>now(),'updated_at'=>now()]); }
        foreach ($seed['productos'] as $p) { DB::table('producto')->insert(['id_producto'=>$p['id'],'nombre'=>$p['nombre'],'descripcion'=>$p['descripcion'],'codigo_barras'=>$p['codigo_barras'],'precio'=>$p['precio'],'stock'=>$p['stock'],'id_categoria'=>$p['id_categoria'],'id_proveedor'=>$p['id_proveedor'],'activo'=>$p['activo'],'imagen'=>$p['imagen'],'created_at'=>now(),'updated_at'=>now()]); }
        foreach ($seed['inventario'] as $i) { DB::table('inventario')->insert(['id_inventario'=>$i['id'],'id_producto'=>$i['id_producto'],'id_sucursal'=>$i['id_sucursal'],'stock'=>$i['stock'],'stock_minimo'=>$i['stock_minimo'],'created_at'=>now(),'updated_at'=>now()]); }
        foreach ($seed['metodos_pago'] as $m) { DB::table('metodo_pago')->insert(['id_metodo'=>$m['id'],'nombre'=>$m['nombre'],'tipo'=>$m['tipo'],'descripcion'=>$m['descripcion'],'created_at'=>now(),'updated_at'=>now()]); }
        foreach ($seed['promociones'] as $p) { DB::table('promocion')->insert(['id_promocion'=>$p['id'],'nombre'=>$p['nombre'],'descuento'=>$p['descuento'],'fecha_inicio'=>$p['fecha_inicio'],'fecha_fin'=>$p['fecha_fin'],'vigente'=>$p['vigente'],'descripcion'=>$p['descripcion'],'imagen'=>$p['imagen'],'created_at'=>now(),'updated_at'=>now()]); }
        foreach ($seed['producto_promocion'] as $pp) { DB::table('producto_promocion')->insert(['id_producto'=>$pp['id_producto'],'id_promocion'=>$pp['id_promocion']]); }
        foreach ($seed['ventas'] as $v) { DB::table('venta')->insert(['id_venta'=>$v['id'],'id_cliente'=>$v['id_cliente'],'id_empleado'=>$v['id_empleado'],'id_sucursal'=>$v['id_sucursal'],'id_metodo'=>$v['id_metodo'],'fecha'=>$v['fecha'],'hora'=>$v['hora'],'estado'=>$v['estado'],'total'=>$v['total'],'created_at'=>now(),'updated_at'=>now()]); }
        foreach ($seed['detalle_venta'] as $d) { DB::table('detalle_venta')->insert(['id_detalle_venta'=>$d['id'],'id_venta'=>$d['id_venta'],'id_producto'=>$d['id_producto'],'cantidad'=>$d['cantidad'],'precio_unitario'=>$d['precio_unitario'],'created_at'=>now(),'updated_at'=>now()]); }
        foreach ($seed['faqs'] as $f) { DB::table('faq')->insert(['id_faq'=>$f['id'],'pregunta'=>$f['pregunta'],'respuesta'=>$f['respuesta'],'categoria'=>$f['categoria'],'visible'=>$f['visible'],'created_at'=>now(),'updated_at'=>now()]); }
    }
}
