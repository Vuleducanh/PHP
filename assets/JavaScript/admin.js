
const openMenu = document.querySelector('.fa-bars')
const openContrainer = document.querySelector('.container-list-product')
const addOpen = document.querySelector('.tab-list-product')

function showMenu() {
	if (addOpen.classList.contains('open')) {
		addOpen.classList.remove('open')
		openContrainer.classList.remove('open')
	} else {
		addOpen.classList.add('open')
		openContrainer.classList.add('open');
	}
}
openMenu.addEventListener('click', showMenu)
openContrainer.addEventListener('click', showMenu)

