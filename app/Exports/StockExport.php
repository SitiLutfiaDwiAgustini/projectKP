<?php

namespace App\Exports;

use App\Models\Model\Master\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class StockExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }
}
