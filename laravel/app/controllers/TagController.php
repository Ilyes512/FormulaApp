<?php

use \Illuminate\Database\Eloquent\ModelNotFoundException;

class TagController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('tag.index')
            ->with('tags', Tag::all());
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
        $tag = new Tag;
        $tag->name = Input::get('name');
        $tag->save();

        return Redirect::route('tag.index')
            ->with('message', 'Tag "' . $tag->name . '" has been created!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        try {
            $results = Formula::whereHas('tags', function ($q) use ($id) {
                $q->where('tag_id', $id);
            })->with('tags')->with('category')->get();

            if ($results->isEmpty()) {
                throw new ModelNotFoundException();
            }

            $heading = 'Tag: ' . $results->first()->tags->find($id)->name;

            return View::make('formula.index')
                ->with('formulas', $results)
                ->with('heading', $heading);
        } catch (ModelNotFoundException $e) {
            return Redirect::route('tag.index')
                ->with('message', 'Tag #' . $id . ' does not exist!');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        try {
            $tag = Tag::findOrFail($id);
            return View::make('tag.edit')
                ->with('tag', $tag);
        } catch (ModelNotFoundException $e) {
            return Redirect::route('tag.index')
                ->with('message', 'Tag #' . $id . ' does not exist!');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        try {
            $tag = Tag::findOrFail($id);
            $tag->name = Input::get('name');
            $tag->save();

            return Redirect::route('tag.index')
                ->with('message', 'Tag "' . $tag->name . '" has been updated!');
        } catch (ModelNotFoundException $e) {
            return Redirect::route('tag.index')
                ->with('message', 'Tag #' . $id . ' does not exist!');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $tag = Tag::findOrFail($id);
            $tag->delete();

            return Redirect::route('tag.index')
                ->with('message', 'Tag "' . $tag->name . '" is deleted!');
        } catch (ModelNotFoundException $e) {
            return Redirect::route('tag.index')
                ->with('message', 'Tag #' . $id . ' does not exist!');
        }
    }


}
