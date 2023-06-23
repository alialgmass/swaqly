@extends('layouts.admin')
@section('title', 'اللوحة الرئيسية')
@section('content')

    <div class="content-header row">
    </div>
    <div class="content-body">
        <div id="crypto-stats-3" class="row">
           
            
        </div>
        <!-- Candlestick Multi Level Control Chart -->

        <!-- Active Orders -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">المنتجات المضافة مؤخرا</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                           
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-de mb-0">
                                <thead>
                                    <tr>
                                        <th>التاريخ</th>
                                        <th>الاسم</th>
                                        <th>السعر</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                             @foreach ($Product as $product)
                               <tr>
                               <td>{{$product->created_at}}</td>
                                 <td>{{$product->name}}</td>
                                     <td>{{$product->price}}</td>
                                     </tr>
                             @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
