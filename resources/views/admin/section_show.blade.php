@extends('layouts.app')

<style>
    .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 16px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
    }

    .button1 {
        background-color: white;
        color: black;
        border: 2px solid rgb(88, 151, 163);
        border-radius: 0.25rem;
    }

    .button1:hover {
        background-color: rgb(88, 151, 163);
        color: white;
    }

    .button2 {
        background-color: white;
        color: black;
        border: 2px solid #f44336;
        border-radius: 0.25rem;
    }

    .button2:hover {
        background-color: #f44336;
        color: white;
    }
</style>

@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="/admin">Home</a></li>
        <li><a href="/admin/course">Courses</a></li>
        <li><a href="/admin/course/{{$course->id}}">{{$course->name}}</a></li>
        <li>Section {{$section->id}}</li>
    </ul>
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" style="background:rgba(88,152,164,1)">Section {{$section->id}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <form method="POST" action="/admin/section/{{$section->id}}" >
                            @csrf
                            <input type="hidden" name="course_id" value="{{$course->id}}"/> <br>
                            <label for="fm_id">Choose Instructor:
                                <select name="fm_id">
                                    @foreach($fms as $fm)
                                        <option value="{{$fm->id}}">{{$fm->name}}</option>
                                    @endforeach
                                </select>
                            </label> <br>
                            <button type="submit" class="button1"> Submit </button>
                        </form>

                        <form action="/admin/section/{{$section->id}}" method="post" style="display: inline">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Delete Section" class="button2"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
