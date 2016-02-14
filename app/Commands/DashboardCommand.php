<?php


namespace App\Commands;


use App\Assignment;
use App\Requests;
use Config;

class DashboardCommand
{
    /**
     * @var Assignment
     */
    private $assignment;
    /**
     * @var Requests
     */
    private $requests;

    /**
     * DashboardCommand constructor.
     * @param Assignment $assignment
     * @param Requests $requests
     */
    public function __construct(Assignment $assignment, Requests $requests)
    {
        $this->assignment = $assignment;
        $this->requests = $requests;
    }

    public function getAssignmentPaginated()
    {
        return $this->assignment->paginate(15);
    }

    public function deleteAssignment($id)
    {
        return $this->assignment->destroy($id);
    }

    public function getViewFields()
    {
        $sections = Config::get('fields.index_cards');
        $requests = $this->getRequests();
        return compact('sections', 'requests');
    }

    /**
     * @return array
     */
    private function getRequests()
    {
        $array = [
            [
                'id' => 1,
                'from' => 'Test 1',
                'from_group' => 'L2',
                'to_group' => 'L1',
                'subject' => 'Testing'
            ],
            [
                'id' => 2,
                'from' => 'Test 2',
                'from_group' => 'L4',
                'to_group' => 'L2',
                'subject' => 'Mates'
            ],
            [
                'id' => 3,
                'from' => 'Test 3',
                'from_group' => 'L85',
                'to_group' => 'L20',
                'subject' => 'Lengua'
            ],
            [
                'id' => 3,
                'from' => 'Test 4',
                'from_group' => 'L85',
                'to_group' => 'L20',
                'subject' => 'Lengua'
            ],
            [
                'id' => 3,
                'from' => 'Test 5',
                'from_group' => 'L85',
                'to_group' => 'L20',
                'subject' => 'Lengua'
            ],
            [
                'id' => 3,
                'from' => 'Test 6',
                'from_group' => 'L85',
                'to_group' => 'L20',
                'subject' => 'Lengua'
            ],
            [
                'id' => 3,
                'from' => 'Test 7',
                'from_group' => 'L85',
                'to_group' => 'L20',
                'subject' => 'Lengua'
            ]
        ];
        return $array;

    }

}