<?php

namespace Modules\Moving\Database\Seeders\Start;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use \Modules\System\Entities\Module;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $module = Module::where('name', 'moving')->first();

        if (empty($module)) {

            $module = Module::factory()->create([
                'name' => 'moving',
                'color' => '#45b877',
                'image' => 'mdi-clipboard-edit-outline',
                'description' => 'moving, packing, orders and customers management...',
            ]);

            $this->command->info("INFO: Module was created: {$module->name}");

        } else {
            $this->command->warn("INFO: Module alredy exist: {$module->name}");
        }
    }
}
