<x-mail::message>
    # {{ $content['header'] }}

    {{ $content['salutation'] }}

    {{ $content['body'] }}

    Details of the interview session:

    Reference No.: {{ $application->reference_no }}
    Applicant Name: {{ $application->applicant_name }}
    Job Position: {{ $application->jobPosting->title ?? '-' }}
    Interview Date : {{ $application->interview_date ?? '-' }}
    Interview type : Online Meeting (Links will be provided later)

    We look forward to speaking with you.

    {{ $content['thanks'] }},

    {{ config('app.name') }}
</x-mail::message>
