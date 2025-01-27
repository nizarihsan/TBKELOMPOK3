@extends('user.layout.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Dasbor</h1>
        <p>Selamat datang, {{ $user->name }}!</p>
        <!-- Dashboard Content -->
    </div>

    <!-- ====== Blog Section Start -->
    <section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20 bg-white dark:bg-dark">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-center -mx-4">
                <div class="w-full px-4">
                    <div class="mx-auto mb-[60px] max-w-[510px] text-center lg:mb-20">
                        <span class="block mb-2 text-lg font-semibold text-primary">
                            Blog Kami
                        </span>
                        <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[40px] dark:text-white">
                            Berita Terbaru Kami
                        </h2>
                        <p class="text-base text-body-color dark:text-dark-6">
                            Ini adalah teks placeholder yang dapat diganti dengan konten relevan dalam bahasa Indonesia.
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap -mx-4">
                <!-- Blog Item 1 -->
                <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                    <div class="w-full mb-10">
                        <div class="mb-8 overflow-hidden rounded">
                            <img
                                src="https://cdn.tailgrids.com/2.0/image/application/images/blogs/blog-01/image-01.jpg"
                                alt="image"
                                class="w-full" />
                        </div>
                        <div>
                            <span class="inline-block px-4 py-1 mb-5 text-xs font-semibold leading-loose text-center text-white rounded bg-primary">
                                Dec 22, 2023
                            </span>
                            <h3>
                                <a
                                    href="javascript:void(0)"
                                    class="inline-block mb-4 text-xl font-semibold text-dark dark:text-white hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">
                                    Kenali AutoManage, alat manajemen AI terbaik
                                </a>
                            </h3>
                            <p class="text-base text-body-color dark:text-dark-6">
                                Lorem Ipsum adalah teks dummy dari industri percetakan dan pengetikan.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Blog Item 2 -->
                <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                    <div class="w-full mb-10">
                        <div class="mb-8 overflow-hidden rounded">
                            <img
                                src="https://cdn.tailgrids.com/2.0/image/application/images/blogs/blog-01/image-02.jpg"
                                alt="image"
                                class="w-full" />
                        </div>
                        <div>
                            <span class="inline-block px-4 py-1 mb-5 text-xs font-semibold leading-loose text-center text-white rounded bg-primary">
                                Mar 15, 2023
                            </span>
                            <h3>
                                <a
                                    href="javascript:void(0)"
                                    class="inline-block mb-4 text-xl font-semibold text-dark dark:text-white hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">
                                    Cara mendapatkan lebih banyak uang sebagai pelatih kebugaran
                                </a>
                            </h3>
                            <p class="text-base text-body-color dark:text-dark-6">
                                Lorem Ipsum adalah teks dummy dari industri percetakan dan pengetikan.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Blog Item 3 -->
                <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                    <div class="w-full mb-10">
                        <div class="mb-8 overflow-hidden rounded">
                            <img
                                src="https://cdn.tailgrids.com/2.0/image/application/images/blogs/blog-01/image-03.jpg"
                                alt="image"
                                class="w-full" />
                        </div>
                        <div>
                            <span class="inline-block px-4 py-1 mb-5 text-xs font-semibold leading-loose text-center text-white rounded bg-primary">
                                Jan 05, 2023
                            </span>
                            <h3>
                                <a
                                    href="javascript:void(0)"
                                    class="inline-block mb-4 text-xl font-semibold text-dark dark:text-white hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">
                                    Panduan mudah untuk upselling dan cross selling
                                </a>
                            </h3>
                            <p class="text-base text-body-color dark:text-dark-6">
                                Lorem Ipsum adalah teks dummy dari industri percetakan dan pengetikan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Blog Section End -->
@endsection
