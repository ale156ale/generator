<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\teste;
use App\Repositories\testeRepository;

trait MaketesteTrait
{
    /**
     * Create fake instance of teste and save it in database
     *
     * @param array $testeFields
     * @return teste
     */
    public function maketeste($testeFields = [])
    {
        /** @var testeRepository $testeRepo */
        $testeRepo = \App::make(testeRepository::class);
        $theme = $this->faketesteData($testeFields);
        return $testeRepo->create($theme);
    }

    /**
     * Get fake instance of teste
     *
     * @param array $testeFields
     * @return teste
     */
    public function faketeste($testeFields = [])
    {
        return new teste($this->faketesteData($testeFields));
    }

    /**
     * Get fake data of teste
     *
     * @param array $testeFields
     * @return array
     */
    public function faketesteData($testeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word,
            'endereco' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $testeFields);
    }
}
