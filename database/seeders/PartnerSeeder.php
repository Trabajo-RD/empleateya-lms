<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;
use App\Models\Program;
use Illuminate\Support\Str;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partner::create([
            'title' => 'Microsoft Coorporation',
            'slug' => Str::slug('Microsoft Coorporation'),
            'content' => null,
            'link' => null
        ]);

        // CREATE FACTORY FAKER PARTNERS

        // $partners = Partner::factory(2)->create();

        // foreach($partners as $partner){

        //     Program::factory(1)->create([
        //         'partner_id' => $partner->id
        //     ]);

        // }
    }
}
