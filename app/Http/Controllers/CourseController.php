<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class CourseController
 * @package App\Http\Controllers
 */
class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.course.index')->only('index');
        $this->middleware('can:admin.course.edit')->only('edit','update');
    }
    public function index()
    {
        $courses = Course::where('id_user',auth()->id())
                           ->paginate();

        return view('course.index', compact('courses'))
            ->with('i', (request()->input('page', 1) - 1) * $courses->perPage());
        /*
        id_user = auth()->id()
        $users = User::where('name','LIKE','%'.$this->search.'%')
                        ->orWhere('email','LIKE','%'.$this->search.'%')
                        ->paginate();
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = new Course();
        return view('course.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(Course::$rules);
        $course = new Course();
        $course->name = $request->name;
        $course->id_user = auth()->id();
        $course->save();


        return redirect()->route('admin.course.index')
            ->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);

        return view('course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);

        return view('course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        request()->validate(Course::$rules);

        $course->update($request->all());

        return redirect()->route('admin.course.index')
            ->with('success', 'Course updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $course = Course::find($id)->delete();

        return redirect()->route('admin.course.index')
            ->with('success', 'Course deleted successfully');
    }
}
