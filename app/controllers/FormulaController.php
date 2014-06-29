<?php

class FormulaController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post', 'put', 'patch', 'delete']);
        $this->beforeFilter('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('formula.index')
            ->withFormulas(Formula::with('category')->with('tags')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('formula.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $formula = new Formula;

        if ($formula->save()) {
            // Add the formula tags
            if (Input::has('tags'))
                $formula->tags()->attach(Input::get('tags'));

            return Redirect::route('formula.index')
                ->withMessageSuccess('Formula "' . $formula->name . '" is successfully added!');
        }

        return Redirect::route('formula.create')
            ->withErrors($formula->errors())
            ->withMessageAlert('Oeps, there were some errors!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $formula = Formula::with('category')
            ->with('tags')
            ->findOrFail($id);

        return View::make('formula.show')
            ->withFormula($formula);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $formula = Formula::with('category')
            ->with('tags')
            ->findOrFail($id);

        return View::make('formula.edit')
            ->withFormula($formula);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id)
    {
        // We use the Ardent packages to hydrate the input entries
        $formula = Formula::findOrFail($id);

        if ($formula->updateUniques ()) {
            $formula->tags()->sync(Input::get('tags', []));

            return Redirect::route('formula.show', $id)
                ->withMessageSuccess('Formula "' . $formula->name . '" has been updated!');
        }

        // Returning an error!
        return Redirect::route('formula.edit', $id)
            ->withErrors($formula->errors())
            ->withMessageAlert('Oeps, there were some errors!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $formula = Formula::findOrFail($id);
        $formula->delete();

        return Redirect::route('formula.index')
            ->withMessageInfo('Formula "' . $formula->name . '" is deleted!');
    }
}
