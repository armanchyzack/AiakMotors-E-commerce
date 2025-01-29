<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\footer;
use App\Models\Social;
use App\Models\CompanyInfo;
use App\Models\PopUpMessage;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('password');
        $user->save();
        $user->assignRole('admin');
        $user = new User();
        $user->name = 'testuser';
        $user->email = 'test@gmail.com';
        $user->password = Hash::make('password');
        $user->save();
        $user->assignRole('user');

        $socials = new Social();
        $socials->facebook = 'www.facebook.com';
        $socials->messanger = 'www.messanger.com';
        $socials->whatsapp = 'www.whatsapp.com';
        $socials->save();

        $footer = new footer();
        $footer->details = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum, consequatur.';
        $footer->save();


        $company = new CompanyInfo();
        $company->phone_number ='12345678910';
        $company->email ='email@gmail.com';
        $company->details ='lorem10';
        $company->address ='adsda';
        $company->address_map_link ='adsda';
        $company->save();

        $popup = new PopUpMessage();
        $popup->description ='lorem10';
        $popup->save();

    }
}
