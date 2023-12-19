@extends("layouts.main")

@section("content")
    <div
        class="relative bg-white pt-[120px] pb-[110px] lg:pt-[150px]"
    >
        <div class="container mx-auto">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="w-full px-4 lg:w-5/12">
                    <div class="hero-content">
                        <h1
                            class="mb-5 text-4xl font-bold !leading-[1.208] text-dark sm:text-[42px] lg:text-[40px] xl:text-5xl"
                        >
                            OutfitUp
                        </h1>
                        <p
                            class="mb-8 max-w-[480px] text-base text-body-color"
                        >
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis deserunt suscipit voluptate? Consectetur dolore earum esse et fugiat itaque magni maiores modi nemo nisi ratione velit veritatis vero, vitae voluptate.
                        </p>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-6/12">
                    <div class="lg:ml-auto lg:text-right">
                        <div class="relative z-10 inline-block pt-11 lg:pt-0">
                            <img
                                src="https://cdn.tailgrids.com/2.0/image/marketing/images/hero/hero-image-01.png"
                                alt="hero"
                                class="max-w-full lg:ml-auto"
                            />
                            <span class="absolute -left-8 -bottom-8 z-[-1]">
                                <svg
                                     width="93"
                                     height="93"
                                     viewBox="0 0 93 93"
                                     fill="none"
                                     xmlns="http://www.w3.org/2000/svg"
                                >
                                    <circle cx="2.5" cy="2.5" r="2.5" fill="#3056D3" />
                                    <circle cx="2.5" cy="24.5" r="2.5" fill="#3056D3" />
                                    <circle cx="2.5" cy="46.5" r="2.5" fill="#3056D3" />
                                    <circle cx="2.5" cy="68.5" r="2.5" fill="#3056D3" />
                                    <circle cx="2.5" cy="90.5" r="2.5" fill="#3056D3" />
                                    <circle cx="24.5" cy="2.5" r="2.5" fill="#3056D3" />
                                    <circle cx="24.5" cy="24.5" r="2.5" fill="#3056D3" />
                                    <circle cx="24.5" cy="46.5" r="2.5" fill="#3056D3" />
                                    <circle cx="24.5" cy="68.5" r="2.5" fill="#3056D3" />
                                    <circle cx="24.5" cy="90.5" r="2.5" fill="#3056D3" />
                                    <circle cx="46.5" cy="2.5" r="2.5" fill="#3056D3" />
                                    <circle cx="46.5" cy="24.5" r="2.5" fill="#3056D3" />
                                    <circle cx="46.5" cy="46.5" r="2.5" fill="#3056D3" />
                                    <circle cx="46.5" cy="68.5" r="2.5" fill="#3056D3" />
                                    <circle cx="46.5" cy="90.5" r="2.5" fill="#3056D3" />
                                    <circle cx="68.5" cy="2.5" r="2.5" fill="#3056D3" />
                                    <circle cx="68.5" cy="24.5" r="2.5" fill="#3056D3" />
                                    <circle cx="68.5" cy="46.5" r="2.5" fill="#3056D3" />
                                    <circle cx="68.5" cy="68.5" r="2.5" fill="#3056D3" />
                                    <circle cx="68.5" cy="90.5" r="2.5" fill="#3056D3" />
                                    <circle cx="90.5" cy="2.5" r="2.5" fill="#3056D3" />
                                    <circle cx="90.5" cy="24.5" r="2.5" fill="#3056D3" />
                                    <circle cx="90.5" cy="46.5" r="2.5" fill="#3056D3" />
                                    <circle cx="90.5" cy="68.5" r="2.5" fill="#3056D3" />
                                    <circle cx="90.5" cy="90.5" r="2.5" fill="#3056D3" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-8 px-4 sm:px-8 lg:px-32">
        <h2 class="text-3xl mb-4">Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach (\App\Models\Product::query()->limit(4)->get() as $product)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="relative pb-[100%]">
                        <img
                            class="absolute h-full w-full object-cover"
                            src="{{ $product->image }}"
                            alt="{{ $product->name }}"
                        />
                    </div>
                    <div class="p-4 grid grid-cols-2">
                        <span>
                            <h3 class="text-lg font-semibold text-gray-800">{{ $product->title }}</h3>
                            <p class="text-gray-600">{{ $product->price }} RON</p>
                            <p class="text-gray-400 font-light">{{ $product->stock }} left</p>
                        </span>
                        <form
                            method="POST"
                            action="{{ route("cart.store", [
                                "product_id" => $product->id,
                                "quantity" => 1
                            ]) }}"
                            class="self-center justify-self-end"
                        >
                            @csrf
                            <x-primary-button>Add</x-primary-button>
                        </form>
                    </div>
                </div>
            @endforeach
    </div>
@endsection
