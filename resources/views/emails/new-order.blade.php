@component('mail::message')
# New Order

@component('mail::table')
| Product       | Price         | Amount  |
| ------------- |:-------------:| --------:|
@foreach($cart as $item)
| {{$item->name}} ({{$item->amount}}{{$item->unit}})       | ${{$item->price}}      |{{ $item->count}}      |
@endforeach
@endcomponent


<!-- @component('mail::button', ['url' => '/'])
View Order
@endcomponent -->

@endcomponent