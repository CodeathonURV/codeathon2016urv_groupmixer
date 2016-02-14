<?php

namespace App\Http\Controllers;


use App\Commands\DashboardCommand;
use App\Commands\StudentCommand;
use App\Http\Requests;
use Auth;
use View;

class StudentController extends Controller
{
    /**
     * @var DashboardCommand
     */
    private $dashboardCommand;
    /**
     * @var StudentCommand
     */
    private $studentCommand;

    /**
     * StudentController constructor.
     * @param StudentCommand $studentCommand
     */
    public function __construct(StudentCommand $studentCommand)
    {
        $this->studentCommand = $studentCommand;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $userAssignment = $this->studentCommand->getAssignments(Auth::user()->id);

        return View::make('student.index', compact('requests', 'userAssignment'));
    }
}
