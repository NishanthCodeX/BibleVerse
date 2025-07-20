@if($items->total() > 0)
<div class="d-flex justify-content-between align-items-center mt-3">
    <div><small>{{ $items->count() }} of {{ $items->total() }} {{ $items->total() > 1 ? 'records' : 'record' }}</small></div>
    <div><small>{{ $items->currentPage() }} of {{ $items->lastPage() }} {{ $items->lastPage() > 1 ? 'pages' : 'page' }}</small></div>
</div>
@endif

@if ($items->currentPage() != 1 || $items->total() > $items->perPage())
<nav aria-label="Page navigation" class="pt-3">
    <ul class="pagination justify-content-center">
        <li class="page-item mx-1">
            <button class="btn btn-outline-primary border-light shadow{{ $items->currentPage() == 1 ? ' disabled' : '' }}" onclick="xfilter_page(1)" aria-label="First" data-bs-toggle="tooltip" data-bs-placement="top" title="Go to First Page">
                <i class="fas fa-angle-double-left"></i>
            </button>
        </li>
        <li class="page-item mx-1">
            <button class="btn btn-outline-primary border-light shadow{{ $items->currentPage() == 1 ? ' disabled' : '' }}" onclick="xfilter_page({{ $items->currentPage() - 1 }})" aria-label="Previous" data-bs-toggle="tooltip" data-bs-placement="top" title="Previous Page">
                <i class="fas fa-chevron-left"></i>
            </button>
        </li>
        <li class="page-item mx-1 active" aria-current="page">
            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Current Page">
                <button class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#xfilter_model">{{ $items->currentPage() }}</button>
            </span>
        </li>
        <li class="page-item mx-1">
            <button class="btn btn-outline-primary border-light shadow{{ $items->currentPage() == $items->lastPage() ? ' disabled' : '' }}" onclick="xfilter_page({{ $items->currentPage() + 1 }})" aria-label="Next" data-bs-toggle="tooltip" data-bs-placement="top" title="Next Page">
                <i class="fas fa-chevron-right"></i>
            </button>
        </li>
        <li class="page-item mx-1">
            <button class="btn btn-outline-primary border-light shadow{{ $items->currentPage() == $items->lastPage() ? ' disabled' : '' }}" onclick="xfilter_page({{ $items->lastPage() }})" aria-label="Last" data-bs-toggle="tooltip" data-bs-placement="top" title="Go to Last Page">
                <i class="fas fa-angle-double-right"></i>
            </button>
        </li>
    </ul>
</nav>
@endif

<div class="toast-container position-fixed bottom-0 start-50 translate-middle-x p-3"></div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/custom-v1-0.js') }}"></script>

<script>
    $(document).ready(function() {
        setTimeout(function() {
            $("#ldsloader").addClass("d-none");
            $("#ldscontent").removeClass("d-none");
            $("#ldsmenu").removeClass("d-none");
            $("#ldsfooter").removeClass("d-none");
        }, 1500);
    });

    // Function to handle pagination dynamically
    function xfilter_page(page) {
        // Get the current URL
        let currentUrl = new URL(window.location.href);
        
        // Update the page parameter in the URL
        currentUrl.searchParams.set('page', page);
        
        // Redirect to the new URL with the updated page parameter
        window.location.href = currentUrl.href;
    }

    function confirmDelete() {
        return confirm("Are you sure you want to delete the record?");
    }

    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
