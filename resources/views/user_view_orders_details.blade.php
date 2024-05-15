@extends('layouts.header')

@section('content')

<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title text-white mb-25">Order View</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a class="text-white"
                                    href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Order View</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start login section  -->
    <div class="login__section section--padding">
        <div class="container">
            <form action="#">
                <div class="login__section--inner">
                    <div class="row row-cols-md-12 row-cols-1">

                        <div class="col">
                            <div class="table-responsive-md">

                                <table class="table table-striped p-4 mt-4">
                                    {{-- <h6 class="display-6">Order Detail</h6> --}}
                                    <tbody>
                                        <tr>
                                            <th scope="row">Order ID</th>
                                            <td>{{ $order->order_num }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total Price</th>
                                            <td>Rs. {{ $order->price_after_coupon }}</td>
                                        </tr>
                                        <tr>
                                            @if($order->order_status == 'delivered' || $order->order_status ==
                                            'cancelled')
                                            <th scope="row">Estimate Date</th>
                                            <td>{{"N/A" }}</td>
                                            @else
                                            <th scope="row">Estimate Date</th>
                                            <td>{{ $order->estimate_date }}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">Order Status</th>
                                            <td>{{ $order->order_status }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Created Order</th>
                                            <td>{{ \Carbon\Carbon::parse( $order->created_at)->format('h:i:s A d-m-Y')
                                                }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Updated Order</th>
                                            <td>{{ \Carbon\Carbon::parse($order->updated_at)->format('h:i:s A d-m-Y') }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cr-cart-content" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="row">
                            <form action="#">
                                <div class="cr-table-content">
                                    <table class="account__table">
                                        <thead class="account__table--header">
                                            <tr>
                                                <th class="account__table--header__child--items">Sr.</th>
                                                <th class="account__table--header__child--items">Photo</th>
                                                <th class="account__table--header__child--items">Name</th>
                                                <th class="account__table--header__child--items">Original Price</th>
                                                <th class="account__table--header__child--items">Discounted Price</th>
                                                <th class="account__table--header__child--items">Item Count</th>
                                                <th class="account__table--header__child--items">Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody class="account__table--body mobile__none">
                                            @php
                                            $i=0;
                                            @endphp
                                            @foreach ($items as $item )
                                            @php
                                            $i++;
                                            @endphp
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">{{ $i }}</td>
                                                <td class="account__table--body__child--items">
                                                    <div class="user-icon">
                                                        <img src="{{ asset('uploads/Products Images/'.$item->product->image) }}"
                                                            style="height: 50px; width: 50px;">
                                                    </div>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    @if ($item->product->name)
                                                    {{ $item->product->name ?? 'N/A' }}
                                                    @else
                                                    N/A
                                                    @endif
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    @if ($item->original_price)
                                                    ₹ {{ $item->original_price ?? 'N/A' }}
                                                    @else
                                                    N/A
                                                    @endif
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    @if ($item->discounted_price)
                                                    ₹ {{ $item->discounted_price ?? 'N/A' }}
                                                    @else
                                                    N/A
                                                    @endif
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    @if ($item->item_count)
                                                    {{ $item->item_count ?? 'N/A' }}
                                                    @else
                                                    N/A
                                                    @endif
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    @if ($item->total_price)
                                                    ₹ {{ $item->total_price ?? 'N/A' }}
                                                    @else
                                                    N/A
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                            @foreach ($items as $item )
                                            @php
                                            $i++;
                                            @endphp

                                        <tbody class="account__table--body mobile__block mt-4 border border-light p-4">

                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">
                                                    <strong>Sr. No.</strong>
                                                    <span>{{ $i }}</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Photo</strong>
                                                    <span><div class="user-icon">
                                                        <img src="{{ asset('uploads/Products Images/'.$item->product->image) }}"
                                                            style="height: 50px; width: 50px;">
                                                    </div></span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Name</strong>
                                                    <span>@if ($item->product->name)
                                                        {{ $item->product->name ?? 'N/A' }}
                                                        @else
                                                        N/A
                                                        @endif</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Original Price</strong>
                                                    <span> @if ($item->original_price)
                                                        ₹ {{ $item->original_price ?? 'N/A' }}
                                                        @else
                                                        N/A
                                                        @endif</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Discounted Price</strong>
                                                    <span>@if ($item->discounted_price)
                                                        ₹ {{ $item->discounted_price ?? 'N/A' }}
                                                        @else
                                                        N/A
                                                        @endif</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Item Count</strong>
                                                    <span> @if ($item->item_count)
                                                        {{ $item->item_count ?? 'N/A' }}
                                                        @else
                                                        N/A
                                                        @endif</span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Total Price</strong>
                                                    <span> @if ($item->total_price)
                                                        ₹ {{ $item->total_price ?? 'N/A' }}
                                                        @else
                                                        N/A
                                                        @endif</span>
                                                </td>

                                            </tr>

                                        </tbody>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End login section  -->



</main>
{{-- <table class="account__table">
    <thead class="account__table--header">
        <tr class="account__table--header__child">
            <th class="account__table--header__child--items">Sr. No.</th>
            <th class="account__table--header__child--items">Order ID</th>
            <th class="account__table--header__child--items">Total Price</th>
            <th class="account__table--header__child--items">Order Status</th>
            <th class="account__table--header__child--items">Order Date</th>
            <th class="account__table--header__child--items">Action</th>
        </tr>
    </thead>

    <tbody class="account__table--body mobile__none">
        @php
        $i=0;
        @endphp
        @foreach ($orders as $order)
        @php
        $i++;
        @endphp
        <tr class="account__table--body__child">
            <td class="account__table--body__child--items">
                {{ $i }}
            </td>
            <td class="account__table--body__child--items">
                {{ $order->order_num }}
            </td>
            <td class="cr-cart-price">
                ₹  {{ $order->price_after_coupon }}
            </td>
            <td class="account__table--body__child--items">
                {{ $order->order_status }}
            </td>
            <td class="account__table--body__child--items">
                {{ optional($order->created_at)->format('g:i:s A d-m-Y ') }}
            </td>
            <td class="account__table--body__child--items">
                <style>
                    .button {
                        padding: 7px;
                        font-size: 16px;
                        border-radius: 2px;
                        border: none;
                        margin: 5px;
                    }
                </style>
                <div class="d-flex algin-items-center">
                    <a href="{{ route('user.view.order.details',['id'=>$order->id]) }}" class="button text-white"
                        style="background-color: #64b496; text-decoration:none;">view
                    </a>
                    <br>
                    @if ($order->order_status != 'cancelled' && $order->order_status !=
                    'delivered')
                    <button type="button" class="button bg-danger text-white" data-bs-toggle="myModal"
                        data-bs-target="#myModal">Cancel</button>
                    @endif
                </div>

            </td>
        </tr>
        @endforeach


    </tbody>
    @php
    $i=0;
    @endphp
    @foreach ($orders as $order)
    @php
    $i++;
    @endphp
    <tbody class="account__table--body mobile__block">

        <tr class="account__table--body__child">
            <td class="account__table--body__child--items">
                <strong>Sr. No.</strong>
                <span>{{ $i }}</span>
            </td>
            <td class="account__table--body__child--items">
                <strong>Order ID</strong>
                <span>{{ $order->order_num }}</span>
            </td>
            <td class="account__table--body__child--items">
                <strong>Total Price</strong>
                <span>₹  {{ $order->price_after_coupon }}</span>
            </td>
            <td class="account__table--body__child--items">
                <strong>Order Status</strong>
                <span>{{ $order->order_status }}</span>
            </td>
            <td class="account__table--body__child--items">
                <strong>Order Date</strong>
                <span>{{ optional($order->created_at)->format('g:i:s A d-m-Y ') }}</span>
            </td>
            <td class="account__table--body__child--items">
                <strong>Action</strong>
                <span>
                    <style>
                        .buttonmob {
                            padding: 5px;
                            font-size: 14px;
                            border-radius: 9px;
                            border: none;
                            margin: 3px;
                        }
                    </style>
                    <div class="d-flex algin-items-center">
                        <a href="{{ route('user.view.order.details',['id'=>$order->id]) }}" class="buttonmob text-white"
                            style="background-color: #64b496; text-decoration:none;">view
                        </a>
                        <br>
                        @if ($order->order_status != 'cancelled' && $order->order_status !=
                        'delivered')
                        <button type="button" class="buttonmob bg-danger text-white" data-bs-toggle="myModal"
                            data-bs-target="#myModal">Cancel</button>
                        @endif
                    </div>
                </span>
            </td>
        </tr>

    </tbody>
    @endforeach
</table> --}}



@endsection
