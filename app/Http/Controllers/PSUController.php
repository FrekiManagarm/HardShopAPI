<?php

namespace App\Http\Controllers;

use App\Http\Requests\PSUDeleteRequest;
use App\Http\Requests\PSUStoreRequest;
use App\Http\Requests\PSUUpdateRequest;
use App\Http\Resources\PSUResource;
use App\Models\PSU;
use Illuminate\Http\Request;

class PSUController extends Controller
{
    public function index() {
        return PSUResource::collection(PSU::all())->response()->setStatusCode(200);
    }

    public function show($id) {
        return (new PSUResource($id))->response()->setStatusCode(200);
    }

    public function store(PSUStoreRequest $request) {
        $psu = PSU::create($request->all());

        return (new PSUResource($psu))->response()->setStatusCode(201);
    }

    public function update(PSU $psu, PSUUpdateRequest $request) {
        $alim = PSU::where('PSUs.id', $psu->id);

        $alim->update($request->all());

        return (new PSUResource($alim))->response()->setStatusCode(203);
    }

    public function destroy(PSU $psu) {
        $this->authorize('update', $psu);

        $psu->delete();

        return response()->json(null, 204);
    }
}
