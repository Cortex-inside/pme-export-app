<?php

use Artesaos\Defender\Facades\Defender;
use Illuminate\Database\Seeder;

class RolesAndPermissionAdd3TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // PRODUCTS
        Defender::createPermission('users.indexEmpresa', 'Usuários empresa listar');

        Defender::createPermission('provinces.index', 'Listar Provincias');
        Defender::createPermission('provinces.create', 'Criar Provincias ');
        Defender::createPermission('provinces.show', 'Ver Provincias');
        Defender::createPermission('provinces.store', 'Gravar Provincias');
        Defender::createPermission('provinces.edit', 'Editar Provincias');
        Defender::createPermission('provinces.update', 'Update Provincias');
        Defender::createPermission('provinces.destroy', 'Deletar Provincias');

        Defender::createPermission('districts.index', 'Listar Distritos');
        Defender::createPermission('districts.create', 'Criar Distritos ');
        Defender::createPermission('districts.show', 'Ver Distritos');
        Defender::createPermission('districts.store', 'Gravar Distritos');
        Defender::createPermission('districts.edit', 'Editar Distritos');
        Defender::createPermission('districts.update', 'Update Distritos');
        Defender::createPermission('districts.destroy', 'Deletar Distritos');

        Defender::createPermission('caes.index', 'Listar caes');
        Defender::createPermission('caes.create', 'Criar caes ');
        Defender::createPermission('caes.show', 'Ver caes');
        Defender::createPermission('caes.store', 'Gravar caes');
        Defender::createPermission('caes.edit', 'Editar caes');
        Defender::createPermission('caes.update', 'Update caes');
        Defender::createPermission('caes.destroy', 'Deletar caes');

        $adminUserRole = Defender::findRole("admin");

        $indexEmpresa = Defender::findPermission('users.indexEmpresa');

        $adminUserRole->attachPermission($indexEmpresa);

        // PROVINCES
        $index = Defender::findPermission('provinces.index');
        $create = Defender::findPermission('provinces.create');
        $show = Defender::findPermission('provinces.show');
        $store = Defender::findPermission('provinces.store');
        $edit = Defender::findPermission('provinces.edit');
        $update = Defender::findPermission('provinces.update');
        $destroy = Defender::findPermission('provinces.destroy');

        $adminUserRole->attachPermission($index);
        $adminUserRole->attachPermission($create);
        $adminUserRole->attachPermission($show);
        $adminUserRole->attachPermission($store);
        $adminUserRole->attachPermission($edit);
        $adminUserRole->attachPermission($update);
//        $adminUserRole->attachPermission($destroy);

        // districts
        $index = Defender::findPermission('districts.index');
        $create = Defender::findPermission('districts.create');
        $show = Defender::findPermission('districts.show');
        $store = Defender::findPermission('districts.store');
        $edit = Defender::findPermission('districts.edit');
        $update = Defender::findPermission('districts.update');
        $destroy = Defender::findPermission('districts.destroy');

        $adminUserRole->attachPermission($index);
        $adminUserRole->attachPermission($create);
        $adminUserRole->attachPermission($show);
        $adminUserRole->attachPermission($store);
        $adminUserRole->attachPermission($edit);
        $adminUserRole->attachPermission($update);
//        $adminUserRole->attachPermission($destroy);

        // caes
        $index = Defender::findPermission('caes.index');
        $create = Defender::findPermission('caes.create');
        $show = Defender::findPermission('caes.show');
        $store = Defender::findPermission('caes.store');
        $edit = Defender::findPermission('caes.edit');
        $update = Defender::findPermission('caes.update');
        $destroy = Defender::findPermission('caes.destroy');

        $adminUserRole->attachPermission($index);
        $adminUserRole->attachPermission($create);
        $adminUserRole->attachPermission($show);
        $adminUserRole->attachPermission($store);
        $adminUserRole->attachPermission($edit);
        $adminUserRole->attachPermission($update);
//        $adminUserRole->attachPermission($destroy);

    }
}
