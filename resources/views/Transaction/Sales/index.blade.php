@extends('layouts.backend.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
     <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Sales</h1>
            </div><!-- /.col -->
                
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Transaction</li>
                    <li class="breadcrumb-item active">Sales</li>
                </ol>
            </div><!-- /.col -->
         </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
 <!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row"> 
            <div class="col-md-12">
                <div class="card card-info">


                    <div class="card-header"> 
                        <div class="float-left">
                            <form class="form-inline my-2 my-lg-0" type="get" action="{{url('search')}}">
                            <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                        </form> 
                        </div>
                        

                        <div class="card-tools">
                            <a href="stock/export" class="btn btn-success">Export <i class="fas fa-file-export"></i></a>
                            <a href="stock/print" target="_blank" class="btn btn-primary">Print <i class="fas fa-print"></i></a>
                        </div>
                    </div>


                    <div class="card-body">
                        <table class="table table-bordered"> 
                            <tr>
                                <th>ID</th>
                                <th>Jumlah Pesanan</th>
                                <th>Total Harga</th>
                                <th>Product ID</th>
                                <th>Pesanan ID</th>
                                <th>Status</th>
                            </tr>
                        </table>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
                        