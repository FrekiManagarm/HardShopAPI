<?php

namespace App\Http\Controllers;

use App\Http\Requests\PSUDeleteRequest;
use App\Http\Requests\PSUUpdateRequest;
use App\Http\Requests\RAMStoreRequest;
use App\Http\Requests\RAMUpdateRequest;
use App\Http\Resources\RAMResource;
use App\Models\RAM;
use Illuminate\Http\Request;

class RAMController extends Controller
{
    public function index() {
        return RAMResource::collection(RAM::all())->response()->setStatusCode(200);
    }

    public function show($id) {
        return (new RAMResource($id))->response()->setStatusCode(200);
    }

    public function store(RAMStoreRequest $request) {
        $ram = RAM::create($request->all());

        return (new RAMResource($ram))->response()->setStatusCode(201);
    }

    public function update(RAM $ram, RAMUpdateRequest $request) {
        $memoire = RAM::where('RAMs.id', $ram->id);

        $memoire->update($request->all());

        return (new RAMResource($memoire))->response()->setStatusCode(203);
    }

    public function destroy(RAM $ram) {
        $this->authorize('update', $ram);

        $ram->delete();

        return response()->json(null, 204);
    }
}
