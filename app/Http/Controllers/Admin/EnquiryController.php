<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Enquiry::class);

        $enquiries = Enquiry::visibleTo(auth()->user())
            ->with('motorcycle.brand')
            ->latest()
            ->get();

        return view('admin.enquiries.index', compact('enquiries'));
    }

    public function show(Enquiry $enquiry)
    {
        $this->authorize('view', $enquiry);

        $enquiry->load('motorcycle.brand', 'motorcycle.category');

        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function destroy(Enquiry $enquiry)
    {
        $this->authorize('delete', $enquiry);

        $enquiry->delete();

        return redirect()->route('enquiries.index')->with('success', 'Enquiry deleted successfully.');
    }
}
