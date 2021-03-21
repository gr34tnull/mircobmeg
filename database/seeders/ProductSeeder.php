<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new ProductImport, 'public/excel/product.xlsx');
    }
}
