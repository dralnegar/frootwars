<!DOCTYPE HTML>
<html>
	<head>
		<title>{{ $pageTitle ?? '' }} - Liberators Gaming Club</title>
		<meta name="author" content="Liberators Gaming Club" />
        <meta name="keywords" content="tamworth, liberators, gaming, club, warhammer, magic" />
        <meta name="description" 
            content="Tamworth Liberators Gaming Club - Based at the Pip Club (Drayton Manor Cricket and Social Club), we have bi-weekly meetings on Tuesday and Thursday playing a variety of games including Warhammer, Magic the Gathering, and many more."   " 
        />
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/assets/css/main.css" />

               
        <!--Fav and touch icons-->
        <link rel="shortcut icon" href="/img/icons/favicon.ico">
        <link rel="apple-touch-icon" href="/img/icons/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/img/icons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/img/icons/apple-touch-icon-114x114.png">

        <!--style sheet-->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <!--jquery libraries / others are at the bottom-->
        <script src="/js/jquery-1.7.1.min.js" type="text/javascript"></script>
        <script src="/js/modernizr.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>


    <body>
        <div id="page-wrapper">
        
   
        <x-layout-heading />

        {{ $content }}

    



        @if (!Auth::check())
        <div id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf

                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>
                            <div> 
                                <input 
                                    id="email" 
                                    name="email"
                                    type="email" 
                                    placeholder="Your email address"
                                    class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                                @error('email')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endif

        <x-flash />
        <!-- Footer -->
        <div id="footer-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-8 col-12-medium">

                        <section>
                            <h2>How about a truckload of links?</h2>
                            <div>
                                <div class="row">
                                    <div class="col-3 col-6-medium col-12-small">
                                        <ul class="link-list">
                                            <li><a href="#">Sed neque nisi consequat</a></li>
                                            <li><a href="#">Dapibus sed mattis blandit</a></li>
                                            <li><a href="#">Quis accumsan lorem</a></li>
                                            <li><a href="#">Suspendisse varius ipsum</a></li>
                                            <li><a href="#">Eget et amet consequat</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-3 col-6-medium col-12-small">
                                        <ul class="link-list">
                                            <li><a href="#">Quis accumsan lorem</a></li>
                                            <li><a href="#">Sed neque nisi consequat</a></li>
                                            <li><a href="#">Eget et amet consequat</a></li>
                                            <li><a href="#">Dapibus sed mattis blandit</a></li>
                                            <li><a href="#">Vitae magna sed dolore</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-3 col-6-medium col-12-small">
                                        <ul class="link-list">
                                            <li><a href="#">Sed neque nisi consequat</a></li>
                                            <li><a href="#">Dapibus sed mattis blandit</a></li>
                                            <li><a href="#">Quis accumsan lorem</a></li>
                                            <li><a href="#">Suspendisse varius ipsum</a></li>
                                            <li><a href="#">Eget et amet consequat</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-3 col-6-medium col-12-small">
                                        <ul class="link-list">
                                            <li><a href="#">Quis accumsan lorem</a></li>
                                            <li><a href="#">Sed neque nisi consequat</a></li>
                                            <li><a href="#">Eget et amet consequat</a></li>
                                            <li><a href="#">Dapibus sed mattis blandit</a></li>
                                            <li><a href="#">Vitae magna sed dolore</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                    <div class="col-4 col-12-medium">

                        <section>
                            <h2>Something of interest</h2>
                            <p>Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed.
                            Suspendisse eu varius nibh. Suspendisse vitae magna eget odio amet
                            mollis justo facilisis quis. Sed sagittis mauris amet tellus gravida
                            lorem ipsum dolor sit blandit.</p>
                            <footer class="controls">
                                <a href="#" class="button">Oh, please continue ....</a>
                            </footer>
                        </section>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">

                        <div id="copyright">
                            &copy; Untitled. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

<!-- Scripts -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/browser.min.js"></script>
    <script src="/assets/js/breakpoints.min.js"></script>
    <script src="/assets/js/util.js"></script>
    <script src="/assets/js/main.js"></script>

</body>
</html>
