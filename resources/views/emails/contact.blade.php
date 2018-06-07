<h1>@lang('contact.email.welcome')</h1>

<p>
    @lang('contact.email.description'):
</p>

<p>
    <strong>@lang('contact.email.from'):</strong> {{ $contact['from'] }}
</p>

<p>
    <strong>@lang('contact.email.message'):</strong> {{ $contact['body'] }}
</p>
