<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header bg-primary position-relative">
        <a href="#" onclick="return false;" data-bs-dismiss="offcanvas" aria-label="Close"
           style="position: absolute; top: 10px; right: 15px;">
            <i class="fa-solid fa-circle-xmark text-white fs-4"></i>
        </a>
        <div class="text-white">
            <a href="{{ auth()->check() ? route('profile') : route('login') }}" class="text-light text-decoration-none fw-semibold">
                <div class="d-flex align-items-center py-3">
                    <i class="fa-solid fa-circle-user me-2 fs-3"></i>
                    <span class="offcanvas-title">
                        {{ auth()->check() ? 'My Profile' : 'Login' }}
                    </span>
                </div>
            </a>
        </div>

    </div>
    <div class="offcanvas-body align-items-center">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 fw-semibold ps-3">
            <li class="nav-item">
                <a class="nav-link active text-muted align-middle" aria-current="page" href="/"> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-muted" aria-current="page" href="/about"> About</a>
            </li>
            
        </ul>
    </div>
    <div class="offcanvas-footer bg-dark-subtle text-center mt-4 py-3">
        <img src="/images/logo.png" class="img-fluid" style="max-height:40px; max-width:100%">
        BibleVerse
        <br>
        <a href="https://yaabitech.com" style="font-size:0.7rem" target="_blank">Designed by Yaabitech</a>
    </div>
</div>

<script src="/js/jquery-3.7.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
@stack('endjs')
