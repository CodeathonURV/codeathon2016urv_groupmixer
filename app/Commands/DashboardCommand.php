<?php


namespace App\Commands;


use App\Assignment;
use Config;

class DashboardCommand
{
    /**
     * @var Assignment
     */
    private $assignment;

    /**
     * DashboardCommand constructor.
     * @param Assignment $assignment
     */
    public function __construct(Assignment $assignment)
    {
        $this->assignment = $assignment;
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

    private function getRequests()
    {
        $array = [
            [
                'id' => 1,
                'from' => 'Idir Ouhab',
                'from_group' => 'L2',
                'to_group' => 'L1',
                'subject' => 'Testing'
            ],
            [
                'id' => 2,
                'from' => 'Llatzer Zurano',
                'from_group' => 'L4',
                'to_group' => 'L2',
                'subject' => 'Mates'
            ],
            [
                'id' => 3,
                'from' => 'Pep Perol',
                'from_group' => 'L85',
                'to_group' => 'L20',
                'subject' => 'Lengua'
            ],
            [
                'id' => 3,
                'from' => 'Pep Perol',
                'from_group' => 'L85',
                'to_group' => 'L20',
                'subject' => 'Lengua'
            ],
            [
                'id' => 3,
                'from' => 'Pep Perol',
                'from_group' => 'L85',
                'to_group' => 'L20',
                'subject' => 'Lengua'
            ],
            [
                'id' => 3,
                'from' => 'Pep Perol',
                'from_group' => 'L85',
                'to_group' => 'L20',
                'subject' => 'Lengua'
            ],
            [
                'id' => 3,
                'from' => 'Pep Perol',
                'from_group' => 'L85',
                'to_group' => 'L20',
                'subject' => 'Lengua'
            ]
        ];
        return $array;

    }

}