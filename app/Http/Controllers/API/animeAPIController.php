<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateanimeAPIRequest;
use App\Http\Requests\API\UpdateanimeAPIRequest;
use App\Models\anime;
use App\Repositories\animeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class animeController
 * @package App\Http\Controllers\API
 */

class animeAPIController extends AppBaseController
{
    /** @var  animeRepository */
    private $animeRepository;

    public function __construct(animeRepository $animeRepo)
    {
        $this->animeRepository = $animeRepo;
    }

    /**
     * Display a listing of the anime.
     * GET|HEAD /animes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $animes = $this->animeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($animes->toArray(), 'Animes retrieved successfully');
    }

    /**
     * Store a newly created anime in storage.
     * POST /animes
     *
     * @param CreateanimeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateanimeAPIRequest $request)
    {
        $input = $request->all();

        $anime = $this->animeRepository->create($input);

        return $this->sendResponse($anime->toArray(), 'Anime saved successfully');
    }

    /**
     * Display the specified anime.
     * GET|HEAD /animes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var anime $anime */
        $anime = $this->animeRepository->find($id);

        if (empty($anime)) {
            return $this->sendError('Anime not found');
        }

        return $this->sendResponse($anime->toArray(), 'Anime retrieved successfully');
    }

    /**
     * Update the specified anime in storage.
     * PUT/PATCH /animes/{id}
     *
     * @param int $id
     * @param UpdateanimeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateanimeAPIRequest $request)
    {
        $input = $request->all();

        /** @var anime $anime */
        $anime = $this->animeRepository->find($id);

        if (empty($anime)) {
            return $this->sendError('Anime not found');
        }

        $anime = $this->animeRepository->update($input, $id);

        return $this->sendResponse($anime->toArray(), 'anime updated successfully');
    }

    /**
     * Remove the specified anime from storage.
     * DELETE /animes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var anime $anime */
        $anime = $this->animeRepository->find($id);

        if (empty($anime)) {
            return $this->sendError('Anime not found');
        }

        $anime->delete();

        return $this->sendSuccess('Anime deleted successfully');
    }
}
