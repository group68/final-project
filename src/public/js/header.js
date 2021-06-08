(function() {
    const navbar = document.getElementById("navbar");
    const navbarToggle = navbar.querySelector(".navbar-toggle");

    function openMobileNavbar() {
        navbar.classList.add("opened");
        navbarToggle.setAttribute("aria-label", "Close navigation menu.");
    }

    function closeMobileNavbar() {
        navbar.classList.remove("opened");
        navbarToggle.setAttribute("aria-label", "Open navigation menu.");
    }

    navbarToggle.addEventListener("click", () => {
        if (navbar.classList.contains("opened")) {
            closeMobileNavbar();
        } else {
            openMobileNavbar();
        }
    });

    const navbarMenu = navbar.querySelector(".navbar-menu");
    const navbarLinksContainer = navbar.querySelector(".navbar-links");

    navbarLinksContainer.addEventListener("click", (clickEvent) => {
        clickEvent.stopPropagation();
    });

    navbarMenu.addEventListener("click", closeMobileNavbar);

    // Prepare search cache    
    let searchCache = undefined;
    const localStorage = window.localStorage;

    const searchCacheText = localStorage.getItem('searchCache');
    if (searchCacheText) {
        searchCache = JSON.parse(searchCacheText);
        console.log('Cache loaded');
    } else {
        async function getProductList() {
            try {
                const result = await fetch('/api/products/getSearchData');
                const productList = await result.text();
                localStorage.setItem('searchCache', productList);

                searchCache = JSON.parse(productList);
            } catch (error) {
                console.log('Error fetching product list');
            }
        }

        // Fetch product list
        console.log('Fetching product list...');
        getProductList();
    }

    // Search box implementation
    function searchInList(q, list) {
        function escapeRegExp(s) {
            return s.replace(/[-/\\^$*+?.()|[\]{}]/g, "\\$&");
        }
        const words = q
            .split(/\s+/g)
            .map(s => s.trim())
            .filter(s => !!s);
        const hasTrailingSpace = q.endsWith(" ");
        const searchRegex = new RegExp(
            words
                .map((word, i) => {
                    if (i + 1 === words.length && !hasTrailingSpace) {
                        // The last word - ok with the word being "startswith"-like
    
                        return `(?=.*\\b${escapeRegExp(word)})`;
                    } else {
                        // Not the last word - expect the whole word exactly
                        return `(?=.*\\b${escapeRegExp(word)}\\b)`;
                    }
                })
                .join("") + ".+",
            "gi"
        );

        return list.filter(item => {
            return searchRegex.test(item.name);
        });
    }

    const searchBox = document.getElementById('search-input');
    let searchTimerId;
    searchBox.addEventListener('keyup', function handleSearchInput(e) {
        if (searchCache === undefined) {
            return;
        }
        
        clearTimeout(searchTimerId);
        searchTimerId = setTimeout(() => {
            if (!e.target.value) {
                return;
            }
            searchResult = searchInList(e.target.value, searchCache);
            console.log(searchResult);
        }, 200);

    });
})();