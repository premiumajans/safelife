<?php

namespace Database\Seeders;

use App\Models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            ['name' => 'phone', 'link' => '+994125144344'],
            ['name' => 'fax', 'link' => '+994125144344'],
            ['name' => 'email_info', 'link' => 'info@safelife.az'],
            ['name' => 'email_office', 'link' => 'office@safelife.az'],
            ['name' => 'address_az', 'link' => 'Binəqədi r-nu, Z. Bünyadov pr. 43 Azərbaycan, Bakı AZ1069'],
            ['name' => 'address_en', 'link' => 'Binagadi district, Z. Bunyadov pr. 43 Azerbaijan, Baku AZ1069'],
            ['name' => 'address_ru', 'link' => 'Бинагадинский район, пр. З.Буньядова. 43 Азербайджан, Баку AZ1069'],
        ];
        foreach ($settings as $key => $setting) {
            $set = new Setting();
            $set->name = $setting['name'];
            $set->link = $setting['link'];
            $set->status = 1;
            $set->save();
        }
    }
}
