<h1>Dear {{ $order->customer_name }},</h1>

<h5>We hope this email finds you well. We wanted to inform you that we have received your new order successfully. Thank
    you for choosing {{ $restaurant->name }}!</h5>

<h5>Order Details:</h5>
@foreach ($order->meals as $meal)
    <ul>
        <li>Meal: <strong>{{ $meal->name }}</strong></li>
        <li>Price: <strong>{{ $meal->price }} €</strong></li>
        <li>Quantity: <strong>{{ $meal->pivot->quantity }}</strong></li>
        <li>Ingredients: <strong>{{ $meal->description }}</strong></li>
    </ul>
@endforeach
<ul>
    <li>Tot: <strong>{{ $order->price_tot }} €</strong></li>
</ul>


<h5>Please review the order details carefully. If you have any questions or need further assistance, feel free to reach out to our customer support team at {{$restaurant->email}}.</h5>

<h5>Best regards,</h5>
<h4>{{$restaurant->name}}</h4>
<h5>{{$restaurant->address}}</h5>
