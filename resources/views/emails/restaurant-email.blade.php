<h1>New Order received!</h1>

<h5>Order Details:</h5>
@foreach ($order->meals as $meal)
    <ul>
        <li>Meal: <strong>{{ $meal->name }}</strong></li>
        <li>Price: <strong>{{ $meal->price }} €</strong></li>
        <li>Quantity: <strong>{{ $meal->pivot->quantity }}</strong></li>
        <li>Ingredients: <strong>{{ $meal->description }}</strong></li>
    </ul>
@endforeach
@if ($order->customer_note)
    <p>{{$order->customer_note}}</p>
@endif
<ul>
    <li>Tot: <strong>{{ $order->price_tot }} €</strong></li>
</ul>

<h5>Customer Details:</h5>
<ul>
    <li>{{$order->customer_name}}</li>
    <li>{{$order->customer_address}}</li>
    <li>{{$order->customer_phone}}</li>
</ul>