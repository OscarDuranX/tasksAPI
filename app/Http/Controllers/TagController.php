<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Transformers\TagTransformer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $tagTransformer;

    public function __construct(TagTransformer $tagTransformer)
    {
        $this->tagTransformer = $tagTransformer;
    }

    public function index()
    {
       // return Tag::all();

        $tags = Tag::all();



        return Response::json([

            $this -> TagTransformer->transformCollection($tags)

        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = new Tag();

        $this->saveTag($request, $tag);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        //$tag = Tag::where('id' ,$id)->first();

        if( ! $tag){

            return Response::json([

                'error' => [

                    'message' => 'Tag does not exist'
                ]

            ], 404);
        }

        return Response::json([

            'data' =>  $this->transform($tag)
        ], 200);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $tag = Tag::findOrFail($id);

        $this->saveTag($request, $tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy($id);
    }

    /**
     * @param Request $request
     * @param $tag
     */
    public function saveTag(Request $request, $tag)
    {
        $tag->name = $request->name;

        $tag->save();
    }


}
