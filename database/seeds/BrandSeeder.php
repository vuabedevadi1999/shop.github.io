<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Brand::class, 100)->create();
//        for($i=0;$i<5;$i++){
//            if($i%2==0){
//                $brand_status = 0;
//            }else {
//                $brand_status = 1;
//            }
//            DB::table('brands')->insert([
//                'brand_name'=>'brandName'.$i,
//                'brand_desc'=>'brandDes'.$i,
//                'brand_status'=>$brand_status,
//            ]);
//        }
    }
}
