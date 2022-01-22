<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;
use App\Models\Program;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partners = Partner::factory(2)->create();

        foreach($partners as $partner){

            Program::factory(1)->create([
                'partner_id' => $partner->id
            ]);
            
        }
    }
}
