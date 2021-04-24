<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Comedy;

class ComedyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_comedy()
    {
        $comedy = factory(Comedy::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/comedies', $comedy
        );

        $this->assertApiResponse($comedy);
    }

    /**
     * @test
     */
    public function test_read_comedy()
    {
        $comedy = factory(Comedy::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/comedies/'.$comedy->id
        );

        $this->assertApiResponse($comedy->toArray());
    }

    /**
     * @test
     */
    public function test_update_comedy()
    {
        $comedy = factory(Comedy::class)->create();
        $editedComedy = factory(Comedy::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/comedies/'.$comedy->id,
            $editedComedy
        );

        $this->assertApiResponse($editedComedy);
    }

    /**
     * @test
     */
    public function test_delete_comedy()
    {
        $comedy = factory(Comedy::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/comedies/'.$comedy->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/comedies/'.$comedy->id
        );

        $this->response->assertStatus(404);
    }
}
