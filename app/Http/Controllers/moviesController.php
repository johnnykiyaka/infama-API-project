<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemoviesRequest;
use App\Http\Requests\UpdatemoviesRequest;
use App\Repositories\moviesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class moviesController extends AppBaseController
{
    /** @var  moviesRepository */
    private $moviesRepository;

    public function __construct(moviesRepository $moviesRepo)
    {
        $this->moviesRepository = $moviesRepo;
    }

    /**
     * Display a listing of the movies.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $movies = $this->moviesRepository->all();

        return view('movies.index')
            ->with('movies', $movies);
    }

    /**
     * Show the form for creating a new movies.
     *
     * @return Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created movies in storage.
     *
     * @param CreatemoviesRequest $request
     *
     * @return Response
     */
    public function store(CreatemoviesRequest $request)
    {
        $input = $request->all();

        $movies = $this->moviesRepository->create($input);

        Flash::success('Movies saved successfully.');

        return redirect(route('movies.index'));
    }

    /**
     * Display the specified movies.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $movies = $this->moviesRepository->find($id);

        if (empty($movies)) {
            Flash::error('Movies not found');

            return redirect(route('movies.index'));
        }

        return view('movies.show')->with('movies', $movies);
    }

    /**
     * Show the form for editing the specified movies.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $movies = $this->moviesRepository->find($id);

        if (empty($movies)) {
            Flash::error('Movies not found');

            return redirect(route('movies.index'));
        }

        return view('movies.edit')->with('movies', $movies);
    }

    /**
     * Update the specified movies in storage.
     *
     * @param int $id
     * @param UpdatemoviesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemoviesRequest $request)
    {
        $movies = $this->moviesRepository->find($id);

        if (empty($movies)) {
            Flash::error('Movies not found');

            return redirect(route('movies.index'));
        }

        $movies = $this->moviesRepository->update($request->all(), $id);

        Flash::success('Movies updated successfully.');

        return redirect(route('movies.index'));
    }

    /**
     * Remove the specified movies from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $movies = $this->moviesRepository->find($id);

        if (empty($movies)) {
            Flash::error('Movies not found');

            return redirect(route('movies.index'));
        }

        $this->moviesRepository->delete($id);

        Flash::success('Movies deleted successfully.');

        return redirect(route('movies.index'));
    }
}
