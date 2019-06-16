<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetesteRequest;
use App\Http\Requests\UpdatetesteRequest;
use App\Repositories\testeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class testeController extends AppBaseController
{
    /** @var  testeRepository */
    private $testeRepository;

    public function __construct(testeRepository $testeRepo)
    {
        $this->testeRepository = $testeRepo;
    }

    /**
     * Display a listing of the teste.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $testes = $this->testeRepository->all();

        return view('testes.index')
            ->with('testes', $testes);
    }

    /**
     * Show the form for creating a new teste.
     *
     * @return Response
     */
    public function create()
    {
        return view('testes.create');
    }

    /**
     * Store a newly created teste in storage.
     *
     * @param CreatetesteRequest $request
     *
     * @return Response
     */
    public function store(CreatetesteRequest $request)
    {
        $input = $request->all();

        $teste = $this->testeRepository->create($input);

        Flash::success('Teste saved successfully.');

        return redirect(route('testes.index'));
    }

    /**
     * Display the specified teste.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $teste = $this->testeRepository->find($id);

        if (empty($teste)) {
            Flash::error('Teste not found');

            return redirect(route('testes.index'));
        }

        return view('testes.show')->with('teste', $teste);
    }

    /**
     * Show the form for editing the specified teste.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $teste = $this->testeRepository->find($id);

        if (empty($teste)) {
            Flash::error('Teste not found');

            return redirect(route('testes.index'));
        }

        return view('testes.edit')->with('teste', $teste);
    }

    /**
     * Update the specified teste in storage.
     *
     * @param int $id
     * @param UpdatetesteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetesteRequest $request)
    {
        $teste = $this->testeRepository->find($id);

        if (empty($teste)) {
            Flash::error('Teste not found');

            return redirect(route('testes.index'));
        }

        $teste = $this->testeRepository->update($request->all(), $id);

        Flash::success('Teste updated successfully.');

        return redirect(route('testes.index'));
    }

    /**
     * Remove the specified teste from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $teste = $this->testeRepository->find($id);

        if (empty($teste)) {
            Flash::error('Teste not found');

            return redirect(route('testes.index'));
        }

        $this->testeRepository->delete($id);

        Flash::success('Teste deleted successfully.');

        return redirect(route('testes.index'));
    }
}
