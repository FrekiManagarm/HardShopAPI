<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoolingDeleteRequest;
use App\Http\Requests\CoolingStoreRequest;
use App\Http\Requests\CoolingUpdateRequest;
use App\Http\Resources\CoolingResource;
use App\Models\Cooling;
use Illuminate\Http\Request;

class CoolingController extends Controller
{
    public function index() {
        return CoolingResource::collection(Cooling::all())->response()->setStatusCode(200);
    }

    public function show($id) {
        return (new CoolingResource($id))->response()->setStatusCode(200);
    }

    public function store(CoolingStoreRequest $request) {
        $cooling = Cooling::create($request->all());

        return (new CoolingResource($cooling))->response()->setStatusCode(201);
    }

    public function update(Cooling $cool, CoolingUpdateRequest $request) {
        $cooling = Cooling::where('cooling.id', $cool->id);

        $cooling->update($request->all());

        return (new CoolingResource($cooling))->response()->setStatusCode(203);
    }

    public function destroy(Cooling $cool) {
        $this->authorize('update', $cool);

        $cool->delete();

        return response()->json(null, 204);
    }
}
