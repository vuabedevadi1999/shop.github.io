<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0;$i<100;$i++){
            $category = new Category();
            $category->category_name = $faker->name;
            $category->category_desc = $faker->paragraph(1000);
            if($i%2==0){
                $category->category_status = STATUS_PRODUCT_NONACTIVE;
            }else {
                $category->category_status = STATUS_PRODUCT_ACTIVE;
            }
            $category->save();
        }
    }
}
