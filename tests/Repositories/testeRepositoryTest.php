<?php namespace Tests\Repositories;

use App\Models\teste;
use App\Repositories\testeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MaketesteTrait;
use Tests\ApiTestTrait;

class testeRepositoryTest extends TestCase
{
    use MaketesteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var testeRepository
     */
    protected $testeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->testeRepo = \App::make(testeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_teste()
    {
        $teste = $this->faketesteData();
        $createdteste = $this->testeRepo->create($teste);
        $createdteste = $createdteste->toArray();
        $this->assertArrayHasKey('id', $createdteste);
        $this->assertNotNull($createdteste['id'], 'Created teste must have id specified');
        $this->assertNotNull(teste::find($createdteste['id']), 'teste with given id must be in DB');
        $this->assertModelData($teste, $createdteste);
    }

    /**
     * @test read
     */
    public function test_read_teste()
    {
        $teste = $this->maketeste();
        $dbteste = $this->testeRepo->find($teste->id);
        $dbteste = $dbteste->toArray();
        $this->assertModelData($teste->toArray(), $dbteste);
    }

    /**
     * @test update
     */
    public function test_update_teste()
    {
        $teste = $this->maketeste();
        $faketeste = $this->faketesteData();
        $updatedteste = $this->testeRepo->update($faketeste, $teste->id);
        $this->assertModelData($faketeste, $updatedteste->toArray());
        $dbteste = $this->testeRepo->find($teste->id);
        $this->assertModelData($faketeste, $dbteste->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_teste()
    {
        $teste = $this->maketeste();
        $resp = $this->testeRepo->delete($teste->id);
        $this->assertTrue($resp);
        $this->assertNull(teste::find($teste->id), 'teste should not exist in DB');
    }
}
