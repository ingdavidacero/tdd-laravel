<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepositoryRequest;
use App\Models\Repository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RepositoryController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        return view('repositories.index', [
            'repositories' => auth()->user()->repositories
        ]);
    }

    public function show(Repository $repository)
    {
        $this->authorize('view', $repository);

        return view('repositories.show', compact('repository'));
    }

    public function create(){
        return view('repositories.create');
    }

    public function store(RepositoryRequest $request)
    {
        $request->user()->repositories()->create($request->all());
        return redirect()->route('repositories.index');
    }

    public function edit(Repository $repository)
    {
        $this->authorize('update', $repository);

        return view('repositories.edit', compact('repository'));
    }

    public function update(RepositoryRequest $request, Repository $repository)
    {
        $this->authorize('update', $repository);

        $repository->update($request->all());
        return redirect()->route('repositories.edit',$repository);
    }

    public function destroy(Repository $repository)
    {
        $this->authorize('delete', $repository);
        $repository->delete();
        return redirect()->route('repositories.index');
    }
}
