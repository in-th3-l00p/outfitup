@extends("layouts.main")

@section("content")
    <x-guest-layout>
        <div class="flex flex-col items-center justify-center">
            <div class="flex flex-col items-center justify-center text-center">
                <h1 class="text-3xl font-bold text-gray-900">Thank you for your order!</h1>
                <p class="text-xl text-gray-600">We will send you an email when your order ships</p>
            </div>
        </div>
    </x-guest-layout>
@endsection
