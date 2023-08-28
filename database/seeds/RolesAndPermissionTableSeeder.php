<?php

use Artesaos\Defender\Facades\Defender;
use Illuminate\Database\Seeder;

class RolesAndPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CRIANDO AS ROLES

        $superUserRole = Defender::createRole("superuser");
        $adminUserRole = Defender::createRole("admin");
        $departamentoRole = Defender::createRole("departamento");
        $informaticaRole = Defender::createRole("informatica");
        $coreRole = Defender::createRole("core");
        $diretorRole = Defender::createRole("diretor");
        $empresaRole = Defender::createRole("empresa");
        $empresaEstrangeiraRole = Defender::createRole("empresa_estrangeira");

        //CRIANDO AS PERMISSIONS

        //USERS PERMISSIONS
        Defender::createPermission('users.index', 'Listar Usuários');
        Defender::createPermission('users.show', 'Ver Usuários');
        Defender::createPermission('users.create', 'Criar Usuários');
        Defender::createPermission('users.edit', 'Editar Usuários');
        Defender::createPermission('users.destroy', 'Deletar Usuários');
        Defender::createPermission('users.change_password', 'Mudar senha de Usuários');

        //Certificados da Empresa
        Defender::createPermission('companyCertificates.index', 'Certificados todos');
        Defender::createPermission('companyCertificates.pending', 'Certificados pendentes');
        Defender::createPermission('companyCertificates.approved', 'Certificados aprovados');
        Defender::createPermission('companyCertificates.disapproved', 'Certificados negados');
        Defender::createPermission('companyCertificates.inProgress', 'Certificados em progresso');

        //Certificados
        Defender::createPermission('certificates.index', 'Listar Certificados');
        Defender::createPermission('certificates.show', 'Ver Certificados');
        Defender::createPermission('certificates.create', 'Criar Certificados');
        Defender::createPermission('certificates.edit', 'Editar Certificados');
        Defender::createPermission('certificates.destroy', 'Deletar Certificados');

        //Certificados
        Defender::createPermission('certificateCategories.index', 'Listar Certificados Categoria');
        Defender::createPermission('certificateCategories.show', 'Ver Certificados Categoria');
        Defender::createPermission('certificateCategories.create', 'Criar Certificados Categoria');
        Defender::createPermission('certificateCategories.edit', 'Editar Certificados Categoria');
        Defender::createPermission('certificateCategories.destroy', 'Deletar Certificados Categoria');

        //Exigencias
        Defender::createPermission('requirements.index', 'Listar Exigencias');
        Defender::createPermission('requirements.show', 'Ver Exigencias');
        Defender::createPermission('requirements.create', 'Criar Exigencias');
        Defender::createPermission('requirements.edit', 'Editar Exigencias');
        Defender::createPermission('requirements.destroy', 'Deletar Exigencias');

        //Empresas
        Defender::createPermission('companies.index', 'Listar Empresas');
        Defender::createPermission('companies.show', 'Ver Empresas');
        Defender::createPermission('companies.create', 'Criar Empresas');
        Defender::createPermission('companies.edit', 'Editar Empresas');
        Defender::createPermission('companies.destroy', 'Deletar Empresas');
        Defender::createPermission('companies.pending', 'Empresas Pendentes');
        Defender::createPermission('companies.approved', 'Empresas aprovada');
        Defender::createPermission('companies.disapproved', 'Empresas Reprovada');
        Defender::createPermission('companies.change_password', 'Mudar senha de Empresas');

        //PERMISSIONS
        Defender::createPermission('permissions.index', 'Listar Permissões');
        Defender::createPermission('permissions.show', 'Ver Permissões');
        Defender::createPermission('permissions.create', 'Criar Permissões');
        Defender::createPermission('permissions.edit', 'Editar Permissões');
        Defender::createPermission('permissions.destroy', 'Deletar Permissões');

        //ROLES
        Defender::createPermission('roles.index', 'Listar roles');
        Defender::createPermission('roles.create', 'Criar roles');
        Defender::createPermission('roles.show', 'Ver roles');
        Defender::createPermission('roles.edit', 'Editar roles');
        Defender::createPermission('roles.destroy', 'Deletar roles');


        Defender::createPermission('exchange.requests', 'Pedidos');
        Defender::createPermission('exchange.requests-enviados', 'Pedidos Enviados');
        Defender::createPermission('exchange.requests-recebidos', 'Pedidos Recebidos');

//        Defender::createPermission('exchange.requests-todos', 'Pedidos');
//        Defender::createPermission('exchange.requests-fechados', 'Pedidos');
//        Defender::createPermission('exchange.requests-fechados', 'Pedidos');

        //PRODUCTS
        Defender::createPermission('products.index', 'Lista de produtos');
        Defender::createPermission('products.create', 'Cadastro de produto');


        //PRODUCT CATEGORY
        Defender::createPermission('productCategories.export', 'Exportar Categoria de produtos');
        Defender::createPermission('productCategories.index', 'Listar Categoria de produtos');
        Defender::createPermission('productCategories.show', 'Ver Categoria de produtos');
        Defender::createPermission('productCategories.create', 'Criar Categoria de produtos');
        Defender::createPermission('productCategories.edit', 'Editar Categoria de produtos');
        Defender::createPermission('productCategories.destroy', 'Deletar Categoria de produtos');

        //PRODUCTS
        Defender::createPermission('companyAnnouncements.indexByCompany', 'Lista de anuncios da empresa');
        Defender::createPermission('companyAnnouncements.create', 'Cadastro de anuncios');
        Defender::createPermission('companyAnnouncements.show', 'Ver seus anuncios');
        Defender::createPermission('companyAnnouncements.edit', 'Editar seus anuncios');
        Defender::createPermission('companyAnnouncements.destroy', 'Deletar seus anuncios');


        //COMPANY SOCIOS
        Defender::createPermission('companyPartners.index', 'Listar Socios');
        Defender::createPermission('companyPartners.show', 'Ver Socios');
        Defender::createPermission('companyPartners.create', 'Criar Socios');
        Defender::createPermission('companyPartners.store', 'Gravar Socios');
        Defender::createPermission('companyPartners.edit', 'Editar Socios');
        Defender::createPermission('companyPartners.update', 'Update Socios');
        Defender::createPermission('companyPartners.destroy', 'Deletar Socios');


        //COMPANY SOCIOS
        Defender::createPermission('companyRepresentatives.index', 'Listar Representantes');
        Defender::createPermission('companyRepresentatives.show', 'Ver Representantes');
        Defender::createPermission('companyRepresentatives.create', 'Criar Representantes');
        Defender::createPermission('companyRepresentatives.store', 'Gravar Representantes');
        Defender::createPermission('companyRepresentatives.edit', 'Editar Representantes');
        Defender::createPermission('companyRepresentatives.update', 'Update Representantes');
        Defender::createPermission('companyRepresentatives.destroy', 'Deletar Representantes');

        //SYSCOMPANY
        Defender::createPermission('sysCompany.index', 'Dashboard empresa');
        Defender::createPermission('sysCompany.companyAnnouncements.create', 'Cadastro de Anuncio Empresa');
        Defender::createPermission('sysCompany.companyAnnouncements.indexByCompany', 'Listar Anuncio Empresa');
        Defender::createPermission('sysCompany.companyAnnouncements.show', 'Show Anuncios');
        Defender::createPermission('sysCompany.companyAnnouncements.destroy', 'Excluir Anuncios');

        //REQUESTS
        Defender::createPermission('requests.myShopping', 'Lista de pedidos de compras da empresa');
        Defender::createPermission('requests.mySales', 'Lista de pedidos de vendas da empresa');

        //COMPANIES
        Defender::createPermission('companies.indexMyCompany', 'Permissão para ver dados de sua propria empresa');
        Defender::createPermission('companies.changePassword', 'Permissão para alterar senha de sua propria empresa');

        //MONITORAMENTO/DASHBOARD
        Defender::createPermission('admin.index', 'Monitoramento');


        //ROOT ROLE
        $listPermissions = Defender::permissionsList();

        foreach ($listPermissions as $key => $permission){
            $permissionNow = Defender::findPermissionById($key);

            $tipo = explode('.',$permission);

            if($tipo[0] == "permissions" || $tipo[0] == "roles") {
            } else {
                $adminUserRole->attachPermission($permissionNow);
            }
        }

        $sysCompanyIndex = Defender::findPermission('sysCompany.index');
        $sysCompanyCreate = Defender::findPermission('sysCompany.companyAnnouncements.create');
        $sysCompanyAnuncioIndex = Defender::findPermission('sysCompany.companyAnnouncements.indexByCompany');
        $sysCompanyShowAnuncio = Defender::findPermission('sysCompany.companyAnnouncements.show');
        $sysCompanyDestroyAnuncio = Defender::findPermission('sysCompany.companyAnnouncements.destroy');

        $exchangePedidos = Defender::findPermission('exchange.requests');
        $exchangePedidosEnviados = Defender::findPermission('exchange.requests-enviados');
        $exchangePedidosRecebidos = Defender::findPermission('exchange.requests-recebidos');

        $companyPartnersindex = Defender::findPermission('companyPartners.index');
        $companyPartnersshow = Defender::findPermission('companyPartners.show');
        $companyPartnerscreate = Defender::findPermission('companyPartners.create');
        $companyPartnersstore = Defender::findPermission('companyPartners.store');
        $companyPartnersedit = Defender::findPermission('companyPartners.edit');
        $companyPartnersupdate = Defender::findPermission('companyPartners.update');

        $companyRepresentativesindex = Defender::findPermission('companyRepresentatives.index');
        $companyRepresentativesshow = Defender::findPermission('companyRepresentatives.show');
        $companyRepresentativescreate = Defender::findPermission('companyRepresentatives.create');
        $companyRepresentativesstore = Defender::findPermission('companyRepresentatives.store');
        $companyRepresentativesedit = Defender::findPermission('companyRepresentatives.edit');
        $companyRepresentativesupdate = Defender::findPermission('companyRepresentatives.update');

        $companiesIndexMyCompany = Defender::findPermission('companies.indexMyCompany');
        $companiesChangePassword = Defender::findPermission('companies.changePassword');


        $empresaRole->attachPermission($companiesIndexMyCompany);
        $empresaRole->attachPermission($companiesChangePassword);
        $empresaRole->attachPermission($exchangePedidos);
        $empresaRole->attachPermission($exchangePedidosEnviados);
        $empresaRole->attachPermission($exchangePedidosRecebidos);

        //SOCIOS
        $empresaRole->attachPermission($companyPartnersindex);
        $empresaRole->attachPermission($companyPartnersshow);
        $empresaRole->attachPermission($companyPartnerscreate);
        $empresaRole->attachPermission($companyPartnersstore);
        $empresaRole->attachPermission($companyPartnersedit);
        $empresaRole->attachPermission($companyPartnersupdate);

        //Representantes
        $empresaRole->attachPermission($companyRepresentativesindex);
        $empresaRole->attachPermission($companyRepresentativesshow);
        $empresaRole->attachPermission($companyRepresentativescreate);
        $empresaRole->attachPermission($companyRepresentativesstore);
        $empresaRole->attachPermission($companyRepresentativesedit);
        $empresaRole->attachPermission($companyRepresentativesupdate);

        $empresaRole->attachPermission($sysCompanyIndex);
        $empresaRole->attachPermission($sysCompanyCreate);
        $empresaRole->attachPermission($sysCompanyAnuncioIndex);
        $empresaRole->attachPermission($sysCompanyShowAnuncio);
//        $empresaRole->attachPermission($sysCompanyDestroyAnuncio);

        $empresaEstrangeiraRole->attachPermission($companiesIndexMyCompany);
        $empresaEstrangeiraRole->attachPermission($companiesChangePassword);
        $empresaEstrangeiraRole->attachPermission($exchangePedidos);
        $empresaEstrangeiraRole->attachPermission($exchangePedidosEnviados);
        $empresaEstrangeiraRole->attachPermission($exchangePedidosRecebidos);

        $empresaEstrangeiraRole->attachPermission($sysCompanyIndex);
        $empresaEstrangeiraRole->attachPermission($sysCompanyCreate);
        $empresaEstrangeiraRole->attachPermission($sysCompanyAnuncioIndex);
        $empresaEstrangeiraRole->attachPermission($sysCompanyShowAnuncio);
//        $empresaEstrangeiraRole->attachPermission($sysCompanyDestroyAnuncio);
    }
}
