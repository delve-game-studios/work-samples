@extends('app')

@section('title', 'АКТИВ - Вашият партньор в бизнеса')

@section('content')

    {{-- Intro text and slider--}}
    <section class="intro py-5">
        <div class="container">
            <div class="row align-items-center" id="gilde-slides-corousal">
                <div class="col-lg-5 order-1 order-lg-0 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-left">
                    <div class="order-2 order-lg-1">
                        <span class="green-line"></span>
                        <div class="glide-slides" id="glide-slides-content">
                            @foreach($quotes as $quote)
                                <div id="glide-slide-{{ $quote->id }}" {{ $loop->first ? '' : "class=d-none" }}>
                                    <p class="text-intro py-4 flex-lg-wrap-reverse">... {{ $quote->content }}</p>
                                    <p class="author">{{ $quote->author }}aaaa</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="order-1 order-lg-2 mb-5 mb-lg-0 mt-5 mt-lg-0 d-inline-flex">
                        <span class="icon icon--arrow-left">
                            <svg viewBox="0 0 16.5 31.1">
                                <use href="#shape-arrow"></use>
                            </svg>
                           </span>

                        <span class="icon icon--arrow-right ml-2">
                            <svg viewBox="0 0 16.5 31.1">
                                <use href="#shape-arrow"></use>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="col-lg-7 order-lg-1 order-0 d-flex">
                    <div class="glide">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides" id="glide-slides-images">
                                @foreach($quotes as $quote)
                                    <li class="glide__slide{{ $loop->first ? '--active' : '' }}" data-id="#glide-slide-{{ $quote->id }}"><img src="{{ $quote->image }}"></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Products --}}
    <section class="products my-lg-5">
        <div class="container">
            <div class="row my-lg-5">
                <div class="col">
                    <h1 class="pb-5 text-center text-lg-left">Нашите <br/> оферти и продукти</h1>
                </div>
            </div>

            @foreach($offerGroups as $offers)
            {{-- First Row Products --}}
            <div class="row mt-4 justify-content-between">
                {{-- Products 1 --}}
                @foreach($offers as $offer)
                    <div class="col-lg-5 mb-5">
                        <div class="d-flex flex-column justify-content-between">
                            <div class="img-container justify-content-center align-items-center">
                                <img src="https://picsum.photos/922/816" alt="product" class="rounded-img">
                                <div class="btn btn-success price text-white d-inline-flex align-items-center justify-content-center">
                                    {{ $offer->price }}лв
                                </div>
                            </div>
                            <div class="info px-0 px-md-4 mb-5">
                                <h2>{{ $offer->title }}</h2>
                                <p class="mt-4 mb-5">{{ $offer->content['partial'] }}</p>

                                <div class="row">
                                    <div class="col-6 text-center text-lg-left">
                                        <a href="{{ route('front.registration-card', $offer->id) }}"
                                            class="btn btn-outline-success text-uppercase d-inline-flex justify-content-between align-items-center">
                                            <span class="icon icon--order mr-2">
                                                 <svg viewBox="0 0 16 16">
                                                    <use href="#shape-order"></use>
                                                </svg>
                                            </span>
                                            Поръчай
                                        </a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <a href="{{ route('front.product-list', $offer->id) }}"
                                            class="btn btn-outline-success btn-outline-noicon text-uppercase">Повече</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endforeach
            {{-- End Third Row Products --}}
        </div>
    </section>
    {{-- End Section Products--}}
    {{-- Section Last News --}}
    <section class="py-lg-5">
        <div class="container">
            <div class="row my-5">
                <div class="col text-center text-lg-right">
                    <h1 class="">Последните новини</h1>
                </div>

            </div>
            {{-- One Row News --}}
            <div class="row">
                @foreach($news as $article)
                <div class="col-lg-4 py-5">
                    <div class="news-container">
                        <div class="news-image">
                            <img src="{{ $article->content['image'] }}" class="img-fluid" alt="">
                            <a href="{{ route('front.news-more') }}" class="news-image__view-more">Прочети още...</a>
                        </div>
                        <div class="text-container py-3">
                            <h5 class="pt-4 pb-1">{{ $article->title }}</h5>
                            <p>{{ $article->created_at }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row py-5 justify-content-center">
                <a href="{{ route('front.news') }}"
                   class="btn btn-outline-success text-uppercase d-inline-flex justify-content-between align-items-center">Виж
                    всички</a>
            </div>
        </div>
    </section>
    {{-- End News Section --}}
    {{-- Active express section--}}
    <section id="active-express" class="py-lg-5">
        <div class="container">
            <div class="row justify-content-center py-5">
                <div class="col-12 d-flex justify-content-center">
                    <h1>Актив Експерт Експрес</h1>
                </div>
                <div class="col-12">
                    <p class="text-center mt-3">Актив Експерт Експрес е улуга предоставаща възможност да задавате въпроси и да получавате бързи и компетентни отговори от нашия екип на посочен от Вас e-mail.</p>
                </div>
            </div>
            <div class="row justify-content-center">
                    <a href="{{ route('front.expert-express') }}" class="btn btn-success text-uppercase">Направи
                        запитване</a>
            </div>
        </div>
    </section>
    {{-- End Active express section--}}
    {{-- Why Active section --}}
    <section class="py-lg-5 why-active">
        <div class="container">
            <div class="row py-5">
                <div class="col-12 order-0 py-5">
                    <h1 class="pb-5 text-center text-lg-left">Защо да изберете Актив?</h1>
                </div>
                <div class="col-lg-6 d-flex justify-content-center flex-column order-lg-1 order-2">
                    <p>Уважаеми Дами и Господа,</p>
                    <p class="pt-3">Фирменото годишно специализирано икономическо издание "Национален годишник -
                        финаносови отчети" представя финансови отчети на предприятия от страната. Повече информация
                        относно начина, по който може да публикувате Вашите годишни финансови отчети в "Национален
                        годишник - финансови отчети" ще откриете тук. Освен публикуваната информация "Актив"
                        разполага и с пълна информационна база от публикуваните отчети от финансовата 1996г. до
                        2006г.<br>Издаването на "Национален годишник - финансови отчети" е логически продължено и
                        чрез Класации "Актив", в които показателите се извеждат на база информация, съдържаща се в
                        публикувани и одитирани годишни финансови отчети. Класацията съдържа в себе си позициониране
                        на "фирмите участници" по пет критерия, а именно: </p>
                </div>
                <div class="col-lg-6 order-lg-2 order-1 text-center text-lg-right">
                    <img src="/assets/front/img/lady.png" alt="lady">
                </div>
            </div>
        </div>
    </section>
    {{-- End Why Active section --}}

@endsection

@section('js')
    @parent
    <script type="text/javascript">
        $(function () {
            function showCurrentSlideContent() {
                var active = $('.glide__slide--active').data('id');
                $('#glide-slides-content div[id^="glide-slide-"]').attr('class', 'd-none');
                $(active).toggleClass('d-none');
            }

            window.glideSlider.on('run.after', showCurrentSlideContent);
        });
    </script>
@endsection
