@extends('layouts.admin')
@section('content')
 <div class="container-fluid" style="min-height: 100vh;">
 <h4>تعديل قسم</h4>
<form method="post" action="{{route('section.update',$id)}}">
@csrf
 
   <div class="form-group">
    <label for="exampleFormControlInput1">الأسم</label>
    <input type="text" class="form-control"  placeholder="اكتب الأسم" name="name" value={{$name}} >
  </div>
  
  <button type="submit" class="btn btn-primary">احفظ</button>
</form>
</div>
@endsection