// elements
const dashboardNavbarResponsiveToggleButton = document.getElementById("admin-navbar-responsive-toggle-button");
const dashboardNavbarPrimaryToggleButton = document.getElementById("admin-navbar-primary-toggle-button");
//const dashboardSidebar = document.querySelector('.primary-sidebar');
const dashboardSidebar = document.getElementById("layout-admin-left-sidebar");
const dashboardSidebarItemName = document.querySelectorAll('.sidebar-item-text');
const contentWrapper = document.querySelector('.wrapper');


// Event listener
dashboardNavbarResponsiveToggleButton.addEventListener('click', () => {       
    dashboardSidebar.classList.toggle('-translate-x-full');
});

dashboardNavbarPrimaryToggleButton.addEventListener('click', () => {
    dashboardSidebar.classList.toggle('md:-translate-x-0');
})

// mobileSidebarButtonOpenIcon.addEventListener('click', hide);
// // mobileSidebarButtonCloseIcon.addEventListener('click', hide);

// function hide(event){
//     var x = event.target;
//     handleDisplay(x);
//     setTimeout(() => {
//         handleDisplay(x);
//     }, 500);
// }

// function handleDisplay(target) {
//     if(target.style.display === "none"){
//         target.style.display = "block";
//         mobileSidebarButtonCloseIcon.style.display = "none";
//     } else {
//         target.style.display = "none";
//         mobileSidebarButtonCloseIcon.style.display = "block";
//     }
// }