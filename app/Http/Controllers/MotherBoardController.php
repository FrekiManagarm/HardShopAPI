<?php

namespace App\Http\Controllers;

use App\Http\Requests\MotherBoardDeleteRequest;
use App\Http\Requests\MotherBoardStoreRequest;
use App\Http\Requests\MotherBoardUpdateRequest;
use App\Http\Resources\MotherBoardResource;
use App\Models\MotherBoard;
use Illuminate\Http\Request;

class MotherBoardController extends Controller
{
    public function index() {
        return MotherBoardResource::collection(MotherBoard::all())->response()->setStatusCode(200);
    }

    public function show($id) {
        return (new MotherBoardResource($id))->response()->setStatusCode(200);
    }

    public function store(MotherBoardStoreRequest $request) {
        $mb = MotherBoard::create($request->all());

        return (new MotherBoardResource($mb))->response()->setStatusCode(203);
    }

    public function update(MotherBoard $mb, MotherBoardUpdateRequest $request) {
        $mother = MotherBoard::where('motherboard.id', $mb->id);

        $mother->update($request->all());

        return (new MotherBoardResource($mother))->response()->setStatusCode(204);
    }

    public function destroy(MotherBoard $mb, MotherBoardDeleteRequest $request) {
        $this->authorize('update', $mb);

        $mb->delete();

        return response()->json(null, 204);
    }
}
