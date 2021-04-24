<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateanimationAPIRequest;
use App\Http\Requests\API\UpdateanimationAPIRequest;
use App\Models\animation;
use App\Repositories\animationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class animationController
 * @package App\Http\Controllers\API
 */

class animationAPIController extends AppBaseController
{
    /** @var  animationRepository */
    private $animationRepository;

    public function __construct(animationRepository $animationRepo)
    {
        $this->animationRepository = $animationRepo;
    }

    /**
     * Display a listing of the animation.
     * GET|HEAD /animations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $animations = $this->animationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($animations->toArray(), 'Animations retrieved successfully');
    }

    /**
     * Store a newly created animation in storage.
     * POST /animations
     *
     * @param CreateanimationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateanimationAPIRequest $request)
    {
        $input = $request->all();

        $animation = $this->animationRepository->create($input);

        return $this->sendResponse($animation->toArray(), 'Animation saved successfully');
    }

    /**
     * Display the specified animation.
     * GET|HEAD /animations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var animation $animation */
        $animation = $this->animationRepository->find($id);

        if (empty($animation)) {
            return $this->sendError('Animation not found');
        }

        return $this->sendResponse($animation->toArray(), 'Animation retrieved successfully');
    }

    /**
     * Update the specified animation in storage.
     * PUT/PATCH /animations/{id}
     *
     * @param int $id
     * @param UpdateanimationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateanimationAPIRequest $request)
    {
        $input = $request->all();

        /** @var animation $animation */
        $animation = $this->animationRepository->find($id);

        if (empty($animation)) {
            return $this->sendError('Animation not found');
        }

        $animation = $this->animationRepository->update($input, $id);

        return $this->sendResponse($animation->toArray(), 'animation updated successfully');
    }

    /**
     * Remove the specified animation from storage.
     * DELETE /animations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var animation $animation */
        $animation = $this->animationRepository->find($id);

        if (empty($animation)) {
            return $this->sendError('Animation not found');
        }

        $animation->delete();

        return $this->sendSuccess('Animation deleted successfully');
    }
}
