@component('mail::message')

@component('mail::panel')
{{ __('Hello :name', ['name' => $name])  }}

{{ __('Your vaccination schedule is as follows: ') }}

<p>Your vaccination has been scheduled for {{ $scheduled_date }}.</p>
<p>Please visit the assigned center {{ $center }} on the scheduled date.</p>

{{ __('If you have any questions, please contact us at :email.', ['email' => '9I8d6@example.com']) }}
@endcomponent


@endcomponent
