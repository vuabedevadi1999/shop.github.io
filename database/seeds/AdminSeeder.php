<?php

use Illuminate\Database\Seeder;
use App\tb_admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $tb_admin = new tb_admin();
       $tb_admin->admin_email = 'phamducdo9@gmail.com';
       $tb_admin->admin_name = 'Pham Duc Do';
        $tb_admin->admin_phone = '0983551897';
       $tb_admin->admin_password ="123456789";
       $tb_admin->save();
    }
}
