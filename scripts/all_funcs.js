function showData(value) {
    console.log(value + " value");
    //  загрузка данных
    $.ajax({
        url: "ajax/get_org_list.php",
        type: "GET",
        data: {oblast: value, search: document.getElementById("search-input").value},
        success: function (response) {
            let orgList = document.getElementById("org-list");
            orgList.innerHTML = "";
            let orgData = JSON.parse(response);
            let currentPage = 1;
            let itemsPerPage = 3;
            let totalPages = Math.ceil(orgData.length / itemsPerPage);
            // текущая страница
            function displayItems(page, data) {
                let startIndex = (page - 1) * itemsPerPage;
                let endIndex = Math.min(startIndex + itemsPerPage, data.length);
                let displayedItems = data.slice(startIndex, endIndex);
                orgList.innerHTML = "";
                displayedItems.forEach(function (org) {
                    let orgItem = document.createElement("div");
                    orgItem.className = "org-item";
                    orgItem.innerHTML = "<strong>#</strong> " + org.id_a1_all_organisation +
                        "<hr><strong>Наименование:</strong> " + org.name +
                        "<br><strong>Область:</strong> " + org.oblast;
                    orgList.appendChild(orgItem);
                });
            }
            displayItems(currentPage, orgData);
            //  пагинация
            function createPagination(data) {
                let pagination = document.getElementById("pagination");
                pagination.innerHTML = "";
                for (let i = 1; i <= totalPages; i++) {
                    if (i <= Math.ceil(data.length / itemsPerPage)) {
                        let li = document.createElement("li");
                        let a = document.createElement("a");
                        a.href = "#";
                        a.textContent = i;
                        if (i === currentPage) {
                            a.className = "active";
                        }
                        a.onclick = function () {
                            currentPage = parseInt(this.textContent);
                            displayItems(currentPage, data);
                            let paginationLinks = document.querySelectorAll(".pagination li a");
                            paginationLinks.forEach(function (link) {
                                link.classList.remove("active");
                            });
                            this.classList.add("active");
                        };
                        li.appendChild(a);
                        pagination.appendChild(li);
                    }
                }
            }
            createPagination(orgData);
            // Поиск
            let searchInput = document.getElementById("search-input");
            searchInput.addEventListener("keyup", function() {
                let searchValue = this.value.trim().toLowerCase();
                let filteredData = orgData.filter(function(org) {
                    return org.name.toLowerCase().includes(searchValue);
                });
                displayItems(currentPage, filteredData);
                createPagination(filteredData);
            });
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

$(document).ready(function() {
    // все организации
    showData(0);
});