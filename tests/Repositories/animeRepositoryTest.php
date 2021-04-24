<?php namespace Tests\Repositories;

use App\Models\anime;
use App\Repositories\animeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class animeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var animeRepository
     */
    protected $animeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->animeRepo = \App::make(animeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_anime()
    {
        $anime = factory(anime::class)->make()->toArray();

        $createdanime = $this->animeRepo->create($anime);

        $createdanime = $createdanime->toArray();
        $this->assertArrayHasKey('id', $createdanime);
        $this->assertNotNull($createdanime['id'], 'Created anime must have id specified');
        $this->assertNotNull(anime::find($createdanime['id']), 'anime with given id must be in DB');
        $this->assertModelData($anime, $createdanime);
    }

    /**
     * @test read
     */
    public function test_read_anime()
    {
        $anime = factory(anime::class)->create();

        $dbanime = $this->animeRepo->find($anime->id);

        $dbanime = $dbanime->toArray();
        $this->assertModelData($anime->toArray(), $dbanime);
    }

    /**
     * @test update
     */
    public function test_update_anime()
    {
        $anime = factory(anime::class)->create();
        $fakeanime = factory(anime::class)->make()->toArray();

        $updatedanime = $this->animeRepo->update($fakeanime, $anime->id);

        $this->assertModelData($fakeanime, $updatedanime->toArray());
        $dbanime = $this->animeRepo->find($anime->id);
        $this->assertModelData($fakeanime, $dbanime->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_anime()
    {
        $anime = factory(anime::class)->create();

        $resp = $this->animeRepo->delete($anime->id);

        $this->assertTrue($resp);
        $this->assertNull(anime::find($anime->id), 'anime should not exist in DB');
    }
}
