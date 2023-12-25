<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
   public function index()
   {
    $students = Student::latest()->paginate(10);

    return view('frontend.student.index', compact('students'));
   }

   public function search(Request $request)
   {
    // dd($request->all());
    $search = $request->input('search');
    $output = '';
    $students = Student::where('name', 'like', '%'.$search . '%')
                        ->orWhere('roll_no', 'like', '%'.$search.'%')
                        ->orWhere('email', 'like', '%'.$search.'%')
                        ->get();
    if($students)
    {
        foreach($students as $key => $student)
        {
            $output .= '
            <tr>
                <td scope="row">'. $key + 1 .'</td>
                <td>'. $student->name .'</td>
                <td>'. $student->roll_no .'</td>
                <td>'. $student->email .'</td>
                <td>
                '.'
                    <a href="/edit/'. $student->id. '" class="btn btn-warning">Edit</a>
                    <a href="/delete/'. $student->id. '" class="btn btn-danger">Delete</a>
                '.'
                </td>
            </tr>


            ';
        }
    }

    return response($output);
   }

   public function edit($id)
    {
        try {
            $student = Student::findOrFail($id);
            return view('frontend.student.edit', compact('student'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('student.index')->with('error', 'Student not found.');
        }
    }


    public function update($id, Request $request)
    {

        try {
            $student = Student::findOrFail($id);
            // dd($student);
            if (!$student) {
                return redirect()->route('student.index')->with('error', 'Student not found.');
            }

            $student->update([
                'name' => $request->input('name'),
                'roll_no' => $request->input('roll_no'),
                'email' => $request->input('email'),
            ]);

            return redirect()->route('student.index')->with('success', 'Data updated successfully.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('student.index')->with('error', 'Student not found.');
        }
    }


    public function destroy($id)
    {
        try {
            $student = Student::findOrFail($id);
            $student->delete();
            return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('student.index')->with('error', 'Student not found.');
        }
    }

}
