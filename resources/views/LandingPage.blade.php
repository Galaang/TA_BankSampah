<!DOCTYPE html>
<html class="scroll-smooth" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIBAMA</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@500;600;700&display=swap">

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/script.js'])
</head>

<body class="bg-slate-100">
    {{-- header --}}
    <header class="absolute top-0 left-0 z-10 flex items-center w-full p-4 bg-transparent nav-fixed">
        <div class="container">
            <div class="relative flex items-center justify-between">
                <div>
                    <a href="#">
                        <img src="{{ Vite::asset('../../public/build/assets/sibama-8626e08f.png') }}" alt="Logo"
                            class="h-10">
                    </a>
                </div>
                <div>
                    <a href="/login" class="p-2 hover:underline">Login</a>
                    <a href="/register"
                        class="p-2 text-white bg-[#f34723] rounded-md hover:underline hover:bg-[#f34723] drop-shadow-md">Register</a>
                </div>
            </div>

        </div>

    </header>

    {{-- content --}}
    <section class="pt-24 pb-32">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto mb-5 text-center">
                    <h4 class="mb-2 text-3xl font-bold text-primary">Bank Sampah</h4>
                    <p class="text-lg font-medium text-slate-500">Bank sampah adalah sebuah lembaga atau tempat yang
                        melakukan kegiatan pengumpulan, pengolahan, dan pemanfaatan sampah sebagai barang yang memiliki
                        nilai ekonomi.</p>
                </div>
                <div class="flex items-center justify-center mb-5">
                    {{-- instagram --}}
                    <a href="https://www.instagram.com/banksampahdelima09?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                        target="_blank"
                        class="flex items-center w-32 mr-3 border rounded-full text-slate-600 h-9 border-slate-600 hover:text-slate-400 hover:border-black">
                        <svg role="img" viewBox="0 0 24 24" width="20" class="ml-3 mr-3 fill-current"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Instagram</title>
                            <path
                                d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                        </svg>
                        <p>Instagram</p>
                    </a>

                    {{-- whatsapp --}}
                    <a href="https://wa.me/+6285726247017" target="_blank"
                        class="flex items-center mr-3 bg-green-500 border rounded-full text-slate-100 w-44 h-9 border-slate-600 hover:text-slate-300 hover:border-black">
                        <svg class="ml-3 mr-3 fill-current" width="22" role="img" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>WhatsApp</title>
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                        </svg>
                        <p>Hubungi Nomor</p>
                    </a>
                </div>

                {{-- carousel --}}
                <div id="default-carousel" class="relative w-full mt-20 xl:ml-9 sm:ml-7 " data-carousel="static">
                    <!-- Carousel wrapper -->
                    <div class="relative overflow-hidden rounded-lg h-80 md:h-96">
                        <!-- Item 1 -->
                        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                            <img src="{{ Vite::asset('../../public/build/assets/1-6d6e6e11.jpg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                            <img src="{{ Vite::asset('../../public/build/assets/2-cc8a86b4.jpg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                            <img src="{{ Vite::asset('../../public/build/assets/3-e3f9d9e6.jpg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                            <img src="{{ Vite::asset('../../public/build/assets/4-f69ca304.jpg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 5 -->

                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                            data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                            data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                            data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                            data-carousel-slide-to="3"></button>
                        {{-- <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button> --}}
                    </div>
                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer start-0 group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer end-0 group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- footer --}}
    <footer class="pt-6 pb-12 pl-6 mx-auto border-t border-slate-200">
        <div class="container">
            <div class="flex flex-wrap ">
                <div class="w-full px-4 mb-12 md:w-1/2 ">
                    <h2 class="mb-5 text-4xl font-bold ">Bank Sampah Delima</h2>
                    <h3 class="mb-2 text-2xl font-bold">Hubungi Kami</h3>
                    <p>+6285726247017</p>
                    <p>Jalan Singkep no 12</p>
                    <p>Cilacap</p>
                </div>
                <div class="w-full px-4 mb-12 md:w-1/2 ">
                    <h3 class="mb-5 text-xl font-semibold ">Maps</h3>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d988.4585018258724!2d109.02403916950541!3d-7.70095577051006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6512c977a0cd3f%3A0x1f254e6134508fd4!2sCilacap%2C%20Rejamulya%2C%20Gunungsimping%2C%20Kec.%20Cilacap%20Tengah%2C%20Kabupaten%20Cilacap%2C%20Jawa%20Tengah%2053224!5e0!3m2!1sid!2sid!4v1711385252757!5m2!1sid!2sid"
                        width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <div class="w-full pt-10 border-t border-slate-200">
                <div class="flex items-center justify-center mb-5">
                    <p class="text-sm font-medium text-center text-slate-500">Dibuat oleh Galang Wijonarko</p>
                </div>
            </div>
    </footer>

    {{-- back to top --}}
    <a href="#" id="arrow" aria-label="arrow"
        class="fixed items-center justify-center p-4 border border-black rounded-full z-[9999] bottom-4 right-4 h-14 w-14 hover:animate-pulse hidden">
        <span class="block w-5 h-5 mt-2 rotate-45 border-t-2 border-l-2 border-black"></span>
    </a>
    {{-- back to top --}}
    </div>
</body>

</html>
