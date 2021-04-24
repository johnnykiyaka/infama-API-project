<?php namespace Tests\Repositories;

use App\Models\Comedy;
use App\Repositories\ComedyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ComedyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ComedyRepository
     */
    protected $comedyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->comedyRepo = \App::make(ComedyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_comedy()
    {
        $comedy = factory(Comedy::class)->make()->toArray();

        $createdComedy = $this->comedyRepo->create($comedy);

        $createdComedy = $createdComedy->toArray();
        $this->assertArrayHasKey('id', $createdComedy);
        $this->assertNotNull($createdComedy['id'], 'Created Comedy must have id specified');
        $this->assertNotNull(Comedy::find($createdComedy['id']), 'Comedy with given id must be in DB');
        $this->assertModelData($comedy, $createdComedy);
    }

    /**
     * @test read
     */
    public function test_read_comedy()
    {
        $comedy = factory(Comedy::class)->create();

        $dbComedy = $this->comedyRepo->find($comedy->id);

        $dbComedy = $dbComedy->toArray();
        $this->assertModelData($comedy->toArray(), $dbComedy);
    }

    /**
     * @test update
     */
    public function test_update_comedy()
    {
        $comedy = factory(Comedy::class)->create();
        $fakeComedy = factory(Comedy::class)->make()->toArray();

        $updatedComedy = $this->comedyRepo->update($fakeComedy, $comedy->id);

        $this->assertModelData($fakeComedy, $updatedComedy->toArray());
        $dbComedy = $this->comedyRepo->find($comedy->id);
        $this->assertModelData($fakeComedy, $dbComedy->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_comedy()
    {
        $comedy = factory(Comedy::class)->create();

        $resp = $this->comedyRepo->delete($comedy->id);

        $this->assertTrue($resp);
        $this->assertNull(Comedy::find($comedy->id), 'Comedy should not exist in DB');
    }
}
