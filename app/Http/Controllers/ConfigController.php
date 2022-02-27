<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfigDeleteRequest;
use App\Http\Requests\ConfigStoreRequest;
use App\Http\Requests\ConfigUpdateRequest;
use App\Http\Resources\ConfigResource;
use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index() {
        return ConfigResource::collection(Config::all())->response()->setStatusCode(200);
    }

    public function show($id) {
        $config = Config::where('config.id', $id)
        ->with([
            'user',
            'cpu',
            'motherboard',
            'cooling',
            'ssd',
            'hdd',
            'gpu',
            'psu',
            'ram',
            'boitier'
        ]);

        return (new ConfigResource($config))->response()->setStatusCode(200);
    }

    public function store(ConfigStoreRequest $request) {
        $config = Config::create($request->all());

        return (new ConfigResource($config))->response()->setStatusCode(201);
    }

    public function update(Config $config, ConfigUpdateRequest $request) {
        $conf = Config::where('config.id', $config->id);

        $conf->update($request->all());
    }

    public function destroy(Config $config) {
        $this->authorize('update', $config);

        $config->delete();

        return response()->json(null, 204); 
    }
}
