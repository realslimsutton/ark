<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $schema = $this->getSchema();

        $permissions = $this->createPermissions($schema);

        foreach ($schema as $roleSchema) {
            $role = Role::create(collect($roleSchema)->except(['permissions'])->all());

            $role->givePermissionTo(
                collect($permissions)->filter(fn($value, $key) => in_array($key, $roleSchema['permissions']))
            );
        }
    }

    private function createPermissions(array $schema): array
    {
        $permissionNames = collect($schema)->pluck('permissions')->flatten()->unique();

        $permissions = [];
        foreach ($permissionNames as $name) {
            $permissions[$name] = Permission::create(['name' => $name]);
        }

        return $permissions;
    }

    private function getSchema(): array
    {
        $weight = 1;
        return [
            [
                'name' => 'primitive',
                'title' => 'Primitive',
                'weight' => $weight++,
                'colour' => '#808080',
                'requirement' => 0,
                'permissions' => []
            ],
            [
                'name' => 'ramshackle',
                'title' => 'Ramshackle',
                'weight' => $weight++,
                'colour' => '#368A5E',
                'requirement' => 9,
                'permissions' => []
            ],
            [
                'name' => 'apprentice',
                'title' => 'Apprentice',
                'weight' => $weight++,
                'colour' => '#6362CE',
                'requirement' => 19,
                'permissions' => []
            ],
            [
                'name' => 'journeyman',
                'title' => 'Journeyman',
                'weight' => $weight++,
                'colour' => '#925CE2',
                'requirement' => 29,
                'permissions' => []
            ],
            [
                'name' => 'mastercraft',
                'title' => 'Mastercraft',
                'weight' => $weight++,
                'colour' => '#DDDB69',
                'requirement' => 39,
                'permissions' => []
            ],
            [
                'name' => 'ascendant',
                'title' => 'Ascendant',
                'weight' => $weight++,
                'colour' => '#00FFE7',
                'requirement' => 300,
                'permissions' => []
            ],
            [
                'name' => 'manager',
                'title' => 'Manager',
                'weight' => $weight++,
                'colour' => '#AD2727',
                'permissions' => [
                    'view admin'
                ]
            ],
            [
                'name' => 'administrator',
                'title' => 'Administrator',
                'weight' => $weight++,
                'colour' => '#6DC426',
                'permissions' => [
                    'view admin'
                ]
            ]
        ];
    }
}
