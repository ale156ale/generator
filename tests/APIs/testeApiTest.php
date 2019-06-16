<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MaketesteTrait;
use Tests\ApiTestTrait;

class testeApiTest extends TestCase
{
    use MaketesteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_teste()
    {
        $teste = $this->faketesteData();
        $this->response = $this->json('POST', '/api/testes', $teste);

        $this->assertApiResponse($teste);
    }

    /**
     * @test
     */
    public function test_read_teste()
    {
        $teste = $this->maketeste();
        $this->response = $this->json('GET', '/api/testes/'.$teste->id);

        $this->assertApiResponse($teste->toArray());
    }

    /**
     * @test
     */
    public function test_update_teste()
    {
        $teste = $this->maketeste();
        $editedteste = $this->faketesteData();

        $this->response = $this->json('PUT', '/api/testes/'.$teste->id, $editedteste);

        $this->assertApiResponse($editedteste);
    }

    /**
     * @test
     */
    public function test_delete_teste()
    {
        $teste = $this->maketeste();
        $this->response = $this->json('DELETE', '/api/testes/'.$teste->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/testes/'.$teste->id);

        $this->response->assertStatus(404);
    }
}
