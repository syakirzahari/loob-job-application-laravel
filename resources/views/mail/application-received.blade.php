<x-mail::message>
    # {{ $content['header'] }}

    {{ $content['salutation'] }}

    {{ $content['body'] }}

    Details of the application:

    Reference No.: {{ $application->reference_no }}
    Applicant Name: {{ $application->applicant_name }}
    Position: {!! $application->jobPosting->title !!}
    Date & Time Received : {{ $application->created_at ?? '-' }}

    {{ $content['thanks'] }},

    {{ config('app.name') }}
</x-mail::message>
