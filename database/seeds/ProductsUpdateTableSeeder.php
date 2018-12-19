<?php

use App\Product;
use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;


class ProductsUpdateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Product $queryProd)
    {

        $filename = 'update.xlsx';
        $path =  public_path('files\\' . $filename);

//        dd($path);

        $collection = (new FastExcel)->import($path);

        $this->command->getOutput()->progressStart(count($collection));

        $collection->filter()->each(function($item) {
                Product::create([
                    'title' => $item['name'],
                    'date_expiration' => $item['date_expiration'],
                    'unit' => $item['unit'],
                    'pcs' => $item['pcs'],
                    'user_id' => 1,
                    'status' => 'Y',
                    'category_id' => $item['category_id'],
                ]);

            $this->command->getOutput()->progressAdvance();
        });

        $this->command->getOutput()->progressFinish();
        $this->command->comment(date('Y-m-d H:i:s'));

//        $users = (new FastExcel)->import('file.xlsx', function ($line) {
//            return User::create([
//                'name' => $line['МСК Томилино НОВЫЙ'],
//                'email' => $line['Email']
//            ]);
//        });

    }
}
