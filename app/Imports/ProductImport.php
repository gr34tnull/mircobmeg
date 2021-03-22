<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name' => $row['name'],
            'price' => is_null($row['price']) ? null : $row['price'],
            'category' => $row['category'],
            'shopee' => is_null($row['shopee']) ? null : $row['shopee'],
            'description' => $row['description'],
            'usage' => is_null($row['usage']) ? null : $row['usage'],
            'image' => is_null($row['image']) ? null : $row['image'],
        ]);
    }
}
