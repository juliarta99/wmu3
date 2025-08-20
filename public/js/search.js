const searchInput = document.querySelector('input[name="search"]');
const btnSearch = document.getElementById('btn-search');

function toggleBtnSearch(value) {
    if (value.trim() !== '') {
        btnSearch.classList.remove('hidden');
        setTimeout(() => {
            btnSearch.classList.remove('opacity-0', 'scale-95');
            btnSearch.classList.add('opacity-100', 'scale-100');
        }, 10);
    } else {
        btnSearch.classList.remove('opacity-100', 'scale-100');
        btnSearch.classList.add('opacity-0', 'scale-95');
        setTimeout(() => {
            btnSearch.classList.add('hidden');
        }, 300);
    }
}

toggleBtnSearch(searchInput.value);

searchInput.addEventListener('input', function() {
    toggleBtnSearch(this.value);
});

searchInput.addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        this.closest('form').submit();
    }
});

btnSearch.addEventListener('click', function(e) {
    this.closest('form').submit();
})