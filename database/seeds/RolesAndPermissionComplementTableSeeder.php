<?php

use Artesaos\Defender\Facades\Defender;
use Illuminate\Database\Seeder;

class RolesAndPermissionComplementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CRIANDO AS ROLES

        $adminUserRole = Defender::findRole("admin");

        Defender::createPermission('exchange.requests.todos', 'Listar Todos Pedidos Administraçao');
        $exchangeRequestTodos = Defender::findPermission('exchange.requests.todos');

        $adminUserRole->attachPermission($exchangeRequestTodos);

    }
}
