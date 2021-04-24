<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\anime;

class animeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_anime()
    {
        $anime = factory(anime::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/animes', $anime
        );

        $this->assertApiResponse($anime);
    }

    /**
     * @test
     */
    public function test_read_anime()
    {
        $anime = factory(anime::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/animes/'.$anime->id
        );

        $this->assertApiResponse($anime->toArray());
    }

    /**
     * @test
     */
    public function test_update_anime()
    {
        $anime = factory(anime::class)->create();
        $editedanime = factory(anime::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/animes/'.$anime->id,
            $editedanime
        );

        $this->assertApiResponse($editedanime);
    }

    /**
     * @test
     */
    public function test_delete_anime()
    {
        $anime = factory(anime::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/animes/'.$anime->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/animes/'.$anime->id
        );

        $this->response->assertStatus(404);
    }
}
