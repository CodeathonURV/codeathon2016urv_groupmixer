<?php

namespace App\Formatters\RowReader;


use Excel;
use File;

class XLSFormatter extends AbstractFormatterReader
{


    public function read(array $input)
    {
        $file = $input['file'];

        $result = [];
        Excel::load($file->getRealPath(), function ($reader) use (&$result) {
            foreach ($reader->toArray() as $sheet) {
                // get sheet title
                array_shift($sheet);
                dd($sheet);
                if (!empty($sheet[0]) && !empty($sheet[1]) && !empty($sheet[2])) {
                    $result[] = $sheet;
                }


            }
        });
        dd(count($result));
        return [[], $result];
    }
}