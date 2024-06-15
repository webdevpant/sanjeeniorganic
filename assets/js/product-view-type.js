/*--- PRODUCT VIEW TYPE CHANGE JS START ---*/
const gridViewBtn = document.querySelector(".grid-view");
const listViewBtn = document.querySelector(".list-view");
const productsRow = document.querySelector(".rv-inner-products-container .row");
const productsCols = document.querySelectorAll(".rv-inner-products-container .row .col");
const products = document.querySelectorAll(".rv-inner-products-container .rv-3-product");
// const productsContainer = document.querySelector(".rv-inner-products-container");

if (listViewBtn) {
    listViewBtn.onclick = () => {
        gridViewBtn.classList.remove("active");
        listViewBtn.classList.add("active");
        productsCols.forEach(productsCol => {
            productsCol.classList.add("list-view-on");
        });
    }
}

if (gridViewBtn) {
    gridViewBtn.onclick = () => {
        gridViewBtn.classList.add("active");
        listViewBtn.classList.remove("active");
        productsCols.forEach(productsCol => {
            productsCol.classList.remove("list-view-on");
        });
    }
}
/*--- PRODUCT VIEW TYPE CHANGE JS END ---*/