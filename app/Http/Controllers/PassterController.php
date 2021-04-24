<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePassterRequest;
use App\Http\Requests\UpdatePassterRequest;
use App\Repositories\PassterRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PassterController extends AppBaseController
{
    /** @var  PassterRepository */
    private $passterRepository;

    public function __construct(PassterRepository $passterRepo)
    {
        $this->passterRepository = $passterRepo;
    }

    /**
     * Display a listing of the Passter.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $passters = $this->passterRepository->all();

        return view('passters.index')
            ->with('passters', $passters);
    }

    /**
     * Show the form for creating a new Passter.
     *
     * @return Response
     */
    public function create()
    {
        return view('passters.create');
    }

    /**
     * Store a newly created Passter in storage.
     *
     * @param CreatePassterRequest $request
     *
     * @return Response
     */
    public function store(CreatePassterRequest $request)
    {
        $input = $request->all();

        $passter = $this->passterRepository->create($input);

        Flash::success('Passter saved successfully.');

        return redirect(route('passters.index'));
    }

    /**
     * Display the specified Passter.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $passter = $this->passterRepository->find($id);

        if (empty($passter)) {
            Flash::error('Passter not found');

            return redirect(route('passters.index'));
        }

        return view('passters.show')->with('passter', $passter);
    }

    /**
     * Show the form for editing the specified Passter.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $passter = $this->passterRepository->find($id);

        if (empty($passter)) {
            Flash::error('Passter not found');

            return redirect(route('passters.index'));
        }

        return view('passters.edit')->with('passter', $passter);
    }

    /**
     * Update the specified Passter in storage.
     *
     * @param int $id
     * @param UpdatePassterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePassterRequest $request)
    {
        $passter = $this->passterRepository->find($id);

        if (empty($passter)) {
            Flash::error('Passter not found');

            return redirect(route('passters.index'));
        }

        $passter = $this->passterRepository->update($request->all(), $id);

        Flash::success('Passter updated successfully.');

        return redirect(route('passters.index'));
    }

    /**
     * Remove the specified Passter from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $passter = $this->passterRepository->find($id);

        if (empty($passter)) {
            Flash::error('Passter not found');

            return redirect(route('passters.index'));
        }

        $this->passterRepository->delete($id);

        Flash::success('Passter deleted successfully.');

        return redirect(route('passters.index'));
    }
}
