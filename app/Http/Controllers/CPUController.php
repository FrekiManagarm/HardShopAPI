<?php

namespace App\Http\Controllers;

use App\Http\Requests\CPUDeleteRequest;
use App\Http\Requests\CPUStoreRequest;
use App\Http\Requests\CPUUpdateRequest;
use App\Http\Resources\CPUResource;
use App\Models\CPU;
use Illuminate\Http\Request;

class CPUController extends Controller
{
    public function index() {
        return CPUResource::collection(CPU::all())->response()->setStatusCode(200);
    }

    public function show($id) {
        return (new CPUResource($id))->response()->setStatusCode(200);
    }

    public function store(CPUStoreRequest $request) {
        $cpu = CPU::create($request->all());

        return (new CPUResource($cpu))->response()->setStatusCode(201);
    }

    public function update(CPU $cpu, CPUUpdateRequest $request) {
        $proc = CPU::where('CPUs.id', $cpu->id);

        $proc->update($request->all());

        return (new CPUResource($proc))->response()->setStatusCode(203);
    }

    public function destroy(CPU $cpu) {
        $this->authorize('update', $cpu);

        $cpu->delete();

        return response()->json(null, 204);
    }
}
