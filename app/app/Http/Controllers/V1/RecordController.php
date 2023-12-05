<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Record\RecordRequest;
use App\Http\Resources\RecordResource;
use App\Services\Auth\AuthService;
use App\Services\Record\RecordService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RecordController extends Controller
{
    /**
     * @param RecordRequest $request
     * @param RecordService $recordService
     * @param AuthService $authService
     * @return JsonResource
     */
    public function create(RecordRequest $request, RecordService $recordService, AuthService $authService): JsonResource
    {
        $user = $authService->findUserByToken($request->header('Authorization'));
        return new RecordResource($recordService->save($request, $user));
    }

    /**
     * @param Request $request
     * @param RecordService $recordService
     * @param AuthService $authService
     * @return ResourceCollection
     */
    public function listRecords(Request $request, RecordService $recordService, AuthService $authService): ResourceCollection
    {
        $user = $authService->findUserByToken($request->header('Authorization'));
        return RecordResource::collection($recordService->getRecords($user));
    }
}
