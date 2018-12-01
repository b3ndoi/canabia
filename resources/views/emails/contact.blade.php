@component('mail::message')
#   {{ $email }

Phone: {{ $phone }}<br>
Subject: {{$subject}}<br>
<br>
<p>{{$messages}}</p>

@endcomponent