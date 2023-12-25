@extends('frontend.layouts.app')
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <form action="{{route('students.update', ['id' => $student->id])}}" method="POST" class="mt-3">
                @csrf @method('put')
                <div class="card">
                    <div class="card-header">
                        <h1>Edit Student Profile</h1>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{old('name', $student->name)}}" id="">
                        </div>
                        <div class="mb-3">
                            <label for="">Roll Number</label>
                            <input type="text" name="roll_no" class="form-control" value="{{old('roll_no', $student->roll_no)}}" id="">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" value="{{old('email', $student->email)}}" id="">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>


                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
