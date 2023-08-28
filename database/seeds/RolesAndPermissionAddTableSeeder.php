<?php

use Artesaos\Defender\Facades\Defender;
use Illuminate\Database\Seeder;

class RolesAndPermissionAddTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // PRODUCTS
        Defender::createPermission('products.show', 'Ver produto');
        Defender::createPermission('products.store', 'Gravar produto');
        Defender::createPermission('products.edit', 'Editar produto');
        Defender::createPermission('products.update', 'Update produto');
        Defender::createPermission('products.destroy', 'Deletar produto');

        $adminUserRole = Defender::findRole("admin");

        $show = Defender::findPermission('products.show');
        $store = Defender::findPermission('products.store');
        $edit = Defender::findPermission('products.edit');
        $update = Defender::findPermission('products.update');
        $destroy = Defender::findPermission('products.destroy');

        $adminUserRole->attachPermission($show);
        $adminUserRole->attachPermission($store);
        $adminUserRole->attachPermission($edit);
        $adminUserRole->attachPermission($update);
        $adminUserRole->attachPermission($destroy);

    }
}
