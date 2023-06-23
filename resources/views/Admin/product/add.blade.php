@extends('layouts.admin')
@section('content')
 <div class="container-fluid" style="min-height: 100vh;">
 <h4>إضافة منتج</h4>
<form method="post" action="{{route('product.store')}}">
@csrf
 <div class="form-group">
    <label for="exampleFormControlInput1">الأسم</label>
    <input type="text" class="form-control"  placeholder="اكتب الأسم" name="name" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">القسم</label>
    <select class="form-control" name="section_id">
     @foreach ($Section as $section )
        <option value="{{$section->id}}">{{$section->name}}</option>
     @endforeach
    </select>
  </div>
  <div class="form-group">
    <label ">سعر المنتج</label>
    <input type="number" class="form-control"  placeholder="السعر" name="price" >
  
  </div>
   <div class="form-group">
    <label ">الكمية</label>
    <input type="number" class="form-control"  placeholder="الكمية" name="count" >
  
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">وصف المنتج</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
  
  </div>
    <button type="submit" class="btn btn-primary ">Confirm identity</button>
</form>
</div>
@endsection