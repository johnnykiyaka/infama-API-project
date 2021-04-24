<?php namespace Tests\Repositories;

use App\Models\movies;
use App\Repositories\moviesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class moviesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var moviesRepository
     */
    protected $moviesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->moviesRepo = \App::make(moviesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_movies()
    {
        $movies = factory(movies::class)->make()->toArray();

        $createdmovies = $this->moviesRepo->create($movies);

        $createdmovies = $createdmovies->toArray();
        $this->assertArrayHasKey('id', $createdmovies);
        $this->assertNotNull($createdmovies['id'], 'Created movies must have id specified');
        $this->assertNotNull(movies::find($createdmovies['id']), 'movies with given id must be in DB');
        $this->assertModelData($movies, $createdmovies);
    }

    /**
     * @test read
     */
    public function test_read_movies()
    {
        $movies = factory(movies::class)->create();

        $dbmovies = $this->moviesRepo->find($movies->id);

        $dbmovies = $dbmovies->toArray();
        $this->assertModelData($movies->toArray(), $dbmovies);
    }

    /**
     * @test update
     */
    public function test_update_movies()
    {
        $movies = factory(movies::class)->create();
        $fakemovies = factory(movies::class)->make()->toArray();

        $updatedmovies = $this->moviesRepo->update($fakemovies, $movies->id);

        $this->assertModelData($fakemovies, $updatedmovies->toArray());
        $dbmovies = $this->moviesRepo->find($movies->id);
        $this->assertModelData($fakemovies, $dbmovies->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_movies()
    {
        $movies = factory(movies::class)->create();

        $resp = $this->moviesRepo->delete($movies->id);

        $this->assertTrue($resp);
        $this->assertNull(movies::find($movies->id), 'movies should not exist in DB');
    }
}
