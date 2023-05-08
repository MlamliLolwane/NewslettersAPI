<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Response;
use App\Http\Requests\StoreNewsletterRequest;
use App\Http\Requests\UpdateNewsletterRequest;
use GrahamCampbell\ResultType\Result;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = Newsletter::paginate(15);

        return response()->json($newsletters, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsletterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsletterRequest $request)
    {
        //Validate the request 
        $request->validated();

        $newsletter = Newsletter::create($request->all());

        return response()->json($newsletter, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show($newsletter_id)
    {
        $newsletter = Newsletter::findOrFail($newsletter_id);

        return response()->json($newsletter, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsletterRequest  $request
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsletterRequest $request, $newsletter_id)
    {
        //Validate the request
        $request->validated();

        $newsletter = Newsletter::where('id', $newsletter_id)->update($request->all());

        return response()->json($newsletter, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy($newsletter_id)
    {
        $newsletter = Newsletter::where('id', $newsletter_id)->delete();

        return response()->json($newsletter, Response::HTTP_OK);
    }

    public function count_newsletters()
    {
        $newsletter_count = Newsletter::all()->count();

        return response()->json(['data' => $newsletter_count], Response::HTTP_OK);
    }
}
