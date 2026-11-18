<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactRequestController extends Controller
{
    /**
     * Display a listing of contact & appointment requests.
     */


    public function index(Request $request)
    {
        $requests = ContactRequest::query()
            ->select('contact_requests.*')
            ->latest('created_at')
            ->get();

        $totalRequests = ContactRequest::count();

        $contactCount = ContactRequest::where(
            'type',
            'contact'
        )->count();

        $appointmentCount = ContactRequest::where(
            'type',
            'appointment'
        )->count();

        $todayCount = ContactRequest::whereDate(
            'created_at',
            now()->toDateString()
        )->count();

        return view(
            'backend.setting_management.contact_requests.index',
            compact(
                'requests',
                'totalRequests',
                'contactCount',
                'appointmentCount',
                'todayCount'
            )
        );
    }

    /**
     * Display the specified request.
     */
    public function show(ContactRequest $contact_request)
    {
        return view(
            'backend.setting_management.contact_requests.show',
            compact('contact_request')
        );
    }

    /**
     * Show the form for editing the specified request.
     */
    public function edit(ContactRequest $contact_request)
    {
        return view(
            'backend.setting_management.contact_requests.edit',
            compact('contact_request')
        );
    }

    /**
     * Update the specified request.
     */
    public function update(Request $request, ContactRequest $contact_request)
    {
        $request->validate([
            'name' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|string|max:100',
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:2000',
        ]);

        $contact_request->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()
            ->route('contact_requests.index')
            ->with('success', 'Request updated successfully.');
    }

    /**
     * Remove the specified request.
     */
    public function destroy(ContactRequest $contact_request)
    {
        $contact_request->delete();

        return redirect()
            ->route('contact_requests.index')
            ->with('success', 'Request deleted successfully.');
    }
}
