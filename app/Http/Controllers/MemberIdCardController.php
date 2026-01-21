<?php

namespace App\Http\Controllers;

use App\Models\MemberIdCard;
use App\Models\OurMember;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class MemberIdCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cards = MemberIdCard::with('member')->orderBy('created_at', 'desc');

        // Search filters
        if ($request->card_number) {
            $cards = $cards->where('card_number', 'like', '%' . $request->card_number . '%');
        }
        if ($request->card_type) {
            $cards = $cards->where('card_type', $request->card_type);
        }
        if ($request->card_status) {
            $cards = $cards->where('card_status', $request->card_status);
        }
        if ($request->member_name) {
            $cards = $cards->whereHas('member', function ($q) use ($request) {
                $q->where('name_bn', 'like', '%' . $request->member_name . '%')
                    ->orWhere('name_en', 'like', '%' . $request->member_name . '%');
            });
        }
        if ($request->member_serial_no) {
            $cards = $cards->whereHas('member', function ($q) use ($request) {
                $q->where('member_serial_no', 'like', '%' . $request->member_serial_no . '%')
                    ->orWhere('member_serial_no_new', 'like', '%' . $request->member_serial_no . '%');
            });
        }

        $cards = $cards->paginate(100);

        return view('memberIdCard.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memberIdCard.create');
    }

    /**
     * Search members for card allocation
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchMember(Request $request)
    {
        $members = OurMember::where('approvedstatus', 2)
            ->where('status', 1);

        if ($request->search) {
            $members = $members->where(function ($q) use ($request) {
                $q->where('member_serial_no', 'like', '%' . $request->search . '%')
                    ->orWhere('member_serial_no_new', 'like', '%' . $request->search . '%')
                    ->orWhere('name_bn', 'like', '%' . $request->search . '%')
                    ->orWhere('name_en', 'like', '%' . $request->search . '%')
                    ->orWhere('nid', 'like', '%' . $request->search . '%');
            });
        }

        $members = $members->limit(10)->get();

        return response()->json($members);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:our_members,id',
            'card_number' => 'required|unique:member_id_cards,card_number',
            'card_type' => 'required|integer|in:1,2,3,4',
            'card_status' => 'required|integer|in:0,1',
            'card_allocation_date' => 'required|date',
            'card_expiration_date' => 'nullable|date|after:card_allocation_date',
        ]);

        try {
            // Check if member already has an active card
            $existingCard = MemberIdCard::where('member_id', $request->member_id)
                ->where('card_status', 1)
                ->first();

            if ($existingCard) {
                Toastr::warning('এই সদস্যের ইতিমধ্যে একটি সক্রিয় কার্ড রয়েছে!', 'Warning');
                return redirect()->back()->withInput();
            }

            MemberIdCard::create([
                'member_id' => $request->member_id,
                'card_number' => $request->card_number,
                'card_type' => $request->card_type,
                'card_status' => $request->card_status,
                'card_allocation_date' => $request->card_allocation_date,
                'card_expiration_date' => $request->card_expiration_date,
            ]);

            Toastr::success('আইডি কার্ড সফলভাবে যুক্ত হয়েছে', 'Success');
            return redirect()->route(currentUser() . '.memberIdCard.index');
        } catch (Exception $e) {
            Toastr::error('কার্ড যুক্ত করতে সমস্যা হয়েছে', 'Error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberIdCard  $memberIdCard
     * @return \Illuminate\Http\Response
     */
    public function show(MemberIdCard $memberIdCard)
    {
        $memberIdCard->load('member');
        return view('memberIdCard.show', compact('memberIdCard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberIdCard  $memberIdCard
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberIdCard $memberIdCard)
    {
        $memberIdCard->load('member');
        return view('memberIdCard.edit', compact('memberIdCard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberIdCard  $memberIdCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberIdCard $memberIdCard)
    {
        $request->validate([
            'card_number' => 'required|unique:member_id_cards,card_number,' . $memberIdCard->id,
            'card_type' => 'required|integer|in:1,2,3,4',
            'card_status' => 'required|integer|in:0,1',
            'card_allocation_date' => 'required|date',
            'card_expiration_date' => 'nullable|date|after:card_allocation_date',
        ]);

        try {
            $memberIdCard->update([
                'card_number' => $request->card_number,
                'card_type' => $request->card_type,
                'card_status' => $request->card_status,
                'card_allocation_date' => $request->card_allocation_date,
                'card_expiration_date' => $request->card_expiration_date,
            ]);

            Toastr::success('আইডি কার্ড সফলভাবে আপডেট হয়েছে', 'Success');
            return redirect()->route(currentUser() . '.memberIdCard.index');
        } catch (Exception $e) {
            Toastr::error('কার্ড আপডেট করতে সমস্যা হয়েছে', 'Error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberIdCard  $memberIdCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberIdCard $memberIdCard)
    {
        try {
            $memberIdCard->delete();
            Toastr::success('আইডি কার্ড সফলভাবে মুছে ফেলা হয়েছে', 'Success');
            return redirect()->route(currentUser() . '.memberIdCard.index');
        } catch (Exception $e) {
            Toastr::error('কার্ড মুছে ফেলতে সমস্যা হয়েছে', 'Error');
            return redirect()->back();
        }
    }
}
