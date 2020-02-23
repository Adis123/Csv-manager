<?php

namespace App\Http\Controllers;

use App\Entities\Import;
use App\Http\Requests\Imports\UploadRequest;
use App\Repository\ImportRepository;
use App\Services\Import\ImportService;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


/**
 * Class ImportController
 * @package App\Http\Controllers
 */
class ImportController extends Controller
{
    /**
     * @var ImportService
     */
    private $importService;

    /**
     * @var ImportRepository
     */
    private $importRepository;

    /**
     * ImportController constructor.
     *
     * @param ImportService $importService
     * @param ImportRepository $importRepository
     */
    public function __construct(ImportService $importService, ImportRepository $importRepository)
    {
        $this->importService = $importService;
        $this->importRepository = $importRepository;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('index');
    }

    /**
     * @param UploadRequest $request
     *
     * @return JsonResponse
     */
    public function upload(UploadRequest $request): JsonResponse
    {
        return response()->json(
            $this->importService->importCsv($request)
        );
    }


    /**
     * @param Import $import
     *
     * @return JsonResponse
     *
     * @throws \Exception
     */
    public function delete(Import $import): JsonResponse
    {
        return response()->json(
            [
                'deleted' => $import->delete(),
            ]
        );
    }
    public function saveCsv(Request $request): JsonResponse
    {
        return response()->json(
            $this->importService->updatecsv($request)
            );
    }

    /**
     * @return JsonResponse
     */
    public function getList(): JsonResponse
    {
        return response()->json(
            $this->importRepository->getList()
        );
    }



}
