<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Http\Resources\DepartmentCollection;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return DepartmentCollection
     */
    public function index(): DepartmentCollection
    {
        return new DepartmentCollection(Department::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DepartmentRequest $request
     * @return DepartmentResource
     */
    public function store(DepartmentRequest $request): DepartmentResource
    {
        $department = Department::create($request->validated());
        return new DepartmentResource($department);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return DepartmentResource
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return DepartmentResource
     */
    public function edit($id): DepartmentResource
    {
        $department = Department::findOrFail($id);

        return new DepartmentResource($department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DepartmentRequest $request
     * @param $id
     * @return DepartmentResource
     */
    public function update(DepartmentRequest $request, $id): DepartmentResource
    {
        $department = Department::findOrFail($id);
        $department->update($request->validated());

        return new DepartmentResource($department);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return DepartmentResource|Application|ResponseFactory|Response
     */
    public function destroy($id): Response|DepartmentResource|Application|ResponseFactory
    {
        $department = Department::findOrFail($id)->with('workers')->first();

        if($department->workers->isEmpty()){
            $department->delete();

            return new DepartmentResource($department);
        }

        return \response('Department must have not workers for deleting', 422);
    }
}
