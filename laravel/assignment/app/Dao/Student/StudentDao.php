<?php

namespace App\Dao\Student;

use App\Models\Student;
use App\Models\Major;
use App\Contracts\Dao\Student\StudentDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SendMailDataRequest;

/**
 * Data accessing object for post
 */
class StudentDao implements StudentDaoInterface
{
    /**
     * Home Page Function to show data
     * Search Function
     * @param Request
     */
    public function index()
    {
        return Student::with('major')->get();
    }

    /**
     * Display the specified student.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Student::find($id);
    }

    /**
     * Search Function
     * @param Request $request
     */
    public function search(Request $request)
    {
        $students = DB::table('students')
            ->join('majors', 'majors.id', '=', 'students.major_id')
            ->select('students.*', 'majors.major')
            ->orderBy('id')
            ->where('students.deleted_at', '=', NULL);
        $name = $request->name;
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        if ($name) {
            $students->where('students.name', 'LIKE', '%' . $name . '%');
        }
        if ($startDate) {
            $students->where('students.created_at', '>=', $startDate);
        }
        if ($endDate) {
            $students->where('students.created_at', '<=', $endDate);
        }
        return $students->get();
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Major::orderBy('created_at', 'asc')->get();
    }

    /**
     * Show the form for editing the specified resource.
     * @param Student $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $id)
    {
        return Major::orderBy('created_at', 'asc')->get();
    }

    /**
     * Destory Function
     * @param Student $student
     */
    public function destory($id)
    {
        //DB::table('students')->delete($id);
        return DB::table('students')
            ->where('id', $id)
            ->update([
                'deleted_at' => now()
            ]);
    }

    /**
     * Store Function
     * @param Request $request
     */
    public function store(Request $request)
    {
        return DB::table('students')->insert([
            'name' => $request->name,
            'age' => $request->age,
            'major_id' => $request->major_id,
            'email' => $request->email,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Update Function
     * @param Request $request, @param Student $id
     */
    public function update(Request $request, $id)
    {
        return DB::table('students')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'age' => $request->age,
                'major_id' => $request->major_id,
                'email' => $request->email,
            ]);
    }

    /**
     * Send Student Data to email
     */
    public function sendMailData(SendMailDataRequest $request)
    {
        return Student::where('deleted_at', NULL)->with('major')->orderBy('id', 'desc')->take(10)->get();
    }

    /**
     * Get Major Model
     * @return data with json
     */
    public function getMajor()
    {
        return Major::all();
    }

    /**
     * Get Major By Id
     * @param $id
     */
    public function getMajorById($id)
    {
        return Major::join('students', 'majors.id', '=', 'students.major_id')->where('students.id', $id)->get();
    }
}
