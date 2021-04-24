<?php namespace Tests\Repositories;

use App\Models\animation;
use App\Repositories\animationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class animationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var animationRepository
     */
    protected $animationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->animationRepo = \App::make(animationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_animation()
    {
        $animation = factory(animation::class)->make()->toArray();

        $createdanimation = $this->animationRepo->create($animation);

        $createdanimation = $createdanimation->toArray();
        $this->assertArrayHasKey('id', $createdanimation);
        $this->assertNotNull($createdanimation['id'], 'Created animation must have id specified');
        $this->assertNotNull(animation::find($createdanimation['id']), 'animation with given id must be in DB');
        $this->assertModelData($animation, $createdanimation);
    }

    /**
     * @test read
     */
    public function test_read_animation()
    {
        $animation = factory(animation::class)->create();

        $dbanimation = $this->animationRepo->find($animation->id);

        $dbanimation = $dbanimation->toArray();
        $this->assertModelData($animation->toArray(), $dbanimation);
    }

    /**
     * @test update
     */
    public function test_update_animation()
    {
        $animation = factory(animation::class)->create();
        $fakeanimation = factory(animation::class)->make()->toArray();

        $updatedanimation = $this->animationRepo->update($fakeanimation, $animation->id);

        $this->assertModelData($fakeanimation, $updatedanimation->toArray());
        $dbanimation = $this->animationRepo->find($animation->id);
        $this->assertModelData($fakeanimation, $dbanimation->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_animation()
    {
        $animation = factory(animation::class)->create();

        $resp = $this->animationRepo->delete($animation->id);

        $this->assertTrue($resp);
        $this->assertNull(animation::find($animation->id), 'animation should not exist in DB');
    }
}
