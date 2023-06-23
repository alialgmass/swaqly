@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">الأقسام</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>الصورة</th>
                            <th>حذف</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($Img_product as $img_product)
                            <tr>


                                <td><img src="{{asset('images/'. $img_product->img) }}" style="width:50px;height:50px"></td>

<td>
                                <form method="post" action="{{ route('admin.img_product.destroy', $img_product->id) }}">
                                    @csrf<button class="btn btn-danger btn-circle btn-sm" type="sumbit">
                                        حذف
                                        </buttton>
                                </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <tbody>
                        <tr>
                            <form action="{{ route('admin.img_product.store') }}" method="post"
                              enctype="multipart/form-data">
                                @csrf
                                <td>اضافة صورة</td>
                                <td>


                                    <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                        name="img">
                                    <input  type="hidden" name="product_id" value="{{$id}}">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary">احفظ</button>
                                </td>

                            </form>

                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
