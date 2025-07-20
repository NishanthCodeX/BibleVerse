<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete the record?");
    }
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
</script>
@stack('endjs')
