<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TenderInviteMail;
use App\Models\Bid;
use App\Models\Tender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenders = Tender::where('status','!=','DRAFT')->get();
//        dd($tenders);

        return view('vendor.backpack.bids.index', compact('tenders'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Tender $id
     * @return void
     */
    public function bids($id)
    {
        $tender = Tender::find($id);
        $bids = $tender->bids;
        $company = $tender->company;

        return view('vendor.backpack.bids.bids', compact('bids','tender', 'company'));
    }

    /**
     * Display the specified resource.
     *
     * @param Tender $id
     * @return void
     */
    public function show($id)
    {
        $bid = Bid::find($id);
        $company = $bid->tender->company;
        return view('vendor.backpack.bids.show', compact('bid', 'company'));
    }

    public function inviteAll($tender){
        $tender = Tender::find($tender);

        $bids = $tender->bids;

        foreach ($bids as $bid){
            sleep(2);
            Mail::to($bid->bidder->company->email)->send(new TenderInviteMail($bid->bidder, $bid->tender));
        }
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function edit(Bid $bid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bid $bid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bid $bid)
    {
        //
    }
}
