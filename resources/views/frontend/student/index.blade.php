@extends('frontend.layouts.app')
@section('main-content')
    <div class="container">
        <div class="mt-3">
            <div>
                <h1>All Students Data</h1>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="search" name="search" value="" placeholder="Search student...">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <tr class="">
                        <th scope="col">#</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Roll Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="allData">
                    @foreach ($students as $key => $student)
                        <tr class="">
                            <td scope="row">{{ $key + 1 }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->roll_no }}</td>
                            <td>{{ $student->email }}</td>
                            <td>
                                <a href="{{ route('student.edit', ['id' => $student->id]) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('student.destroy', ['id' => $student->id]) }}" class="btn btn-danger">Delete</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
                <tbody id="content" class="searchData"></tbody>
            </table>
        </div>
        <div>
            {{$students->links()}}
        </div>
    </div>
@endsection
@section('customJs')
    <script>
        $(document).ready(function (){
            // alert('ok');
            $('#search').on('input', function (e){
                e.preventDefault();
                var value = $(this).val();
                if(value){
                    $('.allData').hide();
                    $('.searchData').show();
                }else{
                    $('.allData').show();
                    $('.searchData').hide();
                }
                // alert(value);
                $.ajax({
                    type: "GET",
                    url: "/search",
                    data: {'search': value},
                    success: function (data) {
                        // console.log(data);
                        $('#content').html(data);
                    }
                });
            });
        });
    </script>
@endsection
