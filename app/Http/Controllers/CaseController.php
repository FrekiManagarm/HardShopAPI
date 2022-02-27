<?php

namespace App\Http\Controllers;

use App\Http\Requests\CaseDeleteRequest;
use App\Http\Requests\CaseStoreRequest;
use App\Http\Requests\CaseUpdateRequest;
use App\Http\Resources\CaseResource;
use App\Models\Boitier;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    public function index() {
        return CaseResource::collection(Boitier::all())->response()->setStatusCode(200);
    }

    public function show($id) {

        $case = Boitier::where('boitier.id', $id)->first()->get();

        return (new CaseResource($case))->response()->setStatusCode(200);
    }

    public function store(CaseStoreRequest $request) {

        $case = Boitier::create($request->all());

        return (new CaseResource($case))->response()->setStatusCode(200);

    }

    public function update(Boitier $case, CaseUpdateRequest $request) {

        $boitier = Boitier::where('boitier.id', $case->id);

        $boitier->update($request->all());

        return (new CaseResource($boitier))->response()->setStatusCode(203);

    }

    public function destroy(Boitier $case) {

        $this->authorize('update', $case);

        $case->delete();

        return response()->json(null, 204);
    }
}
