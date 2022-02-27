<?php

namespace App\Http\Controllers;

use App\Http\Requests\HDDDeleteRequest;
use App\Http\Requests\HDDStoreRequest;
use App\Http\Requests\HDDUpdateRequest;
use App\Http\Resources\HDDResource;
use App\Models\HDD;
use Illuminate\Http\Request;

class HDDController extends Controller
{
    public function index() {
        return HDDResource::collection(HDD::all())->response()->setStatusCode(200);
    }

    public function show($id) {
        return (new HDDResource($id))->response()->setStatusCode(200);
    }

    public function store(HDDStoreRequest $request) {
        $hdd = HDD::create($request->all());

        return (new HDDResource($hdd))->response()->setStatusCode(201);
    }

    public function update(HDD $hdd, HDDUpdateRequest $request) {
        $disque = HDD::where('hdd.id', $hdd->id);

        $disque->update($request->all());

        return (new HDDResource($disque))->response()->setStatusCode(203);
    }

    public function destroy(HDD $hdd) {
        $this->authorize('update', $hdd);

        $hdd->delete();

        return response()->json(null, 204);
    }
}
