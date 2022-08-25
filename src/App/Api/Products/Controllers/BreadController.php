<?php

namespace App\Api\Products\Controllers;

use App\Api\Products\Requests\StoreBreadRequest;
use App\Api\Products\Requests\UpdateBreadRequest;
use App\Api\Products\Resources\BreadResource;
use Domain\Products\Actions\DeleteBread;
use Domain\Products\Actions\StoreBread;
use Domain\Products\Actions\UpdateBread;
use Domain\Products\DataTransferObjects\BreadData;
use Domain\Products\Models\Bread;
use Illuminate\Routing\Controller;

class BreadController extends Controller
{
    public function index()
    {
        return BreadResource::collection(Bread::all());
    }

    public function store(StoreBreadRequest $request)
    {
        $bread = app(StoreBread::class)->handle(BreadData::fromRequest($request));

        return new BreadResource($bread);
    }

    public function update(UpdateBreadRequest $request, Bread $bread)
    {
        $bread = app(UpdateBread::class)->handle($bread, BreadData::fromRequest($request));

        return new BreadResource($bread);
    }

    public function destroy(Bread $bread)
    {
        app(DeleteBread::class)->handle($bread);

        return response()->noContent();
    }
}
