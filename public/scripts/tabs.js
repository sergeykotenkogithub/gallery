let tabs = document.querySelectorAll(".tabs__item")
let tabsItem = document.querySelectorAll(".tabs__block")

tabs.forEach(onTabClick);

function onTabClick(item) {
    item.addEventListener("click", () => {
        let currentBtn = item;
        let tabId = currentBtn.getAttribute("data-tab")
        let currentTab = document.querySelector(tabId);

        if(!currentBtn.classList.contains('active')) {
            tabs.forEach(function (item) {
                item.classList.remove('active')
            })
            tabsItem.forEach(function (item) {
                item.classList.remove('active')
            })
            currentBtn.classList.add('active')
            currentTab.classList.add('active')
        }
    })
}

document.querySelector(".tabs__item:nth-child(3)").click();