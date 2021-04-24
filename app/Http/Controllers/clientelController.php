<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateclientelRequest;
use App\Http\Requests\UpdateclientelRequest;
use App\Repositories\clientelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class clientelController extends AppBaseController
{
    /** @var  clientelRepository */
    private $clientelRepository;

    public function __construct(clientelRepository $clientelRepo)
    {
        $this->clientelRepository = $clientelRepo;
    }

    /**
     * Display a listing of the clientel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clientels = $this->clientelRepository->all();

        return view('clientels.index')
            ->with('clientels', $clientels);
    }

    /**
     * Show the form for creating a new clientel.
     *
     * @return Response
     */
    public function create()
    {
        return view('clientels.create');
    }

    /**
     * Store a newly created clientel in storage.
     *
     * @param CreateclientelRequest $request
     *
     * @return Response
     */
    public function store(CreateclientelRequest $request)
    {
        $input = $request->all();

        $clientel = $this->clientelRepository->create($input);

        Flash::success('Clientel saved successfully.');

        return redirect(route('clientels.index'));
    }

    /**
     * Display the specified clientel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientel = $this->clientelRepository->find($id);

        if (empty($clientel)) {
            Flash::error('Clientel not found');

            return redirect(route('clientels.index'));
        }

        return view('clientels.show')->with('clientel', $clientel);
    }

    /**
     * Show the form for editing the specified clientel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientel = $this->clientelRepository->find($id);

        if (empty($clientel)) {
            Flash::error('Clientel not found');

            return redirect(route('clientels.index'));
        }

        return view('clientels.edit')->with('clientel', $clientel);
    }

    /**
     * Update the specified clientel in storage.
     *
     * @param int $id
     * @param UpdateclientelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateclientelRequest $request)
    {
        $clientel = $this->clientelRepository->find($id);

        if (empty($clientel)) {
            Flash::error('Clientel not found');

            return redirect(route('clientels.index'));
        }

        $clientel = $this->clientelRepository->update($request->all(), $id);

        Flash::success('Clientel updated successfully.');

        return redirect(route('clientels.index'));
    }

    /**
     * Remove the specified clientel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientel = $this->clientelRepository->find($id);

        if (empty($clientel)) {
            Flash::error('Clientel not found');

            return redirect(route('clientels.index'));
        }

        $this->clientelRepository->delete($id);

        Flash::success('Clientel deleted successfully.');

        return redirect(route('clientels.index'));
    }
}
