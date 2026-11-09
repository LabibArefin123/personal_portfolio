<?php

namespace App\Http\Controllers;

use App\Mail\ContactConfirmationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\SystemProblem;
use App\Models\Gallery;
use App\Models\ContactRequest;
use App\Models\ContactScammer;
use App\Models\ContactWaiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use App\Models\Skill;
use App\Models\Project;

class WelcomePageController extends Controller
{
    public function index()
    {
        $projects = Project::where('status', 1)
            ->orderByDesc('is_highlight')
            ->orderBy('position')
            ->get();

        $skills = Skill::where('status', 1)
            ->orderBy('position')
            ->get()
            ->groupBy('category');

        return view('frontend.welcome', compact(
            'projects',
            'skills'
        ));
    }
    public function about()
    {
        return view('frontend.about');
    }

    public function projects()
    {
        $projects = Project::where('status', 1)
            ->orderByDesc('is_highlight')
            ->orderBy('position')
            ->get();

        return view('frontend.project_page.project', compact('projects'));
    }

    public function project_show($id)
    {
        $project = Project::with('information')->findOrFail($id);

        $info = $project->information;

        if ($info) {

            $info->project_images = is_array($info->project_images)
                ? $info->project_images
                : json_decode($info->project_images ?? '[]', true);

            $info->custom_features = is_array($info->custom_features)
                ? $info->custom_features
                : json_decode($info->custom_features ?? '[]', true);

            $info->project_languages = is_array($info->project_languages)
                ? $info->project_languages
                : json_decode($info->project_languages ?? '[]', true);
        }

        return view('frontend.project_page.show', compact('project'));
    }

    public function education()
    {
        return view('frontend.education');
    }

    public function skills()
    {
        $skills = Skill::where('status', 1)
            ->orderBy('position')
            ->get()
            ->groupBy('category');

        return view('frontend.skills', compact('skills'));
    }

    public function faq()
    {
        return view('frontend.faq');
    }

    public function service()
    {
        return view('frontend.service');
    }

    public function gallery()
    {
        $galleries = Gallery::all();
        return view('frontend.gallery', compact('galleries'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function system_problem_store(Request $request)
    {
        $request->validate([
            'problem_title'       => 'required|string|max:255',
            'problem_description' => 'required|string',
            'status'              => 'required|in:low,medium,high,critical',
            'problem_file'        => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:4096',
        ]);

        // Generate readable unique ID
        $uid = 'DFCH-PROB-' . strtoupper(Str::random(6));

        $fileName = null;

        if ($request->hasFile('problem_file')) {

            $file      = $request->file('problem_file');
            $extension = $file->getClientOriginalExtension();
            $original  = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            // Time format: HHMMSS_DDMMYY
            $timeStamp = Carbon::now()->format('His_dmy');

            // Clean filename
            $fileName = Str::slug($original) . '_' . $timeStamp . '.' . $extension;

            // Decide folder
            $imageExt = ['jpg', 'jpeg', 'png'];
            $folder   = in_array(strtolower($extension), $imageExt)
                ? 'uploads/problem/images'
                : 'uploads/problem/files';

            // Move file
            $file->move(public_path($folder), $fileName);
        }

        SystemProblem::create([
            'problem_uid'        => $uid,
            'problem_title'      => $request->problem_title,
            'problem_description' => $request->problem_description,
            'status'             => $request->status,
            'problem_file'       => $fileName, // only filename saved
        ]);

        return back()->with('success', '✅ Your problem has been submitted successfully.');
    }

    public function contactStore(Request $request)
    {
        $ip = $request->ip();

        $rateKey = 'contact-form:' . $ip;

        /*
    |--------------------------------------------------------------------------
    | 1. Check Existing Scammer
    |--------------------------------------------------------------------------
    */

        $scammer = ContactScammer::where('ip_address', $ip)->first();

        if ($scammer && $scammer->isBlocked()) {

            return back()
                ->withInput()
                ->withErrors([
                    'message' => 'Your contact access has been temporarily restricted due to suspicious activity.'
                ]);
        }

        /*
    |--------------------------------------------------------------------------
    | 2. Rate Limiting
    |--------------------------------------------------------------------------
    */

        if (RateLimiter::tooManyAttempts($rateKey, 5)) {

            $seconds = RateLimiter::availableIn($rateKey);

            return back()
                ->withInput()
                ->withErrors([
                    'message' => 'Too many attempts. Please try again after ' .
                        ceil($seconds / 60) . ' minute(s).'
                ]);
        }

        RateLimiter::hit($rateKey, 900);

        /*
    |--------------------------------------------------------------------------
    | 3. Honeypot Protection
    |--------------------------------------------------------------------------
    */

        if ($request->filled('website')) {

            $this->recordContactScammer(
                $request,
                'Honeypot spam detected'
            );

            return back()->withErrors([
                'message' => 'Your submission could not be processed.'
            ]);
        }

        /*
    |--------------------------------------------------------------------------
    | 4. Submission Time Validation
    |--------------------------------------------------------------------------
    */

        $formStarted = (int) $request->input('form_started_at', 0);

        $elapsed = now()->timestamp - $formStarted;

        if (!$formStarted || $elapsed < 3 || $elapsed > 7200) {

            $this->recordContactScammer(
                $request,
                'Suspicious form submission timing'
            );

            return back()->withErrors([
                'message' => 'Please complete the form normally and try again.'
            ]);
        }

        /*
    |--------------------------------------------------------------------------
    | 5. Strong Field Validation
    |--------------------------------------------------------------------------
    */

        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'min:2',
                'max:80',
                'regex:/^[\pL\pM][\pL\pM\s.\'-]*$/u',
            ],

            'email' => [
                'required',
                'string',
                'email:rfc',
                'max:150',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:25',
                'regex:/^\+?[0-9\s().-]{7,25}$/',
            ],

            'subject' => [
                'nullable',
                'string',
                'min:3',
                'max:120',
            ],

            'message' => [
                'required',
                'string',
                'min:20',
                'max:5000',
            ],

        ], [

            'name.regex' => 'Please enter a valid name.',

            'email.email' => 'Please enter a valid email address.',

            'phone.regex' => 'Please enter a valid phone number.',

            'message.min' => 'Your message must contain at least 20 characters.',

            'message.max' => 'Your message cannot exceed 5000 characters.',

        ]);

        /*
    |--------------------------------------------------------------------------
    | 6. Reject Links and URLs
    |--------------------------------------------------------------------------
    */

        $linkPattern = '/(?:https?:\/\/|ftp:\/\/|www\.)|(?:\[[^\]]+\]\([^)]+\))|(?:<a\b)|(?:\b[a-z0-9-]+(?:\.[a-z0-9-]+)+\.(?:com|net|org|io|co|dev|app|info|biz|xyz|online|site|link|me|ly|gg|tech|edu|gov|bd|uk|us|de|in|ai)\b)/iu';

        $textToCheck = ($validated['subject'] ?? '') . ' ' . $validated['message'];

        if (preg_match($linkPattern, $textToCheck)) {

            $this->recordContactScammer(
                $request,
                'URL or suspicious link detected'
            );

            return back()
                ->withInput()
                ->withErrors([
                    'message' => 'Links and website addresses are not allowed in contact messages. Please remove the link and try again.'
                ]);
        }

        /*
    |--------------------------------------------------------------------------
    | 7. Reject HTML and Script Injection
    |--------------------------------------------------------------------------
    */

        if (
            preg_match('/<[^>]*>/u', $validated['message']) ||
            preg_match('/javascript\s*:/iu', $validated['message'])
        ) {

            $this->recordContactScammer(
                $request,
                'HTML or script injection attempt'
            );

            return back()->withErrors([
                'message' => 'HTML and script content are not allowed.'
            ]);
        }

        /*
    |--------------------------------------------------------------------------
    | 8. Submission Cooldown
    |--------------------------------------------------------------------------
    */

        $waiter = ContactWaiter::firstOrCreate(
            ['ip_address' => $ip],
            ['attempts' => 0]
        );

        if (
            $waiter->last_submission_at &&
            $waiter->last_submission_at->gt(now()->subMinute())
        ) {

            return back()
                ->withInput()
                ->withErrors([
                    'message' => 'Please wait at least 60 seconds before submitting another message.'
                ]);
        }

        /*
    |--------------------------------------------------------------------------
    | 9. Daily Submission Limit
    |--------------------------------------------------------------------------
    */

        $todayCount = ContactRequest::where('ip_address', $ip)
            ->where('type', 'contact')
            ->whereDate('created_at', Carbon::today())
            ->count();

        if ($todayCount >= 5) {

            return back()
                ->withInput()
                ->withErrors([
                    'message' => 'You have reached the daily contact submission limit. Please try again tomorrow.'
                ]);
        }

        /*
    |--------------------------------------------------------------------------
    | 10. Save Contact Request
    |--------------------------------------------------------------------------
    */

        try {

            $contact = DB::transaction(function () use (
                $validated,
                $request,
                $ip,
                $waiter,
                $todayCount
            ) {

                $lastRequest = ContactRequest::where('ip_address', $ip)
                    ->where('type', 'contact')
                    ->latest('id')
                    ->first();

                $totalCount = $lastRequest
                    ? $lastRequest->total_count + 1
                    : 1;

                $contact = ContactRequest::create([

                    'name'        => trim($validated['name']),
                    'phone'       => $validated['phone'] ?? null,
                    'email'       => strtolower(trim($validated['email'])),
                    'subject'     => isset($validated['subject'])
                        ? trim($validated['subject'])
                        : null,
                    'message'     => trim($validated['message']),

                    'type'        => 'contact',

                    'ip_address'  => $ip,

                    'total_count' => $totalCount,

                ]);

                $waiter->update([
                    'last_submission_at' => now(),
                    'last_attempt_at'    => now(),
                ]);

                return $contact;
            });
        } catch (\Throwable $e) {

            Log::error('Contact submission failed', [
                'ip' => $ip,
                'error' => $e->getMessage(),
            ]);

            return back()
                ->withInput()
                ->withErrors([
                    'message' => 'Something went wrong. Please try again later.'
                ]);
        }

        /*
    |--------------------------------------------------------------------------
    | 11. Send Confirmation Email
    |--------------------------------------------------------------------------
    */

        try {

            Mail::to($contact->email)
                ->send(new ContactConfirmationMail($contact->name));
        } catch (\Throwable $e) {

            Log::error('Contact confirmation email failed', [
                'email' => $contact->email,
                'error' => $e->getMessage(),
            ]);
        }

        /*
    |--------------------------------------------------------------------------
    | 12. Success Notification
    |--------------------------------------------------------------------------
    */

        session()->flash('contact_success', [
            'count' => $todayCount + 1,
            'time'  => now()->format('d M Y, h:i A'),
        ]);

        return back();
    }

    private function recordContactScammer(Request $request, string $reason): void
    {

        $ip = $request->ip();

        $scammer = ContactScammer::firstOrNew([
            'ip_address' => $ip,
        ]);

        $scammer->hits = ($scammer->hits ?? 0) + 1;

        $scammer->email = $request->input('email') ?: $scammer->email;
        $scammer->phone = $request->input('phone')?: $scammer->phone;
        $scammer->reason = $reason;
        $scammer->user_agent = Str::limit($request->userAgent() ?? '',500);

        if ($request->filled('message')) {
            $scammer->message_hash = hash(
                'sha256',
                $request->input('message')
            );
        }

        // Repeated suspicious activity increases the restriction.
        if ($scammer->hits >= 5) {

            $scammer->is_permanent = true;
            $scammer->blocked_until = null;
        } else {

            $scammer->blocked_until = now()->addHours(
                $scammer->hits >= 3 ? 24 : 1
            );
        }

        $scammer->save();
    }
}
