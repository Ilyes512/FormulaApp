<?php

use \Illuminate\Database\Eloquent\ModelNotFoundException;

class TagController extends \BaseController
{
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
        return View::make('tag.index')
            ->withTags(Tag::all());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('tag.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $rules = Tag::$validationRules;
        $rules['name'][] = 'unique:tags,name';
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
            return Redirect::route('tag.create')
                ->withInput()
                ->withErrors($validator)
                ->withMessageAlert('Oeps, there were some errors!');

        $tag = new Tag;
        $tag->name = Input::get('name');
        $tag->save();

        return Redirect::route('tag.index')
            ->withMessageSuccess('Tag "' . $tag->name . '" has been created!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $results = Formula::whereHas('tags', function ($q) use ($id) {
            $q->where('tag_id', $id);
        })->with('tags')->with('category')->get();

        if ($results->isEmpty()) {
            $e = new ModelNotFoundException();
            $e->setModel('Tag');
            throw $e;
        }

        $heading = 'Tag: ' . $results->first()->tags->find($id)->name;

        return View::make('formula.index')
            ->withFormulas($results)
            ->withHeading($heading);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return View::make('tag.edit')
            ->withTag($tag);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $rules = Tag::$validationRules;
        $rules['name'][] = 'unique:tags,name,' . $id;
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
            return Redirect::route('tag.edit', $id)
                ->withInput()
                ->withErrors($validator)
                ->withMessageAlert('Oeps, there were some errors!');

        $tag = Tag::findOrFail($id);
        $tag->name = Input::get('name');
        $tag->save();

        return Redirect::route('tag.index')
            ->withMessageSuccess('Tag "' . $tag->name . '" has been updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return Redirect::route('tag.index')
            ->withMessageInfo(  'Tag "' . $tag->name . '" is deleted!');
    }


}
