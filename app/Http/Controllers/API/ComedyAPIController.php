<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateComedyAPIRequest;
use App\Http\Requests\API\UpdateComedyAPIRequest;
use App\Models\Comedy;
use App\Repositories\ComedyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ComedyController
 * @package App\Http\Controllers\API
 */

class ComedyAPIController extends AppBaseController
{
    /** @var  ComedyRepository */
    private $comedyRepository;

    public function __construct(ComedyRepository $comedyRepo)
    {
        $this->comedyRepository = $comedyRepo;
    }

    /**
     * Display a listing of the Comedy.
     * GET|HEAD /comedies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $comedies = $this->comedyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($comedies->toArray(), 'Comedies retrieved successfully');
    }

    /**
     * Store a newly created Comedy in storage.
     * POST /comedies
     *
     * @param CreateComedyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateComedyAPIRequest $request)
    {
        $input = $request->all();

        $comedy = $this->comedyRepository->create($input);

        return $this->sendResponse($comedy->toArray(), 'Comedy saved successfully');
    }

    /**
     * Display the specified Comedy.
     * GET|HEAD /comedies/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Comedy $comedy */
        $comedy = $this->comedyRepository->find($id);

        if (empty($comedy)) {
            return $this->sendError('Comedy not found');
        }

        return $this->sendResponse($comedy->toArray(), 'Comedy retrieved successfully');
    }

    /**
     * Update the specified Comedy in storage.
     * PUT/PATCH /comedies/{id}
     *
     * @param int $id
     * @param UpdateComedyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComedyAPIRequest $request)
    {
        $input = $request->all();

        /** @var Comedy $comedy */
        $comedy = $this->comedyRepository->find($id);

        if (empty($comedy)) {
            return $this->sendError('Comedy not found');
        }

        $comedy = $this->comedyRepository->update($input, $id);

        return $this->sendResponse($comedy->toArray(), 'Comedy updated successfully');
    }

    /**
     * Remove the specified Comedy from storage.
     * DELETE /comedies/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Comedy $comedy */
        $comedy = $this->comedyRepository->find($id);

        if (empty($comedy)) {
            return $this->sendError('Comedy not found');
        }

        $comedy->delete();

        return $this->sendSuccess('Comedy deleted successfully');
    }
}
