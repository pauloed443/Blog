<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserAdministradorCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAdmin = User::where('email', 'admin.mw@miniwater.com.br')->where('admin', 'S')->first();
        if (empty($userAdmin)) {
            $data['name'] = 'Administrador';
            $data['email'] = 'admin.mw@miniwater.com.br';
            $data['password'] = Hash::make('12345678');
            $data['admin'] = 'S';

            User::create($data);
        }
    }
}
