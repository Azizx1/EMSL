@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">Create Course</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Fill the form with course information:

                        <form method="POST" action="/admin/course" >
                            @csrf
                            <label for="name">Course name: <input type="text" name="name"/></label> <br>
                            <label for="department">Department: <input type="text" name="department"/></label> <br>
                            <label for="num_chapters">Number of chapters: <input type="number" name="num_chapters"/></label>
                            <br>
                            <label for="cc_id">Choose course coordinator:
                                <select name="cc_id">
                                    @foreach($fms as $fm)
                                        <option value="{{$fm->id}}">{{$fm->name}}</option>
                                    @endforeach
                                </select>
                            </label> <br>
                            <button type="submit"> Create </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
