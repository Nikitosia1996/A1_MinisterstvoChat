$(document).ready(function() {
    // все организации
    showData(0);
});

function showData(value) {
    console.log(value + " value");
    //  загрузка данных
    $.ajax({
        url: "ajax/get_org_list.php",
        type: "GET",
        data: {oblast: value},
        success: function (response) {
            let orgList = document.getElementById("org-list");
            orgList.innerHTML = "";
            let orgData = JSON.parse(response);
            let currentPage = 1;
            let itemsPerPage = 5;
            let totalPages = Math.ceil(orgData.length / itemsPerPage);

            // текущая страница
            function displayItems(page) {
                let startIndex = (page - 1) * itemsPerPage;
                let endIndex = Math.min(startIndex + itemsPerPage, orgData.length);
                let displayedItems = orgData.slice(startIndex, endIndex);
                orgList.innerHTML = "";
                displayedItems.forEach(function (org) {
                    let orgItem = document.createElement("div");
                    orgItem.className = "org-item";
                    orgItem.innerHTML = "<strong>ID:</strong> " + org.id_a1_all_organisation +
                        "<br><strong>Название:</strong> " + org.name +
                        "<br><strong>Область:</strong> " + org.oblast;
                    orgList.appendChild(orgItem);
                });
            }

            //  пагинация
            function createPagination() {
                let pagination = document.getElementById("pagination");
                pagination.innerHTML = "";

                for (let i = 1; i <= totalPages; i++) {
                    if (i <= Math.ceil(orgData.length / itemsPerPage)) {
                        let li = document.createElement("li");
                        let a = document.createElement("a");
                        a.href = "#";
                        a.textContent = i;

                        if (i === currentPage) {
                            a.className = "active";
                        }

                        a.onclick = function () {
                            currentPage = parseInt(this.textContent);
                            displayItems(currentPage);

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

            displayItems(currentPage);
            createPagination();
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}