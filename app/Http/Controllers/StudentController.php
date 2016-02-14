<?php

namespace App\Http\Controllers;


use App\Commands\DashboardCommand;
use App\Commands\StudentCommand;
use App\Http\Requests;
use Auth;
use Input;
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

    public function getUserGroups()
    {
        $groupId = Input::get('group_id');
        $assigmentId = Input::get('assigment_id');
        $groups = $this->studentCommand->getGroupsUnAssigned($groupId, $assigmentId);

        return View::make('student.table_modal_content', compact('groups'));
    }
}
