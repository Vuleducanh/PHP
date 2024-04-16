const productContainer = document.querySelector('.product-list-container');
const productList = document.querySelector('#list_product');
const product = document.querySelectorAll('.product');
const prevButton = document.querySelector('.prev-button');
const nextButton = document.querySelector('.next-button');


let translateValue = 0;
const itemWidth = 290; // Width of each product item
const visibleItems = 5; // Number of visible items at a time
const totalItems = productList.children.length;

prevButton.addEventListener('click', () => {
	translateValue -= itemWidth;
	if (translateValue <= 0) translateValue = 0;
	console.log(translateValue)
	product.forEach(item => {
		item.style.transform = `translateX(${-translateValue}px)`;
	});
});

nextButton.addEventListener('click', () => {
	const containerWidth = productList.offsetWidth;               //  = 1200
	const totalWidth = itemWidth * totalItems;                    // chiều rộng tổng 10 sp = 2300
	const maxTranslateValue = totalWidth - containerWidth;    // chiều rộng dư thừa còn lại

	if (translateValue >= maxTranslateValue) {
		translateValue = 0;
	} else {
		translateValue += itemWidth;
	}

	product.forEach(item => {
		item.style.transform = `translateX(${-translateValue}px)`;
	});

});