<?php

namespace App\Http\Controllers;

use App\Repositories\StateRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StateRequest;
use Symfony\Component\HttpFoundation\Response;

use App\Exceptions\ApiException;

class StateController extends Controller
{
    protected $stateRepository;

    public function __construct(StateRepository $stateRepository)
    {
        $this->stateRepository = $stateRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = $this->stateRepository->all();

        return response()->json($states);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateRequest $request)
    {
        $this->stateRepository->create($request->only([
            'name',
        ]), true);

        return response()->json([
            'message' => 'state successfully created',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @throws ApiException
     */
    public function show($id)
    {
        $state = $this->stateRepository->find($id);

        return response()->json($state);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @throws ApiException
     */
    public function update(StateRequest $request, $id)
    {
        $this->stateRepository->update($request->only([
            'name',
        ]), $id, true);

        return response()->json([
            'message' => 'state successfully updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @throws ApiException
     */
    public function destroy($id)
    {
        $this->stateRepository->delete($id, true);

        return response()->json([
            'message' => 'state successfully deleted',
        ]);
    }
}
