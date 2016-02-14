<?php
namespace App\Interfaces;


interface ReaderInterface
{
    public function read(array $input);

    public function fieldsGetter(array $header,array $input);
}