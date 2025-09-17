<x-mail::message>
    # {{ $content['header'] }}

    {{ $content['salutation'] }}

    {{ $content['body'] }}

    Details of the offer:

    Applicant Name: {{ $application->applicant_name }}
    Job Position: {{ $application->jobPosting->title ?? '-' }}
    Location / Work Arrangement: Hybrid

    We are excited about the possibility of you joining our team and contributing to our continued success.

    Once again, congratulations, and we look forward to welcoming you to Loob Holding.

    {{ $content['thanks'] }},

    {{ config('app.name') }}
</x-mail::message>
