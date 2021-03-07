<?php
 
namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Model\Master\Product;
use App\Exports\StockExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class StockController extends Controller
{
    public function index()
    {
        $product=Product::paginate(3);
        return view('Transaction.Stock.index', compact('product'));
    }

    public function print()
    {
        $product=Product::get();
        return view('Transaction.Stock.print', compact('product'));
    }

    public function update(Request $request, $id)
    {
      $is_ready= Product::where('is_ready')->first();
      $input = $request->input('stock_available');
      $product=\DB::table('products')->where('id', $id)->first();
      $updateStock = $product->stock_available + $input;
      $totalStock = $product->stock_total + $input;
      $totalStockNol = $product->stock_total;
      date_default_timezone_set('Asia/Jakarta');
      $current_date_time = \Carbon\Carbon::now()->toDateTimeString();

        if($updateStock < 0)
        { 
            $is_ready = 0; 
            $updateStock = 0;
            $totalStock = $product->stock_total;
        } 
        else 
        {  
            $is_ready = 1;
        }

        \DB::table('products')->where('id', $id)->update([

            'stock_available' => $updateStock,
            'stock_total' => $totalStock,
            'updated_at' => $current_date_time,
            'is_ready' => $is_ready
        ]);
        return redirect()->back();
    }
    

    public function stockExport()
    {
        return Excel::download(new StockExport, 'Stock.xlsx');
    }

    public function search(Request $request)
    {
        $search_text = $_GET['query'];
        $name = Product::where('nama')->get();
        $product = Product::where('nama', 'LIKE', '%'.$search_text.'%')->get();


        if (!empty($search_text) && !$product->isEmpty()) 
        {
          return view('Transaction.Stock.search', compact('product'));
        } 
        else
        { 
          return view('Transaction.Stock.search2', compact('product'));
        }
    }
}
