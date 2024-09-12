<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sketch Landing</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-hp">
        <!-- ===== INTRO ====== -->
        <section class="intro">
            <!-- ===== NAVBAR ====== -->
            <nav class="navbar" id="navbar">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('media/logo.png') }}" alt="logo">
                    </a>
                </div>
                <button class="menu-toggle" id="menu-toggle">
                    <i class="fa-solid fa-bars"></i>
                    <i class="fa-solid fa-x"></i>
                </button>
                <ul class="nav-links" id="nav-links">
                    <li class="nav-link" id="nav-link">
                        <a href="#product">Product</a>
                    </li>
                    <li class="nav-link" id="nav-link">
                        <a href="#customers">Customers</a>
                    </li>
                    <li class="nav-link" id="nav-link">
                        <a href="#contact">Pricing</a>
                    </li>
                    <li class="nav-link" id="nav-link">
                        <a href="#resources">Resources</a>
                    </li>
                    @if(auth()->check())
                        <li class="nav-buttons" id="nav-link">
                            <button data-dropdown class="flex items-center px-3 py-2 focus:outline-none hover:bg-gray-200 hover:rounded-md" type="button" x-data="{ open: false }" @click="open = !open" :class="{ 'bg-gray-200 rounded-md': open }">
                                <span class="ml-4 text-sm hidden md:inline-block">Hi, {{ Auth::user()->name }}</span>
                                <svg class="fill-current w-3 ml-4" viewBox="0 0 407.437 407.437">
                                    <path d="M386.258 91.567l-182.54 181.945L21.179 91.567 0 112.815 203.718 315.87l203.719-203.055z" />
                                </svg>
                                <div data-dropdown-items class="text-sm text-left absolute top-0 right-0 mt-16 mr-4 bg-white rounded border border-gray-400 shadow" x-show="open" @click.away="open = false">
                                    <ul>
                                        <li class="px-4 py-3 border-b hover:bg-gray-200"><a href="{{ route('profile') }}">My Profile</a></li>
                                        <li class="px-4 py-3 hover:bg-gray-200"><a href="{{ route('logout') }}">Log out</a></li>
                                    </ul>
                                </div>
                            </button>
                        </li>
                    @else
                        <li class="nav-buttons" id="nav-link">
                            <a href="{{ route('login') }}" id="sign-in" class="btn">Sign In</a>
                            <a href="{{ route('register') }}" id="sign-up" class="btn">Sign Up</a>
                        </li>
                    @endif
                </ul>
            </nav>
            <!-- ===== HERO ====== -->
            <div class="hero section">
                <div class="left-side side">
                    <h2 class="title">
                        The Design Thinking <br> superpowers
                    </h2>
                    <p class="paragraph">
                        Tools, tutorials, design and innovation experts, all in one place! <br> The most intuitive way to imagine your next user experience.
                    </p>
                    <div class="hero-buttons">
                        <a href="#start" id="start" class="btn">Get Started</a>
                        <a href="#watch" id="watch" style="display: flex; align-items: center;">
                            <img src="{{ asset('media/play.png') }}" alt="">
                            <span style="color: #FF9900; margin-left: 10px; font-weight: bold;">Watch the Video</span>
                        </a>
                    </div>
                </div>
                <div class="right-side side">
                    <img src="{{ asset('media/Pasted Graphic.png') }}" alt="">
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div id="videoModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <video id="videoPlayer" controls>
                    <source src="./media/Productivity.mp4" type="video/mp4">
                </video>
            </div>
        </div>

        <!-- ===== TOOLS ====== -->
        <section class="tools" id="customers">
            <div class="section">
                <h3 class="sub-title" style="text-align: center;">
                    We design tools to unveil your superpowers
                </h3>
                <div class="tools-services">
                    <div class="service">
                        <div class="icon icon-1">
                            <i class="fa-solid fa-computer-mouse"></i>
                        </div>
                        <p class="paragraph"><strong>First click tests</strong></p>
                        <p class="paragraph-2">While most people enjoy casino <br> gambling,</p>
                    </div>

                    <div class="service">
                        <div class="icon icon-2">
                            <i class="fa-solid fa-clipboard-list"></i>
                        </div>
                        <p class="paragraph"><strong>Design surveys</strong></p>
                        <p class="paragraph-2">Sports betting, lottery and bingo <br> playing for the fun</p>
                    </div>

                    <div class="service">
                        <div class="icon icon-3">
                            <i class="fa-solid fa-flask"></i>
                        </div>
                        <p class="paragraph"><strong>Preference tests</strong></p>
                        <p class="paragraph-2">The Myspace page defines the <br> individual</p>
                    </div>

                    <div class="service">
                        <div class="icon icon-4">
                            <i class="fa-solid fa-person"></i>
                        </div>
                        <p class="paragraph"><strong>Five second tests</strong></p>
                        <p class="paragraph-2">Personal choices and the overall <br> personality of the person</p>
                    </div>
                </div>
                <div class="btn-container">
                    <a href="{{ route('register') }}" class="btn">SIGN UP NOW</a>
                </div>
            </div>
        </section>

        <!-- ===== DESIGN PROFESSIONALS ====== -->
        <div class="img-right section design" id="product">
            <div class="side">
                <div class="text">
                    <p class="paragraph">Effortless Validation for</p>
                    <h3 class="sub-title">Design Professionals</h3>
                </div>
                <div class="text">
                    <p class="paragraph">The Myspace page defines the individual, his or her characteristics, traits, personal choices and the overall personality of the person.</p>
                </div>
                <div class="text">
                    <p class="paragraph" style="margin-bottom: 10px;"><strong>Accessory makers</strong></p>
                    <p class="paragraph">While most people enjoy casino gambling, sports betting, lottery and bingo playing for the fun</p>
                </div>
                <div class="text">
                    <p class="paragraph" style="margin-bottom: 10px;"><strong>Alterationists</strong></p>
                    <p class="paragraph">If you are looking for a new way to promote your business that won't cost you more money.</p>
                </div>
                <div class="text">
                    <p class="paragraph" style="margin-bottom: 10px;"><strong>Custom Design designers</strong></p>
                    <p class="paragraph">If you are looking for a new way to promote your business that won't cost you more money.</p>
                </div>
            </div>
            <div class="side">
                <img src="./media/Pasted Graphic 1.png" alt="">
            </div>
        </div>


        <!-- ===== PRODUCT MANAGERS ====== -->
        <div class="img-left section">
            <div class="side">
                <img src="./media/Pasted Graphic 2.png" alt="">
            </div>
            <div class="side">
                <div class="text">
                    <p class="paragraph">Easier decision making for</p>
                    <h3 class="sub-title">Product Managers</h3>
                </div>
                <div class="text">
                    <p class="paragraph">The Myspace page defines the individual, his or her characteristics, traits, personal choices and the overall personality of the person.</p>
                </div>
                <div class="text">
                    <p class="paragraph"><img src="./media/check.png" alt=""> Accessory makers</p>
                    <p class="paragraph" style="margin: 30px 0;"><img src="./media/check.png" alt=""> While most people enjoy casino gambling, sports betting, lottery and bingo playing for the fun</p>
                    <p class="paragraph" style="margin: 30px 0;"><img src="./media/check.png" alt=""> While most people enjoy casino gambling, sports betting, lottery and bingo playing for the fun</p>
                </div>
            </div>
        </div>


        <!-- ===== MARKETERS ====== -->
        <div class="img-right section">
            <div class="side">
                <div class="text">
                    <p class="paragraph">Optimisation for</p>
                    <h3 class="sub-title">Marketers</h3>
                </div>
                <div class="text">
                    <p class="paragraph">Few would argue that, despite the advancements of feminism over the past three decades, women still face a double standard when it comes to their behavior.</p>
                </div>
                <div class="text">
                    <p class="paragraph" style="margin-bottom: 10px;"><strong>Accessory makers</strong></p>
                    <p class="paragraph">While most people enjoy casino gambling, sports betting, lottery and bingo playing for the fun</p>
                </div>
                <div class="text">
                    <p class="paragraph" style="margin-bottom: 10px;"><strong>Alterationists</strong></p>
                    <p class="paragraph">If you are looking for a new way to promote your business that won't cost you more money.</p>
                </div>
                <div class="text">
                    <p class="paragraph" style="margin-bottom: 10px;"><strong>Custom Design designers</strong></p>
                    <p class="paragraph">If you are looking for a new way to promote your business that won't cost you more money.</p>
                </div>
            </div>
            <div class="side">
                <img src="./media/Pasted Graphic 3.png" alt="">
            </div>
        </div>


        <!-- ===== CONTACT ====== -->
        <div class="contact" id="contact">
            <div class="cta">
                <h3 class="sub-title">Need a super hero</h3>
                <p class="paragraph">Do you require some help for your project: Conception workshop, <br>
                    prototyping, marketing strategy, landing page, Ux/UI?</p>
                <a href="#contact" class="btn" id="btn-contact-expert">Contact our expert</a>
            </div>
        </div>

        <div id="contactExpertModal" class="modal">
            <div class="modal-content">
                <span class="close" id="close-contact">&times;</span>
                <h3 class="sub-title">Contact an Expert</h3>
                <form id="contactExpertForm" method="POST" action="{{ route('contact.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div id="form-messages">
                        @if ($errors->any())
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="contact_name">Name:</label>
                        <input type="text" id="contact_name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_email">Email:</label>
                        <input type="email" id="contact_email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_phone">Phone Number:</label>
                        <input type="tel" id="contact_phone" name="phone" value="{{ old('phone') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_address">Address:</label>
                        <input type="text" id="contact_address" name="address" value="{{ old('address') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_zip">ZIP Code:</label>
                        <input type="text" id="contact_zip" name="zip" value="{{ old('zip') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_city">City:</label>
                        <input type="text" id="contact_city" name="city" value="{{ old('city') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_file">Attach a file:</label>
                        <input type="file" id="contact_file" name="file" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn">Contact Expert</button>
                    </div>
                </form>
            </div>
        </div>
        
         <!-- ===== EXPERTS ====== -->
         <div class="experts section">
            <div class="expert expert-1">
                <div class="paragraph-2 quote-reverse">I can take care of your pitch</div>
                <img src="./media/expert_1.png" alt="">
            </div>
            <div class="expert expert-2">    
                <div class="paragraph-2 quote-2">I will define the profile of your users</div>
                <img src="./media/expert_2.png" alt="">
            </div>
            <div class="expert expert-3">
                <div class="paragraph-2 quote">I can help marketing strategy</div>
                <img src="./media/expert_3.png" alt="">
            </div>
            <div class="expert expert-4">
                <div class="paragraph-2 quote">I can design you website</div>
                <img src="./media/expert_4.png" alt="">
            </div>
            <div class="expert expert-5">
                <div class="paragraph-2 quote">I can prototype your app</div>
                <img src="./media/expert_5.png" alt="">
            </div>
        </div>

        <div class="swiper2 mySwiper2">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="expert-mobile">
                    <div class="paragraph-2 quote-reverse">I can take care of your pitch</div>
                    <img src="./media/expert_1.png" alt="">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="expert-mobile">
                    <div class="paragraph-2 quote-2">I will define the profile of your users</div>
                    <img src="./media/expert_2.png" alt="">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="expert-mobile">
                    <div class="paragraph-2 quote">I can help marketing strategy</div>
                    <img src="./media/expert_3.png" alt="">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="expert-mobile">
                    <div class="paragraph-2 quote">I can design you website</div>
                    <img src="./media/expert_4.png" alt="">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="expert-mobile">
                    <div class="paragraph-2 quote">I can prototype your app</div>
                    <img src="./media/expert_5.png" alt="">
                </div>
              </div>
            </div>
            <div class="swiper-pagination-2"></div>
        </div>


        <!-- ===== MARKETING STRATEGIES ====== -->
        <div class="mkt-strategies section" id="resources">
            <h3 class="sub-title">Marketing Strategies</h3>
            <p class="paragraph">Join 40,000+ other marketers and get proven strategies on email marketing</p>
            
            <div class="swiper mySwiper desktop-mkt">
                <div class="swiper-wrapper">
                    @foreach($articles as $article)
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                @if($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                                @endif
                                <div class="p-4">
                                    <h2 class="text-xl font-semibold mb-2">{{ $article->title }}</h2>
                                    <p class="text-gray-600 mb-2">{{ Str::limit($article->intro, 100) }}</p>
                                    <p class="text-sm text-gray-500">Created on: {{ $article->created_at->format('d/m/Y') }}</p>
                                    <p class="text-sm text-gray-500">By: {{ $article->user ? $article->user->name : 'Unknown' }}</p>
                                    @if(auth()->check() && auth()->user()->type == 'admin')
                                        <a href="{{ route('admin/articles/show', $article->id) }}" class="mt-4 inline-block btn text-white font-bold py-2 px-4 rounded">
                                            Learn More
                                        </a>
                                    @else
                                        <a href="{{ route('articles.show', $article->id) }}" class="mt-4 inline-block btn text-white font-bold py-2 px-4 rounded">
                                            Learn More
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>


        <!-- ===== FOOTER ====== -->
        <footer class="footer section" id="footer">
            <div class="footer-links">
                <div class="logo-img">
                    <img src="./media/logo.png" alt="">
                </div>
                <div class="quick-links">
                    <p class="paragraph"><strong>Quick Links</strong></p>
                    <ul>
                        <li>
                            <a href="#about" class="paragraph-2">About Us</a>
                        </li>
                        <li>
                            <a href="#blog" class="paragraph-2">Blog</a>
                        </li>
                        <li>
                            <a href="#contact" class="paragraph-2">Contact</a>
                        </li>
                        <li>
                            <a href="#faq" class="paragraph-2">FAQ</a>
                        </li>
                    </ul>
                </div>
                <div class="legal-stuff">
                    <p class="paragraph"><strong>Legal Stuff</strong></p>
                    <ul>
                        <li>
                            <a href="#disclaimer" class="paragraph-2">Disclaimer</a>
                        </li>
                        <li>
                            <a href="#financing" class="paragraph-2">Financing</a>
                        </li>
                        <li>
                            <a href="#privacy" class="paragraph-2">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#tos" class="paragraph-2">Terms of Service</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-cta">
                    <p class="paragraph"><strong>Knowing you're always on the <br> best energy deal.</strong> 
                    </p>
                    <input type="text" placeholder="Enter your phone Number">
                    <br>
                    <br>
                    <a href="{{ route('register') }}" class="btn">Sign up Now</a>
                </div>
            </div>
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('main.js') }}"></script>
</body>
</html>