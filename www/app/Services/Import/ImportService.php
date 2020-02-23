<?php

namespace App\Services\Import;

use App\Http\Requests\Imports\UploadRequest;
use App\Repository\ImportRepository;
use http\Env\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Expr\Array_;
use Illuminate\Http\Resources\Json;


/**
 * Class ImportService
 * @package App\Services\Import
 */
class ImportService
{
    /**
     * @var ImportRepository
     */
    private $repository;

    /**
     * ImportService constructor.
     * @param ImportRepository $repository
     */
    public function __construct(ImportRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param UploadRequest $request
     *
     * @return array
     */
    public function importCsv(UploadRequest $request): array
    {
        $file = $request->file('file');

        $csvArray = $this->formatArrayFromCsv(
            File::get($file->getRealPath())
        );

        $import = $this->repository->create(
            pathinfo($file->getClientOriginalName())['filename'],
            json_encode($csvArray)
        );

        return [
            'id' => $import->getAttribute('id'),
            'name' => $import->getAttribute('name')
        ];
    }
    public function updatecsv(\Illuminate\Http\Request $request): array
    {

        $id = $request->input('id');
        $contents = $request->input('data');
       DB::table('imports')
            ->where('id', $id)
            ->update(['content' => $contents]);

    return ["success"];

    }

    /**
     * @param string $content
     *
     * @return array
     */
    private function formatArrayFromCsv(string $content): array
    {
        $formattedArray = [];
        foreach (explode("\n", $content) as $rowKey => $row) {
            $formattedArray[] = str_getcsv($row, ',');
        }

        return $formattedArray;
    }
}
