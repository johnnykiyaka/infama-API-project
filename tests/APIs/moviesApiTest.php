<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\movies;

class moviesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_movies()
    {
        $movies = factory(movies::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/movies', $movies
        );

        $this->assertApiResponse($movies);
    }

    /**
     * @test
     */
    public function test_read_movies()
    {
        $movies = factory(movies::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/movies/'.$movies->id
        );

        $this->assertApiResponse($movies->toArray());
    }

    /**
     * @test
     */
    public function test_update_movies()
    {
        $movies = factory(movies::class)->create();
        $editedmovies = factory(movies::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/movies/'.$movies->id,
            $editedmovies
        );

        $this->assertApiResponse($editedmovies);
    }

    /**
     * @test
     */
    public function test_delete_movies()
    {
        $movies = factory(movies::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/movies/'.$movies->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/movies/'.$movies->id
        );

        $this->response->assertStatus(404);
    }
}
