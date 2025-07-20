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
            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Current Page"><button class="btn btn-primary shadow"data-bs-toggle="modal" data-bs-target="#xfilter_model">{{ $items->currentPage() }}</button></span>
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

@php
    $activeFilters = $activeFilters = request()->query();
@endphp
<div class="text-center mb-3">
    @foreach ($activeFilters as $field => $value)
        @if (!empty($value))
            <span class="badge text-bg-dark cursor-pointer" data-bs-toggle="modal" data-bs-target="#xfilter_model">{{ ucfirst($field) }}: {{ $value }}</span>
        @endif
    @endforeach
</div>

@if($items->total() < 1)
<div class="card shadow border-white rounded">
    <div class="card-body text-center">
        <p class="fs-5 fw-semibold my-3 text-primary">No records found</p>
        <p class="pb-2 text-light-emphasis">Try a different search or add new records</p>
    </div>
</div>
@endif



<div class="toast-container position-fixed bottom-0 start-50 translate-middle-x p-3"></div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<!-- <script src="{{asset('/js/swfoot-v1-0.js')}}?rand={{uniqid().rand()}}"></script> -->
<script src="{{asset('/js/custom-v1-0.js')}}"></script>
    <script>
        /* Custom JS. Finally we need to insert this in the js file */
        $(document).ready(function() {
            setTimeout(function() {
                $("#ldsloader").addClass("d-none");
                $("#ldscontent").removeClass("d-none");
                $("#ldsmenu").removeClass("d-none");
                $("#ldsfooter").removeClass("d-none");
            }, 1500);
        });
        function xfilter_submit()
        {
            const filterModel = document.querySelector('.xfilter_model');
            if (filterModel) {
                const fields = filterModel.querySelectorAll('.xfilter_field');
                let queryString = '';
                for (let i = 0; i < fields.length; i++) {
                    const field = fields[i];
                    if (field.value.trim() !== '') {
                        if(!(field.name=='sort' && field.value=='default')){
                            queryString += `&${field.name}=${encodeURIComponent(field.value.trim())}`;
                        }
                    }
                }
                if (queryString) {
                    queryString = '?' + queryString.slice(1);
                }
                const urlElement = filterModel.querySelector('.queryurl');
                const url = urlElement ? urlElement.value : '/';
                if (url) {
                    window.location.href = url + queryString;
                }
            }
        }
        function xfilter_reset() {
            event.preventDefault();
            const filterModel = document.querySelector('.xfilter_model');
            if (filterModel) {
                const fields = filterModel.querySelectorAll('.xfilter_field');
                for (let i = 0; i < fields.length; i++) {
                    fields[i].value = '';
                }
                var sortElement = filterModel.querySelector('[name="sort"]');
                if (sortElement) {
                    sortElement.selectedIndex = 0;
                }
                xfilter_submit();
            }
        }
        function xfilter_page(page) {
            if(document.getElementById("page"))
            {
                document.getElementById("page").value = page;
                xfilter_submit()
            }
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