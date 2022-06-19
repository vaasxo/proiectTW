<?php

namespace models;

use core\DBModel;

class Autograph extends DBModel
{
    public string $personality='';
    public string $field='';
    public string $context='';
    public string $location='';
    public string $object='';
    public string $tag='';
    public string $price='';

    public function getTableName(): string
    {
        return 'autographs';
    }

    public function getPrimaryKey(): string
    {
        return 'id';
    }

    public function getAttributes(): array
    {
        return ['personality', 'field', 'context', 'location', 'object', 'mentions', 'measures', 'estimated_value', 'image'];
    }

    public function rules(): array
    {
        return [];
    }

}