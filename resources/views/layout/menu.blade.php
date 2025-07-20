    <nav class="navbar navbar-expand-none shadow bg-primary" style="z-index:100">
        <div class="container-fluid" style="flex-wrap:initial">
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false"
                    aria-label="Toggle navigation" style="border:none; outline:none; padding-left:10px; padding-right:20px">
                    <i class="fa-solid fa-bars text-light fs-4"></i>
                </button>
            </div>
            <div>
                <a class="navbar-brand text-light fw-bold fs-4" href="/">
                    <img src="/images/logo.png" class="img-fluid" style="max-height:40px; max-width:100%">
                    BibleVerse
                </a>
            </div>
            <div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white fw-semibold" aria-current="page" 
                            @auth 
                            href="{{ route('admin') }}" 
                            @else 
                            href="{{ route('admin.login') }}" 
                            @endif>
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-circle-user me-2"></i>
                                <span class="d-none d-sm-inline d-lg-inline text-white mb-1">@auth Profile @else Login @endif</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
