@extends('layouts.backend.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
     <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Stock</h1>
            </div><!-- /.col -->
                
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Transaction</li>
                    <li class="breadcrumb-item active">Stock</li>
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
                            <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search Product">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                        </form> 
                        </div>
                        

                        <div class="card-tools">
                            <a href="stock/export" class="btn btn-success">Export <i class="fas fa-file-export"></i></a>
                            <a href="stock/print" target="_blank" class="btn btn-primary">Print <i class="fas fa-print"></i></a>
                        </div>
                    </div>

                    <div>
                        <button class="btn btn-success" style=" margin : 20px 100px 20px 450px;">Query not insert</button>
                    </div>


                  

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
                        