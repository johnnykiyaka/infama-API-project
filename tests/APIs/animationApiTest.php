<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\animation;

class animationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_animation()
    {
        $animation = factory(animation::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/animations', $animation
        );

        $this->assertApiResponse($animation);
    }

    /**
     * @test
     */
    public function test_read_animation()
    {
        $animation = factory(animation::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/animations/'.$animation->id
        );

        $this->assertApiResponse($animation->toArray());
    }

    /**
     * @test
     */
    public function test_update_animation()
    {
        $animation = factory(animation::class)->create();
        $editedanimation = factory(animation::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/animations/'.$animation->id,
            $editedanimation
        );

        $this->assertApiResponse($editedanimation);
    }

    /**
     * @test
     */
    public function test_delete_animation()
    {
        $animation = factory(animation::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/animations/'.$animation->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/animations/'.$animation->id
        );

        $this->response->assertStatus(404);
    }
}
