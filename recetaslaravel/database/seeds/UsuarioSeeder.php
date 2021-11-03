<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>"root",
            'email'=>"root@root.com",
            'password'=>Hash::make("root1234"),
            'url'=>"http//root.com.art/index.html",
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name'=>"Admin",
            'email'=>"rootA@root.com",
            'password'=>Hash::make("root1234"),
            'url'=>"http//rooZt.com.art/index.html",
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }
}
