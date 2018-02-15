<?php

namespace App\Http\Controllers\Admin;

use App\Agency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\agenciesRepositoryEloquent;
use App\Http\Requests\Agency\StoreAgencyRequest;
use App\Http\Requests\Agency\UpdateAgencyRequest;

class agenciesController extends Controller {

    /**
     * agencies Repository.
     *
     * @var agenciesRepositoryEloquent
     */
    public $agenciesRepository;

    /**
     *
     * @param agenciesRepositoryEloquent $agenciesRepository
     */
    public function __construct(agenciesRepositoryEloquent $agenciesRepository)
    {
        parent::__construct();
        $this->agenciesRepository = $agenciesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $agencies = $this->agenciesRepository->orderBy('id', 'DESC')->all();
        return view('admin.agencies.index', compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAgencyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAgencyRequest $request)
    {
        $agency = $this->agenciesRepository->create($request->all());

        \Session::flash('flash_message_success', 'agency Created.');

        return redirect('/admin/agencies');
    }

    /**
     * Display the specified resource.
     *
     * @param  Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function show(Agency $agency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function edit(Agency $agency)
    {
        return view('admin.agencies.edit', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAgencyRequest  $request
     * @param  Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAgencyRequest $request, Agency $agency)
    {
        $this->agenciesRepository->update($request->all(), $agency->id);

        \Session::flash('flash_message_success', 'agency Updated.');

        return redirect('/admin/agencies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agency $agency)
    {

        $this->agenciesRepository->delete($agency->id);

        \Session::flash('flash_message_success', 'agency Deleted.');

        return redirect('/admin/agencies');
    }

}
