<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetesteAPIRequest;
use App\Http\Requests\API\UpdatetesteAPIRequest;
use App\Models\teste;
use App\Repositories\testeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class testeController
 * @package App\Http\Controllers\API
 */

class testeAPIController extends AppBaseController
{
    /** @var  testeRepository */
    private $testeRepository;

    public function __construct(testeRepository $testeRepo)
    {
        $this->testeRepository = $testeRepo;
    }

    /**
     * Display a listing of the teste.
     * GET|HEAD /testes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $testes = $this->testeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($testes->toArray(), 'Testes retrieved successfully');
    }

    /**
     * Store a newly created teste in storage.
     * POST /testes
     *
     * @param CreatetesteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetesteAPIRequest $request)
    {
        $input = $request->all();

        $teste = $this->testeRepository->create($input);

        return $this->sendResponse($teste->toArray(), 'Teste saved successfully');
    }

    /**
     * Display the specified teste.
     * GET|HEAD /testes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var teste $teste */
        $teste = $this->testeRepository->find($id);

        if (empty($teste)) {
            return $this->sendError('Teste not found');
        }

        return $this->sendResponse($teste->toArray(), 'Teste retrieved successfully');
    }

    /**
     * Update the specified teste in storage.
     * PUT/PATCH /testes/{id}
     *
     * @param int $id
     * @param UpdatetesteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetesteAPIRequest $request)
    {
        $input = $request->all();

        /** @var teste $teste */
        $teste = $this->testeRepository->find($id);

        if (empty($teste)) {
            return $this->sendError('Teste not found');
        }

        $teste = $this->testeRepository->update($input, $id);

        return $this->sendResponse($teste->toArray(), 'teste updated successfully');
    }

    /**
     * Remove the specified teste from storage.
     * DELETE /testes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var teste $teste */
        $teste = $this->testeRepository->find($id);

        if (empty($teste)) {
            return $this->sendError('Teste not found');
        }

        $teste->delete();

        return $this->sendResponse($id, 'Teste deleted successfully');
    }
}
