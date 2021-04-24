<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatemoviesAPIRequest;
use App\Http\Requests\API\UpdatemoviesAPIRequest;
use App\Models\movies;
use App\Repositories\moviesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class moviesController
 * @package App\Http\Controllers\API
 */

class moviesAPIController extends AppBaseController
{
    /** @var  moviesRepository */
    private $moviesRepository;

    public function __construct(moviesRepository $moviesRepo)
    {
        $this->moviesRepository = $moviesRepo;
    }

    /**
     * Display a listing of the movies.
     * GET|HEAD /movies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $movies = $this->moviesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($movies->toArray(), 'Movies retrieved successfully');
    }

    /**
     * Store a newly created movies in storage.
     * POST /movies
     *
     * @param CreatemoviesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatemoviesAPIRequest $request)
    {
        $input = $request->all();

        $movies = $this->moviesRepository->create($input);

        return $this->sendResponse($movies->toArray(), 'Movies saved successfully');
    }

    /**
     * Display the specified movies.
     * GET|HEAD /movies/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var movies $movies */
        $movies = $this->moviesRepository->find($id);

        if (empty($movies)) {
            return $this->sendError('Movies not found');
        }

        return $this->sendResponse($movies->toArray(), 'Movies retrieved successfully');
    }

    /**
     * Update the specified movies in storage.
     * PUT/PATCH /movies/{id}
     *
     * @param int $id
     * @param UpdatemoviesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemoviesAPIRequest $request)
    {
        $input = $request->all();

        /** @var movies $movies */
        $movies = $this->moviesRepository->find($id);

        if (empty($movies)) {
            return $this->sendError('Movies not found');
        }

        $movies = $this->moviesRepository->update($input, $id);

        return $this->sendResponse($movies->toArray(), 'movies updated successfully');
    }

    /**
     * Remove the specified movies from storage.
     * DELETE /movies/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var movies $movies */
        $movies = $this->moviesRepository->find($id);

        if (empty($movies)) {
            return $this->sendError('Movies not found');
        }

        $movies->delete();

        return $this->sendSuccess('Movies deleted successfully');
    }
}
