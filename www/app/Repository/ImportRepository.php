<?php

namespace App\Repository;

use App\Entities\Import;
use http\Env\Request;

/**
 * Class ImportRepository
 * @package App\Repository
 */
class ImportRepository
{
    /**
     * @param string $name
     * @param string $content
     *
     * @return Import
     */
    public function create(string $name, string $content): Import
    {
        return Import::create(
            [
                'name' => $name,
                'content' => $content
            ]
        );
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        return Import::orderBy('id', 'DESC')->get(['id', 'name'])->toArray();
    }
}
