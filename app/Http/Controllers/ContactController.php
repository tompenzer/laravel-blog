<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\User;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Mail;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     *
     * @param object $recipient Optional - The user who should receive the
     *                          contact form submission email. This is accessed
     *                          via the 'contact.user' route.
     */
    public function index(Request $request, User $recipient = null): View
    {
        if (! isset($recipient->id)) {
            $contactable = User::contactable();

            // No recipient selection if there's only one
            if ($contactable->count() < 2) {
                $recipient = [];
            } else {
                $recipient = $contactable->pluck('name', 'id');
            }
        }

        return view('contact', [
            'recipients' => $recipient
        ]);
    }

    /**
     * Send the contact form submission via email.
     */
    public function send(ContactRequest $request): RedirectResponse
    {
        $recipient = collect([]);

        $arguments = $request->only('email_from', 'message', 'recipient');

        if ($request->filled('recipient')) {
            $recipient = User::find($arguments['recipient']);
        }

        if ($recipient->count() === 0) {
            $recipient = User::contactable();
        }

        // If we can't find any contactable users, return error.
        if ($recipient->count() === 0) {
            return redirect()->route('contact')->withErrors(__('contact.form.failed'))->withInput();
        }

        $recipient = $recipient->first();

        if ($recipient->isContactable()) {
            Mail::to($recipient->email)->send(new Contact($arguments['email_from'], $arguments['message']));

            return redirect()->route('contact')->withSuccess(__('contact.form.sent'));
        } else {
            return redirect()->route('contact')->withErrors(__('contact.form.failed'))->withInput();
        }
    }
}
