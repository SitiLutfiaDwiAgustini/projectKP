<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Model\Master\Product;
use Illuminate\Support\Facades\Validator;
use TJGazel\Toastr\Facades\Toastr;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $products = DB::table('products')->get();
        return view('Product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        DB::table('products')->insert([
            'code' => $request->code,
            'name' => $request->name,
            'stock_available' => $request->stockAvailable,
            'purchase_price' => $request->purchasePrice,
            'selling_price' => $request->sellingPrice,
            'status' => $request->status,
            'information' => $request->information
        ]);
        /*
        if($validator->fails()){
            Toastr::warning('Product code or Product name cannot be repeated.', 'Warning');
            return Redict::back()->withErrors($validator)->withInput();
        }
        else{
            $data = new Product();
            $data->code = $request->code;
            $data->name = $request->name;
            $data->selling_price = $request->sellingPrice;
            $data->purchase_price = $request->purchasePrice;
            $data->stock_available = $request->stockAvailable;
            $data->stock_total = $request->stockAvailable;
            $data->information = $request->information;
            $data->active = $request->status;
            $data->user_modified = $request->user()->id;

            if($data->save()){
                Toastr::success('Product created Successfully', 'Success');
                return redirect()->route('product.index');
            }
            else{
                Toastr::error('Product created Successfully', 'Error');
                return redirect()->back();
            }
        }
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function datatable()
    {
        $data = Product::where('active', '!=', 2);
        return Datatables::of($data)
            ->addColumn('action', function($data){
                $url_edit = url('master/product/'.$data->id.'/edit');
                $url = url('master/product/'.$data->id);
                $url_history = url('master/product/history/'.$data->id);
                $view = "<a class='btn btn-action btn-primary' href='".$url."' title='View'><i class='nav-icon fas fa-eye'></i></a>";
                $edit = "<a class='btn btn-action btn-warning' href='".$url_edit."' title='Edit'><i class='nav-icon fas fa-edit'></i></a>";
                $delete = "<button data-url='".$url."' onclick='deleteData(this)' class='btn btn-action btn-danger' title='Delete'><i class='nav-icon fas fa-trash-alt'></i></button>";
                $history = "<a class='btn btn-action btn-warning' href='".$url_history."' title='History'>Purchase Detail</a>";

                return $view."".$edit."".$delete."".$history;
            })
            ->editColumn('purchase_price', function($data){
                return number_format($data->purchase_price, O, '.', '.');
            })
            ->editColumn('selling_price', function($data){
                return number_format($data->selling_price, O, '.', '.');
            })
            ->editColumn('information', function($data){
                $string_replace = str_ireplace("\r\n", '.', $data->information);
                return str::limit($string_replace, 30, '...');
            })
            ->rawColumns(['action'])
            ->editColumn('id', 'ID:{{$id}}')
            ->make(true);
    }
}
