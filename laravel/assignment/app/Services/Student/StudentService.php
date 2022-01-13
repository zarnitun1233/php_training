<?php

namespace App\Services\Student;

use App\Models\Student;
use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\Mail\TestMail;
use App\Mail\sendMailData;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SendMailDataRequest;

/**
 * Service class for post.
 */
class StudentService implements StudentServiceInterface
{
    /**
     * post dao
     */
    private $studentDao;

    /**
     * Class Constructor
     * @param PostDaoInterface
     */
    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }

    /**
     * Home Page Function to show data
     * @param Request
     */
    public function index()
    {
        return $this->studentDao->index();
    }

    /**
     * Display the specified student.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->studentDao->show($id);
    }

    /**
     * Search Function
     * @param Request $request
     */
    public function search(Request $request)
    {
        return $this->studentDao->search($request);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->studentDao->create();
    }

    /**
     * Show the form for editing the specified resource.
     * @param Student $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $id)
    {
        return $this->studentDao->edit($id);
    }

    /**
     * Delete Function
     * @param Student $student
     */
    public function destory($id)
    {
        return $this->studentDao->destory($id);
    }

    /**
     * Delete Function
     * @param Request $request
     */
    public function store(Request $request)
    {
        return $this->studentDao->store($request);
    }

    /**
     * Update Function
     * @param Request $request, @param Student $student
     */
    public function update(Request $request, $id)
    {
        return $this->studentDao->update($request, $id);
    }

    /**
     * Export Function
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new StudentsExport, 'students.csv');
    }

    /**
     * Import Function
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        return Excel::import(new StudentsImport, request()->file('file'));
    }

    /**
     * Send Mail to created user email
     */
    public function sendMail()
    {
        $details = [
            'title' => 'Successfully Created Account!',
            'body' => 'You just created account in student crud function.'
        ];

        $email = request()->email;
        Mail::to("$email")->send(new TestMail($details));
    }

    /**
     * Send Student Data to email
     */
    public function sendMailData(SendMailDataRequest $request)
    {
        $students = $this->studentDao->sendMailData($request);
        $email = request()->email;
        return Mail::to("$email")->send(new SendMailData($students));
    }

    /**
     * Get Major Model
     * @return data with json
     */
    public function getMajor()
    {
        return $this->studentDao->getMajor();
    }

    /**
     * Get Major By Id
     * @param $id
     */
    public function getMajorById($id)
    {
        return $this->studentDao->getMajorById($id);
    }
}
