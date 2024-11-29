@extends('frontend.layouts.master')
@section('content')

<!-- Car booking preview -->
<section class="appointment-preview ptb-60">
    <div class="container">
        <div class="row justify-content-center mb-30-none">
            <div class="col-xl-8 col-lg-8 col-md-12 mb-30">
                <div class="booking-area">
                    <div class="content pt-0">
                        <h3 class="title"><i class="fas fa-info-circle text--base mb-20"></i> {{ __("Booking Preview") }}</h3>
                        <div class="list-wrapper">
                            <ul class="list">
                                <li>{{ __("Pick-up Location") }} :<span>{{ @$customer->value->location }}</span></li>
                                <li>{{ __("Destination") }} :<span>{{ @$customer->value->destination }}</span></li>
                                <li>{{ __("Pick-up Date") }} :<span>{{ @$customer->value->pickup_date ? \Carbon\Carbon::parse($customer->value->pickup_date)->format('d-m-Y') : '' }}</span></li>
                                <li>{{ __("Pick-up Time") }} :<span>{{ @$customer->value->pickup_time ? \Carbon\Carbon::parse($customer->value->pickup_time)->format('h:i A') : '' }}</span></li>
                                <li>{{ __("Round Trip Date") }} :<span>{{ @$customer->value->round_pickup_date ? \Carbon\Carbon::parse($customer->value->round_pickup_date)->format('d-m-Y') : 'N/A' }}</span></li>
                                <li>{{ __("Round Trip Time") }} :<span>{{ @$customer->value->round_pickup_time ? \Carbon\Carbon::parse($customer->value->round_pickup_time)->format('h:i A') : 'N/A' }}</span></li>
                                <li>{{ __("Car Model") }} :<span>{{ @$car->car_model }}</span></li>
                                <li>{{ __("Car Number") }} :<span>{{ @$car->car_number }}</span></li>
                                <li>{{ __("Rate") }} :<span>{{ get_amount(@$car->fees)}}{{ __("/KM") }} {{ $default_currency->code }}</span></li>
                            </ul>
                        </div>

                        <!-- Button Area -->
                        <div class="btn-area mt-20">
                            <a class="btn--base w-100" 
                               id="confirmBookingButton" 
                               href="javascript:void(0);">
                                {{ __("Confirm Booking") }} <i class="fas fa-check-circle ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>

    <script>
        document.getElementById('confirmBookingButton').addEventListener('click', async function () {

            const data = {
                orderCode:  new Date().getTime(),
                amount: {{  $car->fees }}, // Sử dụng giá trị ngân sách của khách hàng
                description: "payment " + " booking".substring(0, 10),
                cancelUrl: `${window.location.origin}/cancel`,
                returnUrl: `${window.location.origin}/success?token={{ $customer->token }}`,
            };

            // Tạo chữ ký HMAC
            const signature = CryptoJS.HmacSHA256(
                `amount=${data.amount}&cancelUrl=${data.cancelUrl}&description=${data.description}&orderCode=${data.orderCode}&returnUrl=${data.returnUrl}`,
                "1976aa4d5435b5a31282610c505479620ac3659ddac2307da4327aba25edfa6b"
            ).toString(CryptoJS.enc.Hex);

            // Gọi API thanh toán
            try {
                const res = await axios.post(
                    "https://api-merchant.payos.vn/v2/payment-requests",
                    {
                        ...data,
                        signature: signature,
                    },
                    {
                        headers: {
                            "x-client-id": "3daf46fd-014e-4083-91fb-e9956c2579a7",
                            "x-api-key": "1eadc55b-0532-4421-be29-f74a363db62e",
                            "Content-Type": "application/json",
                        },
                    }
                );

                // Chuyển hướng đến URL thanh toán
                window.location = res.data.data.checkoutUrl;
            } catch (error) {
                console.error("Payment request failed:", error);
            }
        });
    </script>
@endsection


