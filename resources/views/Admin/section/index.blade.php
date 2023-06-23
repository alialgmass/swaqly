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
                                <th>الأسم</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($Section as $section)
                                <tr>
                                    <td>{{ $section->name }}</td>
                                    <td><a href="{{route('section.edit',$section->id)}}" class="btn btn-primary">
                                       تعديل
                                    </a></td>
                                    <td><form method="post" action="{{route('section.destroy',$section->id)}}">@csrf<button class="btn btn-danger btn-circle btn-sm" type="sumbit">
                                          حذف
                                        </buttton></form></td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
@if ($Section->lastPage() > 1)
    <ul class="pagination">
        @for ($i = 1; $i <= $Section->lastPage(); $i++)
        <a href="{{ url('/admin/section?page=' . $i) }}" >
            <li class="{{ ($Section->currentPage() == $i) ? 'btn btn-danger' : 'btn btn-primary' }}">
                {{ $i }}
            </li>
            </a>
        @endfor
    </ul>
@endif

                </div>
            </div>
        </div>


@endsection
