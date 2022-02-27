<?php

namespace App\Http\Controllers;

use App\Http\Requests\GPUDeleteRequest;
use App\Http\Requests\GPUStoreRequest;
use App\Http\Requests\GPUUpdateRequest;
use App\Http\Resources\GPUResource;
use App\Models\GPU;
use Illuminate\Http\Request;

class GPUController extends Controller
{
    public function index() {
        return GPUResource::collection(GPU::all())->response()->setStatusCode(200);
    }

    public function show($id) {
        return (new GPUResource($id))->response()->setStatusCode(200);
    }

    public function store(GPUStoreRequest $request) {
        $gpu = GPU::create($request->all());

        return (new GPUResource($gpu))->response()->setStatusCode(201);
    }

    public function update(GPU $gpu, GPUUpdateRequest $request) {
        $graf = GPU::where('gpu.id', $gpu->id);

        $graf->update($request->all());

        return (new GPUResource($graf))->response()->setStatusCode(203);
    }

    public function destroy(GPU $gpu) {
        $this->authorize('update', $gpu);

        $gpu->delete();

        return response()->json(null, 204);
    }
}
