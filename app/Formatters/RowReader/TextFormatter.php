<?php

namespace App\Formatters\RowReader;


class TextFormatter extends AbstractFormatterReader
{


    public function read(array $input)
    {
        $file = trim($input['table_row']);
        $body = array_map('trim', explode("\r", $file));
        $head = explode("\t", head($body));
        array_shift($body);

        $result = [];
        foreach ($body as $item) {
            $result[] = explode("\t", $item);

        }

        return [$head, $result];
    }


}