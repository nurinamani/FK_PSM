<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Students;
class UserController extends Controller
{
    public function index()
    {
        $students = Students::all();
        return view ('userList')->with('students', $students);
    }
    
    public function create()
    {
        return view('userAdd');
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
        Students::create($input);
        return redirect('/')->with('flash_message', 'Student Sucessfully Addedd!');  
    }
    
    public function show($id)
    {
        $students = Students::find($id);
        return view('userView')->with('students', $students);
    }
    
    public function edit($id)
    {
        $students = Students::find($id);
        return view('userEdit')->with('students', $students);
    }
  
    public function update(Request $request, $id)
    {
        $students = Students::find($id);
        $input = $request->all();
        $students->update($input);
        return redirect('/')->with('flash_message', 'Student Updated!');  
    }
  
    public function destroy($id)
    {
        Students::destroy($id);
        return redirect('/')->with('flash_message', 'Student deleted!');  
    }
}
