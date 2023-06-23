@extends('layouts.admin')
@section('content')
    <div class="container-fluid" style="min-height: 100vh;" >

        <!-- Page Heading -->
      
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">المنتجات</h6>
            </div>
            <div class="card-body">
             
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>الأسم</th>
                                
                             
                                 <th>السعر</th>
                            
                                 <th>القسم</th>
                             
                         
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($Product as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                   
                                      <td>{{ $product->price }}</td>
                                  <td>{{ $product->category->name }}</td>
                                  
                                      
                                  
                                    <td><a href="{{route('product.edit',$product->id)}}" class="btn btn-primary">
                                       تعديل
                                    </a></td>
                                    <td><form method="post" action="{{route('product.destroy',$product->id)}}">@csrf<button class="btn btn-danger btn-circle btn-sm" type="sumbit">
                                            حذف
                                        </buttton></form></td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>


                </div>
            </div>
        </div>

    </div>
@endsection
