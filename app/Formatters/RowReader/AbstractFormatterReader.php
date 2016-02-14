<?php
/**
 * Created by PhpStorm.
 * User: idir
 * Date: 14/02/16
 * Time: 2:05
 */

namespace App\Formatters\RowReader;


use App\Interfaces\ReaderInterface;

abstract class AbstractFormatterReader implements ReaderInterface
{

    private $fields = [
        'nombre' => [
            'nom',
            'cognoms',
            'cognom',
            'nombre'
        ],
        'dni',
        'email',
    ];

    public function fieldsGetter(array $header, array $input)
    {

        dd($header, $input);
    }
}