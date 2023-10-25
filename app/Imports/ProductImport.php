<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class ProductImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'brand_id' => $row[1],
            'category_id' => $row[2],
            'subcategory_id' => $row[3],
            'product_name' => $row[4],
            'product_slug' => $row[5],
            'product_code' => $row[6],
            'product_qty' => $row[7],
            'selling_price' => $row[11],
            'short_descp' => $row[13],
            'long_descp' => $row[14],
            'status' => $row[21],

        ]);
    }
}
