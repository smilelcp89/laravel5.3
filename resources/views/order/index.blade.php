@extends('layouts.app')

<div class="container">
    @foreach ($orders as $order)
        {{ $order->order_no }}
    @endforeach
</div>

{{ $orders->links('test.page') }}