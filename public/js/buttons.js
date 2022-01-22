let handleToggleButton = () => {
    const toggleButton = document.getElementById("admin-navbar-primary-toggle-button").classList, isOpened = "is-opened";
    let isOpen = toggleButton.contains(isOpened);
    if(isOpen){
        toggleButton.remove(isOpened);
    } else {
        toggleButton.add(isOpened);
    }
}

let handleResponsiveToggleButton = () => {
    const toggleButton = document.getElementById("admin-navbar-responsive-toggle-button").classList, isOpened = "is-opened";
    let isOpen = toggleButton.contains(isOpened);
    if(isOpen){
        toggleButton.remove(isOpened);
    } else {
        toggleButton.add(isOpened);
    }
}