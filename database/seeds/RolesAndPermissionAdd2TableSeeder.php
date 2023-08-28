<?php

use Artesaos\Defender\Facades\Defender;
use Illuminate\Database\Seeder;

class RolesAndPermissionAdd2TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // PRODUCTS
        Defender::createPermission('departments.index', 'Listar Departamentos');
        Defender::createPermission('departments.create', 'Criar Departamentos ');
        Defender::createPermission('departments.show', 'Ver Departamentos');
        Defender::createPermission('departments.store', 'Gravar Departamentos');
        Defender::createPermission('departments.edit', 'Editar Departamentos');
        Defender::createPermission('departments.update', 'Update Departamentos');
        Defender::createPermission('departments.destroy', 'Deletar Departamentos');

        $adminUserRole = Defender::findRole("admin");

        $index = Defender::findPermission('departments.index');
        $create = Defender::findPermission('departments.create');
        $show = Defender::findPermission('departments.show');
        $store = Defender::findPermission('departments.store');
        $edit = Defender::findPermission('departments.edit');
        $update = Defender::findPermission('departments.update');
        $destroy = Defender::findPermission('departments.destroy');

        $adminUserRole->attachPermission($index);
//        $adminUserRole->attachPermission($create);
//        $adminUserRole->attachPermission($show);
//        $adminUserRole->attachPermission($store);
//        $adminUserRole->attachPermission($edit);
//        $adminUserRole->attachPermission($update);
//        $adminUserRole->attachPermission($destroy);

    }
}
