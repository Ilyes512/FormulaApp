<?php

use \Illuminate\Database\Eloquent\ModelNotFoundException;

class FormulaController extends \BaseController
{
    public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post', 'put', 'patch', 'delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('formula.index')->with('formulas', Formula::with('category')->with('tags')->get());
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
        $rules = Formula::$validationRules;
        $rules['name'][] = 'unique:formulas,name';
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route('formula.create')
                ->withInput()
                ->withErrors($validator)
                ->with('message', 'Oeps, there were some errors!');
        }

        $formula = new Formula;
        $formula->name = Input::get('name');
        $formula->formula = Input::get('formula');
        $formula->info = Input::get('description');
        $formula->category_id = Input::get('category');
        $formula->save();

        if (Input::has('tags')) {
            $formula->tags()->attach(Input::get('tags'));
        }

        return Redirect::route('formula.index')
            ->with('message', 'Formula "' . $formula->name . '" is successfully added!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $formula = Formula::with('category')
            ->with('tags')
            ->findOrFail($id);

        return View::make('formula.show')
            ->with('formula', $formula);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $formula = Formula::with('category')
            ->with('tags')
            ->findOrFail($id);

        return View::make('formula.edit')
            ->with('formula', $formula);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $rules = Formula::$validationRules;
        $rules['name'][] = 'unique:formulas,name,' . $id;
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route('formula.edit', $id)
                ->withInput()
                ->withErrors($validator)
                ->with('message', 'Oeps, there were some errors!');
        }

        $formula = Formula::findOrFail($id);
        $formula->name = Input::get('name');
        $formula->formula = Input::get('formula');
        $formula->info = Input::get('description');
        $formula->category_id = Input::get('category');
        $formula->save();
        $formula->tags()->sync(Input::get('tags', []));

        return Redirect::route('formula.show', $id)
            ->with('message', 'Formula "' . $formula->name . '" has been updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $formula = Formula::findOrFail($id);
        $formula->delete();

        return Redirect::route('formula.index')
            ->with('message', 'Formula "' . $formula->name . '" is deleted!');
    }


}
