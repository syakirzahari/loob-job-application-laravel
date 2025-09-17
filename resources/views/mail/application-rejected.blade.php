<x-mail::message>
    # {{ $content['header'] }}

    {{ $content['salutation'] }}

    {{ $content['body'] }}

    We truly appreciate the opportunity to learn more about your skills and experiences. We encourage you to apply for
    future openings that match your profile, as we would be glad to consider your application again.

    Thanks,
    {{ config('app.name') }}
</x-mail::message>
