<?php

namespace App\Http\Controllers\Student;

use App\Contracts\Services\Student\StudentServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\SendMailDataRequest;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    /**
     * studentInterface
     */
    private $studentInterface;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        $this->studentInterface = $studentServiceInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $students = $this->studentInterface->index($request);
        return response()->json($students);
    }

    /**
     * Display the specified student.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = $this->studentInterface->show($id);
        return response()->json($student);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $this->studentInterface->store($request);
        $this->studentInterface->sendMail();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->studentInterface->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->studentInterface->destory($id);
    }

    /**
     * Get Major Model
     * @return data with json
     */
    public function getMajor()
    {
        $majors = $this->studentInterface->getMajor();
        return response()->json($majors);
    }

    /**
     * Send Student Data to email
     */
    public function sendMailData(SendMailDataRequest $request)
    {
        $this->studentInterface->sendMailData($request);
    }

    /**
     * Get Major By Id
     * @param $id
     */
    public function getMajorById($id)
    {
        $major = $this->studentInterface->getMajorById($id);
        return response()->json($major);
    }
}
