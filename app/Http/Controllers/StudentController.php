<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

/**
 * Class StudentController
 * @package App\Http\Controllers
 */
class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.students.index')->only('index');
        $this->middleware('can:admin.students.edit')->only('edit','update');
    }

    public function index()
    {
        $students = Student::paginate();

        return view('student.index', compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * $students->perPage());
    }

    public function create()
    {
        $student = new Student();
        return view('student.create', compact('student'));
    }

    public function store(Request $request)
    {
        request()->validate(Student::$rules);

        $student = Student::create($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show($id)
    {
        $student = Student::find($id);

        return view('student.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::find($id);

        return view('student.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        request()->validate(Student::$rules);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully');
    }


    public function destroy($id)
    {
        $student = Student::find($id)->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully');
    }
}
