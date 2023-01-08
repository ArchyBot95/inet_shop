/**
 * 
 * 	 2 класса
 * 	 Catalog - будет заниматься задачами упралвления
 * 	 Product - будет отрисовывать карточку товара в каталог
 * 
 */


class Catalog {
	constructor() {
		this.$catalog = document.querySelector('.catalog');
		this.products = [];
		this.$loader = this.$catalog.querySelector('.loader');
	}

	load() {
		// Будет загружать данные по ajax
		// После загрузки будет вызывать метод render

		this.showLoader();

		const xhr = new XMLHttpRequest();
		xhr.open('GET', '/handlers/handler_catalog.php');
		xhr.send();

		xhr.addEventListener('load', () => {
			const response = JSON.parse(xhr.response);
			console.log(response);

			response.forEach((item) => {
				this.products.push(new Product(item.id, item.img_url, item.name, item.discription, item.price));
			});

			this.render();

		});

	}

	showLoader() {
		this.$loader.classList.add('show');
	}

	hideLoader() {
		this.$loader.classList.remove('show');
	}

	render() {
		// Отрисовывает карточку товара
		const $catologList = this.$catalog.querySelector('.catalog-list');

		this.products.forEach((item) => {
			$catologList.append(item.getElement());
		});

		this.hideLoader();
	}
}

class Product {
	constructor(id, img_url, name, discription, price) {
		this.id = id;
		this.img_url = img_url;
		this.name = name;
		this.discription = discription;
		this.price = price;
	}

	getElement() {
		let $catalogItem = document.createElement('a');
		$catalogItem.href = `/product.php?id=${this.id}`;
		$catalogItem.classList.add('catalog-item');
		$catalogItem.innerHTML = `
			<div class="catalog-item_img" style="background-image: url(${this.img_url})"></div>
			<div class="catalog-item_name">${this.name}</div>
			<div class="catalog-item_price">${this.price} руб.</div>
		`;

		return $catalogItem;

	}
}

const catalog = new Catalog();
catalog.load();