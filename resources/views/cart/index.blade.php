<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h2 class="text-lg font-medium text-gray-900">Shopping cart</h2>

                <ul class="w-full">
                    @forelse ($cartItems as $item)
                        <li class="mt-6 border-t border-gray-200 pt-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <img
                                        class="h-24 w-24 rounded-md object-cover sm:h-32 sm:w-32"
                                        src="{{ $item->product->image}}"
                                        alt="{{ $item->product->title }}"
                                    >
                                </div>
                                <div class="ml-4 flex-1 flex flex-col justify-between sm:ml-6">
                                    <div>
                                        <div class="flex justify-between">
                                            <h3 class="text-sm">{{ $item->product->title }}</h3>
                                            <p class="ml-4 text-sm font-medium text-gray-900">
                                                ${{ $item->product->price }}
                                            </p>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">
                                            {{ $item->product->description }}
                                        </p>
                                    </div>
                                    <div class="mt-4 flex-1 flex items-end justify-between text-sm">
                                        <p class="text-gray-500">
                                            Qty {{ $item->quantity }}
                                        </p>
                                        <div class="flex">
                                            <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @empty
                        <div class="mt-6">
                            <p class="text-lg text-gray-500">
                                Your cart is empty
                            </p>
                        </div>
                    @endforelse
                </ul>

                <div class="flex justify-between items-center pt-8 text-xl pb-4 mb-4 border-b">
                    <p>Total</p>
                    <p class="font-bold">{{ $total }} RON</p>
                </div>

                <form
                    method="POST"
                    action="{{ route("checkout") }}"
                    class="flex justify-center items-center"
                >
                    @csrf

                    <x-primary-button>Checkout</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
