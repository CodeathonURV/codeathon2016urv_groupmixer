<?php


namespace App\Commands;


use App\Assignment;

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

}