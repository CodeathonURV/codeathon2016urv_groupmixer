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
        $userId = Auth::user()->id;
        $userAssignment = $this->studentCommand->getAssignments($userId);
        $requests = $this->studentCommand->getRequests($userId);

        return View::make('student.index', compact('requests', 'userAssignment'));
    }

    public function changeGroup()
    {
        $group_to_id = Input::get('group_to_id');
        $group_from_id = Input::get('group_from_id');
        $studentId = Auth::user()->id;
        $this->studentCommand->requestChange($group_to_id, $group_from_id, $studentId);
    }

    public function executeChange()
    {
        $requestId = Input::get('request_id');
        $this->studentCommand->executeChange($requestId);

    }

    public function getUserGroups()
    {
        $groupId = Input::get('group_id');
        $assigmentId = Input::get('assigment_id');
        $groups = $this->studentCommand->getGroupsUnAssigned($groupId, $assigmentId);

        return View::make('student.table_modal_content', [
            'groups' => $groups,
            'groupFromId' => $groupId
        ]);
    }
}
