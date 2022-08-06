<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Settings Menu

        DB::table('menus')->insert([
            'name' => 'setting',
            'text' => 'content.setting',
            'route' => null,
            'icon' => 'mdi-cogs',
        ]);
                        
        
                        DB::table('menus')->insert([
                            'name' => 'settings.catalog',
                            'text' => 'content.catalog',
                            'father' => 'setting',
                            'route' => null,
                            'icon' => 'mdi-database',
                        ]);
        
                                        DB::table('menus')->insert([
                                            'name' => 'settings.regions',
                                            'text' => 'content.regions',
                                            'father' => 'settings.catalog',
                                            'route' => '/regions',
                                            'icon' => 'mdi-circle-outline',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'settings.countries',
                                            'text' => 'content.countries',
                                            'father' => 'settings.catalog',
                                            'route' => '/countries',
                                            'icon' => 'mdi-circle-outline',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'settings.states',
                                            'text' => 'content.states',
                                            'father' => 'settings.catalog',
                                            'route' => '/states',
                                            'icon' => 'mdi-circle-outline',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'settings.cities',
                                            'text' => 'content.cities',
                                            'father' => 'settings.catalog',
                                            'route' => '/cities',
                                            'icon' => 'mdi-circle-outline',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'settings.menus',
                                            'text' => 'content.menus',
                                            'father' => 'settings.catalog',
                                            'route' => '/menus',
                                            'icon' => 'mdi-circle-outline',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'settings.roles',
                                            'text' => 'content.roles',
                                            'father' => 'settings.catalog',
                                            'route' => '/roles',
                                            'icon' => 'mdi-circle-outline',
                                        ]);
                                        
                                        DB::table('menus')->insert([
                                            'name' => 'settings.permits',
                                            'text' => 'content.permits',
                                            'father' => 'settings.catalog',
                                            'route' => '/permits',
                                            'icon' => 'mdi-circle-outline',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'settings.brands',
                                            'text' => 'content.brands',
                                            'father' => 'settings.catalog',
                                            'route' => '/brands',
                                            'icon' => 'mdi-circle-outline',
                                        ]);
                
                                        DB::table('menus')->insert([
                                            'name' => 'settings.models',
                                            'text' => 'content.models',
                                            'father' => 'settings.catalog',
                                            'route' => '/models',
                                            'icon' => 'mdi-circle-outline',
                                        ]);
                
                                        DB::table('menus')->insert([
                                            'name' => 'settings.unities',
                                            'text' => 'content.unities',
                                            'father' => 'settings.catalog',
                                            'route' => '/unities',
                                            'icon' => 'mdi-circle-outline',
                                        ]);

                        DB::table('menus')->insert([
                            'name' => 'settings.companies',
                            'text' => 'content.companies',
                            'father' => 'setting',
                            'route' => '/companies',
                            'icon' => 'mdi-circle-outline',
                        ]);

                        DB::table('menus')->insert([
                            'name' => 'settings.divisions',
                            'text' => 'content.divisions',
                            'father' => 'setting',
                            'route' => '/divisions',
                            'icon' => 'mdi-circle-outline',
                        ]);

                        DB::table('menus')->insert([
                            'name' => 'settings.subsidiaries',
                            'text' => 'content.subsidiaries',
                            'father' => 'setting',
                            'route' => '/subsidiaries',
                            'icon' => 'mdi-circle-outline',
                        ]);
                        
                        DB::table('menus')->insert([
                            'name' => 'settings.projects',
                            'text' => 'content.projects',
                            'father' => 'setting',
                            'route' => '/projects',
                            'icon' => 'mdi-circle-outline',
                        ]);

                        DB::table('menus')->insert([
                            'name' => 'settings.parameters',
                            'text' => 'content.parameters',
                            'father' => 'setting',
                            'route' => '/',
                            'icon' => 'mdi-circle-outline',
                        ]);

        // Project Menu

        DB::table('menus')->insert([
            'name' => 'project',
            'text' => 'content.project',
            'route' => null,
            'icon' => 'mdi-tune',
        ]);

                        DB::table('menus')->insert([
                            'name' => 'project.data',
                            'text' => 'content.data',
                            'father' => 'project',
                            'route' => 'project.index',
                            'icon' => 'mdi-circle-outline',
                        ]);

                        DB::table('menus')->insert([
                            'name' => 'project.stakeholders',
                            'text' => 'content.stakeholders',
                            'father' => 'project',
                            'route' => 'stakeholders.index',
                            'icon' => 'mdi-circle-outline',
                        ]);

                        DB::table('menus')->insert([
                            'name' => 'project.functions',
                            'text' => 'content.functions',
                            'father' => 'project',
                            'route' => 'functions.index',
                            'icon' => 'mdi-circle-outline',
                        ]);

                        DB::table('menus')->insert([
                            'name' => 'project.positions',
                            'text' => 'content.positions',
                            'father' => 'project',
                            'route' => 'positions.index',
                            'icon' => 'mdi-circle-outline',
                        ]);

                        DB::table('menus')->insert([
                            'name' => 'project.sectors',
                            'text' => 'content.sectors',
                            'father' => 'project',
                            'route' => 'sectors.index',
                            'icon' => 'mdi-circle-outline',
                        ]);

                        DB::table('menus')->insert([
                            'name' => 'project.departments',
                            'text' => 'content.departments',
                            'father' => 'project',
                            'route' => 'departments.index',
                            'icon' => 'mdi-circle-outline',
                        ]);

                        DB::table('menus')->insert([
                            'name' => 'project.zones',
                            'text' => 'content.zones',
                            'father' => 'project',
                            'route' => 'zones.index',
                            'icon' => 'mdi-circle-outline',
                        ]);

                        DB::table('menus')->insert([
                            'name' => 'project.locations',
                            'text' => 'content.locations',
                            'father' => 'project',
                            'route' => 'locations.index',
                            'icon' => 'mdi-circle-outline',
                        ]);

                        DB::table('menus')->insert([
                            'name' => 'project.equipments',
                            'text' => 'content.equipments',
                            'father' => 'project',
                            'route' => 'equipments.index',
                            'icon' => 'mdi-circle-outline',
                        ]);
                        
                        DB::table('menus')->insert([
                            'name' => 'project.projectUsers',
                            'text' => 'content.users',
                            'father' => 'project',
                            'route' => 'projectUsers.index',
                            'icon' => 'mdi-circle-outline',
                        ]);

                        DB::table('menus')->insert([
                            'name' => 'project.families',
                            'text' => 'content.families',
                            'father' => 'project',
                            'route' => 'families.index',
                            'icon' => 'mdi-circle-outline',
                        ]);

                        DB::table('menus')->insert([
                            'name' => 'project.categories',
                            'text' => 'content.categories',
                            'father' => 'project',
                            'route' => 'categories.index',
                            'icon' => 'mdi-circle-outline',
                        ]);

                        DB::table('menus')->insert([
                            'name' => 'project.periods',
                            'text' => 'content.periods',
                            'father' => 'project',
                            'route' => '/periods',
                            'icon' => 'mdi-circle-outline',
                        ]);

                        DB::table('menus')->insert([
                            'name' => 'project.shifts',
                            'text' => 'content.shifts',
                            'father' => 'project',
                            'route' => 'turns.index',
                            'icon' => 'mdi-circle-outline',
                        ]);

                        DB::table('menus')->insert([
                            'name' => 'project.parameters',
                            'text' => 'content.parameters',
                            'father' => 'project',
                            'route' => 'project.parameters.index',
                            'icon' => 'mdi-circle-outline',
                        ]);

                        

        // Administration Menu 

        DB::table('menus')->insert([
            'name' => 'administration',
            'text' => 'content.administration',
            'route' => null,
            'icon' => 'mdi-face-agent',
        ]);

                        DB::table('menus')->insert([
                            'name' => 'administration.technology',
                            'text' => 'content.technology',
                            'father' => 'administration',
                            'route' => null,
                            'icon' => 'fa fa-laptop',
                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'administration.technology.requests',
                                            'text' => 'content.requests',
                                            'father' => 'administration.technology',
                                            'route' => '',
                                            'icon' => 'fa fa-ticket',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'administration.technology.assignments.',
                                            'text' => 'content.assignments',
                                            'father' => 'administration.technology',
                                            'route' => 'technology.stakeholderPeople.index',
                                            'icon' => 'fa fa-laptop',
                                        ]);

                        DB::table('menus')->insert([
                            'name' => 'administration.services',
                            'text' => 'content.services',
                            'father' => 'administration',
                            'route' => null,
                            'icon' => 'fa fa-support',
                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'administration.services.requests',
                                            'text' => 'content.requests',
                                            'father' => 'administration.services',
                                            'route' => null,
                                            'icon' => 'fa fa-ticket',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'administration.services.catering',
                                            'text' => 'content.catering',
                                            'father' => 'administration.services',
                                            'route' => null,
                                            'icon' => 'fa fa-cutlery',
                                        ]);
        

        // Production Menu 

        DB::table('menus')->insert([
            'name' => 'production',
            'text' => 'content.production',
            'route' => null,
            'icon' => 'mdi-dump-truck',
        ]);

                        DB::table('menus')->insert([
                            'name' => 'production.workbook',
                            'text' => 'content.workbook',
                            'father' => 'production',
                            'route' => null,
                            'icon' => 'fa fa-book',
                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'production.workbook.documents',
                                            'text' => 'content.documents',
                                            'father' => 'production.workbook',
                                            'route' => null,
                                            'icon' => 'fa fa-file-text',
                                        ]);

                                                        DB::table('menus')->insert([
                                                            'name' => 'production.workbook.documents.folios',
                                                            'text' => 'content.folios',
                                                            'father' => 'production.workbook.documents',
                                                            'route' => 'folios.index',
                                                            'icon' => 'mdi-circle-outline',
                                                        ]);

                                                        DB::table('menus')->insert([
                                                            'name' => 'production.workbook.documents.dailyReports',
                                                            'text' => 'content.dailyreports',
                                                            'father' => 'production.workbook.documents',
                                                            'route' => 'dailyReports.index',
                                                            'icon' => 'mdi-circle-outline',
                                                        ]);

                                                        DB::table('menus')->insert([
                                                            'name' => 'production.workbook.documents.notes',
                                                            'text' => 'content.notes',
                                                            'father' => 'production.workbook.documents',
                                                            'route' => 'notes.index',
                                                            'icon' => 'mdi-circle-outline',
                                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'production.workbook.reports',
                                            'text' => 'content.reports',
                                            'father' => 'production.workbook',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);

                                                        DB::table('menus')->insert([
                                                            'name' => 'production.workbook.reports.folios',
                                                            'text' => 'content.folios',
                                                            'father' => 'production.workbook.reports',
                                                            'route' => null,
                                                            'icon' => 'mdi-circle-outline',
                                                        ]);

                                                        DB::table('menus')->insert([
                                                            'name' => 'production.workbook.reports.dailyReports',
                                                            'text' => 'content.dailyreports',
                                                            'father' => 'production.workbook.reports',
                                                            'route' => null,
                                                            'icon' => 'mdi-circle-outline',
                                                        ]);

                                                        DB::table('menus')->insert([
                                                            'name' => 'production.workbook.reports.notes',
                                                            'text' => 'content.notes',
                                                            'father' => 'production.workbook.reports',
                                                            'route' => null,
                                                            'icon' => 'mdi-circle-outline',
                                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'production.workbook.settings',
                                            'text' => 'content.settings',
                                            'father' => 'production.workbook',
                                            'route' => null,
                                            'icon' => 'fa fa-cogs',
                                        ]);

                                                        DB::table('menus')->insert([
                                                            'name' => 'production.workbook.settings.users',
                                                            'text' => 'content.users',
                                                            'father' => 'production.workbook.settings',
                                                            'route' => 'workbook_settings_users',
                                                            'icon' => 'mdi-circle-outline',
                                                        ]);

                                                        DB::table('menus')->insert([
                                                            'name' => 'production.workbook.settings.locations',
                                                            'text' => 'content.locations',
                                                            'father' => 'production.workbook.settings',
                                                            'route' => 'workbook_settings_locations',
                                                            'icon' => 'mdi-circle-outline',
                                                        ]);

        // Commercial Menu
        
        DB::table('menus')->insert([
            'name' => 'commercial',
            'text' => 'content.commercial',
            'route' => null,
            'icon' => 'mdi-cash',
        ]);

                        DB::table('menus')->insert([
                            'name' => 'commercial.controls',
                            'text' => 'content.controls',
                            'father' => 'commercial',
                            'route' => null,
                            'icon' => 'fa fa-check-square-o',
                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'commercial.controls.needRequests',
                                            'text' => 'messages.needRequests',
                                            'father' => 'commercial.controls',
                                            'route' => 'needRequests.index',
                                            'icon' => 'fa fa-list',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'commercial.controls.receptions',
                                            'text' => 'content.receptions',
                                            'father' => 'commercial.controls',
                                            'route' => 'receptions.index',
                                            'icon' => 'fa fa-inbox',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'commercial.controls.destocking',
                                            'text' => 'content.destocking',
                                            'father' => 'commercial.controls',
                                            'route' => 'destockingRequests.index',
                                            'icon' => 'fa fa-arrow-left',
                                        ]);



                        DB::table('menus')->insert([
                            'name' => 'commercial.materials',
                            'text' => 'content.materials',
                            'father' => 'commercial',
                            'route' => null,
                            'icon' => 'fa fa-cubes',
                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'commercial.materials.record',
                                            'text' => 'content.record',
                                            'father' => 'commercial.materials',
                                            'route' => 'materials.index',
                                            'icon' => 'fa fa-pencil',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'commercial.materials.stockingUp',
                                            'text' => 'messages.stockingUp',
                                            'father' => 'commercial.materials',
                                            'route' => null,
                                            'icon' => 'fa fa-arrow-right',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'commercial.materials.reports',
                                            'text' => 'content.reports',
                                            'father' => 'commercial.materials',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);

                        DB::table('menus')->insert([
                            'name' => 'commercial.purchases',
                            'text' => 'content.purchases',
                            'father' => 'commercial',
                            'route' => null,
                            'icon' => 'fa fa-shopping-cart',
                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'commercial.purchases.purchaseRequests',
                                            'text' => 'messages.purchaseRequests',
                                            'father' => 'commercial.purchases',
                                            'route' => 'purchaseRequests.index',
                                            'icon' => 'fa fa-check-square',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'commercial.purchases.quotations',
                                            'text' => 'content.quotations',
                                            'father' => 'commercial.purchases',
                                            'route' => 'quotations.index',
                                            'icon' => 'fa fa-money',
                                        ]);
                                        
                                        DB::table('menus')->insert([
                                            'name' => 'commercial.purchases.purchaseOrders',
                                            'text' => 'messages.purchaseOrders',
                                            'father' => 'commercial.purchases',
                                            'route' => 'purchaseOrders.index',
                                            'icon' => 'fa fa-file-text-o',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'commercial.purchases.reports',
                                            'text' => 'content.reports',
                                            'father' => 'commercial.purchases',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);

                        /* DB::table('menus')->insert([
                            'name' => 'commercial.contracts',
                            'text' => 'content.contracts',
                            'father' => 'commercial',
                            'route' => null,
                            'icon' => 'fa fa-bookmark',
                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'commercial.contracts.serviceRequests',
                                            'text' => 'messages.serviceRequests',
                                            'father' => 'commercial.contracts',
                                            'route' => 'serviceRequests.index',
                                            'icon' => 'fa fa-check-square',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'commercial.purchases.proposals',
                                            'text' => 'content.proposals',
                                            'father' => 'commercial.contracts',
                                            'route' => 'serviceProposals.index',
                                            'icon' => 'fa fa-money',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'commercial.contracts.serviceOrders',
                                            'text' => 'messages.serviceOrders',
                                            'father' => 'commercial.contracts',
                                            'route' => 'purchaseOrders.index',
                                            'icon' => 'fa fa-file-text-o',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'commercial.contracts.reports',
                                            'text' => 'content.reports',
                                            'father' => 'commercial.contracts',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]); */
                        
                        DB::table('menus')->insert([
                            'name' => 'commercial.warehouses',
                            'text' => 'content.warehouses',
                            'father' => 'commercial',
                            'route' => null,
                            'icon' => 'fa fa-industry',
                        ]);             

                                        DB::table('menus')->insert([
                                            'name' => 'commercial.warehouses.record',
                                            'text' => 'content.record',
                                            'father' => 'commercial.warehouses',
                                            'route' => 'warehouses.index',
                                            'icon' => 'fa fa-pencil',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'commercial.warehouses.reports',
                                            'text' => 'content.reports',
                                            'father' => 'commercial.warehouses',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);

                        DB::table('menus')->insert([
                            'name' => 'commercial.assets',
                            'text' => 'content.assets',
                            'father' => 'commercial',
                            'route' => null,
                            'icon' => 'fa fa-cube',
                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'commercial.assets.record',
                                            'text' => 'content.record',
                                            'father' => 'commercial.assets',
                                            'route' => null,
                                            'icon' => 'fa fa-pencil',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'commercial.assets.assignments',
                                            'text' => 'content.assignments',
                                            'father' => 'commercial.assets',
                                            'route' => null,
                                            'icon' => 'fa fa-check-square',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'commercial.assets.updates',
                                            'text' => 'content.updates',
                                            'father' => 'commercial.assets',
                                            'route' => null,
                                            'icon' => 'fa fa-refresh',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'commercial.assets.reports',
                                            'text' => 'content.reports',
                                            'father' => 'commercial.assets',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);


        // Persons Menu 

        DB::table('menus')->insert([
            'name' => 'people',
            'text' => 'content.people',
            'route' => null,
            'icon' => 'mdi-account',
        ]);
                        DB::table('menus')->insert([
                            'name' => 'people.record',
                            'text' => 'content.record',
                            'father' => 'people',
                            'route' => 'people.index',
                            'icon' => 'fa fa-pencil',
                        ]);

                        DB::table('menus')->insert([
                            'name' => 'people.payroll',
                            'text' => 'content.payroll',
                            'father' => 'people',
                            'route' => 'employees.index',
                            'icon' => 'fa fa-list',
                        ]);

                        DB::table('menus')->insert([
                            'name' => 'people.timesheet',
                            'text' => 'content.timesheet',
                            'father' => 'people',
                            'route' => null,
                            'icon' => 'fa fa-table',
                        ]);
        
        // Safety & Health Menu 

        DB::table('menus')->insert([
            'name' => 'shw',
            'text' => 'content.safetyAndHealth',
            'route' => null,
            'icon' => 'mdi-safety-goggles',
        ]);

                        DB::table('menus')->insert([
                            'name' => 'shw.ppes',
                            'text' => 'content.ppes',
                            'father' => 'shw',
                            'route' => null,
                            'icon' => 'fa fa-medkit',
                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'shw.ppes.assignments',
                                            'text' => 'content.assignments',
                                            'father' => 'shw.ppes',
                                            'route' => null,
                                            'icon' => 'fa fa-check-square',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'shw.ppes.rules',
                                            'text' => 'content.rules',
                                            'father' => 'shw.ppes',
                                            'route' => null,
                                            'icon' => 'fa fa-list',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'shw.ppes.reports',
                                            'text' => 'content.reports',
                                            'father' => 'shw.ppes',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);

                        DB::table('menus')->insert([
                            'name' => 'shw.health',
                            'text' => 'content.health',
                            'father' => 'shw',
                            'route' => null,
                            'icon' => 'fa fa-heart',
                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'shw.health.history',
                                            'text' => 'content.history',
                                            'father' => 'shw.health',
                                            'route' => null,
                                            'icon' => 'fa fa-folder-open',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'shw.health.record',
                                            'text' => 'content.record',
                                            'father' => 'shw.health',
                                            'route' => null,
                                            'icon' => 'fa fa-list',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'shw.health.reports',
                                            'text' => 'content.reports',
                                            'father' => 'shw.health',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);

                        DB::table('menus')->insert([
                            'name' => 'shw.access',
                            'text' => 'content.access',
                            'father' => 'shw',
                            'route' => null,
                            'icon' => 'fa fa-sign-in',
                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'shw.access.requirements',
                                            'text' => 'content.requirements',
                                            'father' => 'shw.access',
                                            'route' => null,
                                            'icon' => 'fa fa-list',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'shw.access.profiles',
                                            'text' => 'content.profiles',
                                            'father' => 'shw.access',
                                            'route' => null,
                                            'icon' => 'fa fa-user',
                                        ]);


                                        DB::table('menus')->insert([
                                            'name' => 'shw.access.organizations',
                                            'text' => 'content.organizations',
                                            'father' => 'shw.access',
                                            'route' => null,
                                            'icon' => 'fa fa-institution',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'shw.access.checkings',
                                            'text' => 'content.checkings',
                                            'father' => 'shw.access',
                                            'route' => null,
                                            'icon' => 'fa fa-search',
                                        ]);

                                        DB::table('menus')->insert([
                                            'name' => 'shw.access.reports',
                                            'text' => 'content.reports',
                                            'father' => 'shw.access',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);
    }
}
