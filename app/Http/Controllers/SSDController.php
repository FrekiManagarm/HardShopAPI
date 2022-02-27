<?php

namespace App\Http\Controllers;

use App\Http\Requests\SSDDeleteRequest;
use App\Http\Requests\SSDStoreRequest;
use App\Http\Requests\SSDUpdateRequest;
use App\Http\Resources\SSDResource;
use App\Models\SSD;
use Illuminate\Http\Request;

class SSDController extends Controller
{
    public function index() {
        return SSDResource::collection(SSD::all())->response()->setStatusCode(200);
    }

    public function show($id) {
        return (new SSDResource($id))->response()->setStatusCode(200);
    }

    public function store(SSDStoreRequest $request) {
        $ssd = SSD::create($request->all());

        return (new SSDResource($ssd))->response()->setStatusCode(201);
    }

    public function update(SSD $ssd, SSDUpdateRequest $request) {
        $solid = SSD::where('SSDs.id', $ssd->id);

        $solid->update($request->all());

        return (new SSDResource($solid))->response()->setStatusCode(203);
    }

    public function destroy(SSD $ssd) {
        $this->authorize('update', $ssd);

        $ssd->delete();

        return response()->json(null, 204);
    }
}
