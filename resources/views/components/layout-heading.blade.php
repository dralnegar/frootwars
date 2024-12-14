<!-- Header -->

    <div id="header-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <header id="header">
                        <h1><a href="/"><img src="{{ asset('storage/007.jpg') }}" alt="Tamworth Liberators Gaming Club" style="max-width:100px;padding:10px;"></h1>
                        <nav id="nav">
                            <a href="/" class="current-page-item">Homepage</a>
                            <!--
                            <a href="twocolumn1.html">Two Column #1</a>
                            <a href="twocolumn2.html">Two Column #2</a>
                            <a href="onecolumn.html">One Column</a>
                            <a href="threecolumn.html">Three Column</a>
                            <li> <a class="page" href="about.html">About</a> </li>
                            <li> <a class="page" href="services.html">Services</a> </li>
                            <li> <a class="page" href="portfolio.html">Work</a> </li>
                            <li class="last "> <a class="page selected" href="contact.html">Contact</a> </li>
                
                
                            -->
                            @auth
                            <a href="/admin/dashboard">Welcome {{ auth()->user()->name }}</a>
                            <a id="logout" href="#">Logout</a>
                            <form id="logout-form" method="POST" action="/logout" class="hidden">
                                @csrf
                            </form>
                        @else
                            <a href="/register">Register</a>
                            <a href="/login">Log In</a>
                            <a href="#newsletter">Subscribe for Updates</a>
                        @endauth
                    </ul>
                        </nav>
                    </header>

                </div>
            </div>
        </div>
    </div>


