<?php
   
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
   
class StudentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index()
    {
        $students = Student::all();
        return Inertia::render('Students/Index', ['students' => $students]);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        return Inertia::render('Students/Create');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required'],
            'contact' => ['required'],
        ])->validate();
   
        Student::create($request->all());
    
        return redirect()->route('students.index');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Student $student)
    {
        return Inertia::render('Students/Edit', [
            'student' => $student
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required'],
            'contact' => ['required'],
        ])->validate();
    
        Student::find($id)->update($request->all());
        return redirect()->route('students.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy($id)
    {
        Student::find($id)->delete();
        return redirect()->route('students.index');
    }
}