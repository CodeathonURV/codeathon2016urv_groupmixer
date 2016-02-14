<?php
/**
 * Created by PhpStorm.
 * User: idir
 * Date: 13/02/16
 * Time: 18:30
 */

namespace App\Commands;


use App;

use App\Assignment;
use App\Formatters\RowReader\TextFormatter;
use App\Formatters\RowReader\XLSFormatter;
use App\Group;
use App\Interfaces\ReaderInterface;
use App\User;
use Auth;
use Cache;

class Step2Command
{
    /**
     * @var User
     */
    private $user;


    /**
     * Step2Command constructor.
     * @param User $user
     * @param Assignment $assignment
     * @param Group $group
     */
    public function __construct(User $user, Assignment $assignment, Group $group)
    {
        $this->assignment = $assignment;
        $this->group = $group;
        $this->user = $user;
    }


    public function getListTeacherAndCoordinators()
    {
        $users = $this->user->getTeacherAndCoordinators();
        $teachers = [];
        foreach ($users as $user) {
            $teachers[$user->id] = $user->name;

        }
        return $teachers;

    }

    public function saveToCache($all)
    {
        $extension = 'txt';
        if (!empty($all['file'])) {
            $extension = $all['file']->getClientOriginalExtension();
        }

        $object = $this->getObject($extension);
        $data = $object->read($all);
        $this->setToCache($data);


        return $data;

    }

    private function setToCache(array $data)
    {
        Cache::put('flow', $data, 15);
    }

    /**
     * @param $extension
     * @return ReaderInterface
     */
    private function getObject($extension)
    {
        //xls,xlms,xlsx
        switch ($extension) {
            case 'xls':
                $object = App::make(XLSFormatter::class);
                break;
            case 'xlms':
                break;
            case 'xlsx':
                $object = App::make(XLSFormatter::class);
                break;
            case 'txt':
                $object = App::make(TextFormatter::class);
                break;
            default:
                break;
        }

        return $object;
    }

    public function save($all)
    {
        $groups = $this->getGroups($all);


        $assignmentType = $all['assignment_type'];
        $assignmentName = $all['subject'];
        $allowChanges = !empty($all['allow_group_changes']);
        $teacher = Auth::user();
        $assignment = $this->assignment->create([
                'name' => $assignmentName,
                'allow_change' => $allowChanges,
                'teacher_id' => $teacher->id
            ]
        );

        foreach ($groups as $group) {
            $groupEntity = $this->group->create($group);
            $assignment->groups()->attach($groupEntity->id);

        }

        $this->generateCombination($assignmentType, Cache::get('flow'), $assignment);

        return $assignment;
    }

    private function getGroups(array $all)
    {
        $resultArray = [];
        $numberGroups = $all['number_groups'];

        for ($i = 0; $i < $numberGroups; $i++) {
            $resultArray[] = [
                'name' => $all['group_name'][$i],
                'description' => $all['description'][$i],
                'teacher_id' => $all['teacher'][$i],

            ];
        }
        return $resultArray;
    }

    private function generateCombination($type, array $data, Assignment $assignment)
    {
        $numberGroups = $assignment->groups->count();

        switch ($type) {
            case 0:
                //No añade a nadie
                $students = [];
                break;
            case 1:
                //Orden alfabetico
                $collection = collect(
                    $data[1]
                );
                $sorted = $collection->sortBy('0');
                $students = $sorted->values()->all();
                break;
            case 2:
                //Aleatoria
                $students = $data[1];
                break;
        }


        $chunks = array_chunk($students, $numberGroups);

        foreach ($assignment->groups as $group) {

            foreach ($chunks as $chunk) {
                $chunk[1] = '48772386n';
                $user = $this->user->where('dni', $chunk[1])->first();
                $group->students()->attach($user->id);
            }


        }
    }
}