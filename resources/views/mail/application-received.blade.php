<x-mail::message>
    # {{ $content['header'] }}

    {{ $content['salutation'] }},

    {{ $content['body'] }}

    Details of the application:

    <p>Reference No.: {{ $application->reference_no }}</p>
    <p>Applicant Name: {{ $application->applicant_name }}</p><br>
    <p>Position: {!! $application->jobPosting->title !!}</p>
    <p>Date & Time Received : {{ $application->created_at ?? '-' }}</p>

    {{ $content['thanks'] }},
    <br>
    {{ config('app.name') }}
</x-mail::message>
