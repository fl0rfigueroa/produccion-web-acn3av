<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $courses = Course::select(['id', 'title', 'description', 'price'])
            ->paginate(5);

            $title = 'Aca están todos los cursos';
            return view('courses.index', [
                'title' => $title,
                'courses' => $courses
            ])
            ;
        }

        
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
        public function create()
{
    return view('courses.create');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $request->validate ([
        'title' => 'requiered|max:100']);

        //remplaza a $post['title'];
//con esta linea de codigo creamos un curso nuevo
        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]); //creo el curso y vuelvo al index
    return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('courses.edit', [
            'course' => $course
        ]);     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {

        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
            'price' => 'numeric|max:1000000'
        ], [
            'title.required' => 'Che, te faltó el título del curso'
        ]);

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return redirect()
            ->route('courses.index')
            ->with('status', 'El curso se ha modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
