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
		this.$catalogList = this.$catalog.querySelector('.catalog-list');
		this.$pagination = this.$catalog.querySelector('.pagination');
		this.products = [];
		this.$loader = this.$catalog.querySelector('.loader');
		// Один из вариантов получения значения атрибутов
		// this.categoryId = this.$catalog.getAttribute('data-category-id');
		this.categoryId = this.$catalog.dataset.categoryId;

	}

	load(active = 1) {
		// Будет загружать данные по ajax
		// После загрузки будет вызывать метод render

		this.removeCatalogData();

		this.showLoader();

		const xhr = new XMLHttpRequest();
		xhr.open('GET', `/handlers/handler_catalog.php?category_id=${this.categoryId}&active=${active}`);
		xhr.send();

		xhr.addEventListener('load', () => {
			const response = JSON.parse(xhr.response);
			console.log(response);

			response.products.forEach((item) => {
				this.products.push(new Product(item.id, item.img_url, item.name, item.discription, item.price));
			});

			this.render();
			this.renderPagination(response.pagination);

		});

	}

	showLoader() {
		this.$loader.classList.add('show');
	}

	hideLoader() {
		this.$loader.classList.remove('show');
	}

	removeCatalogData() {
		this.products = [];
		this.$catalogList.innerHTML = '';
		this.$pagination.innerHTML = '';
	}

	renderPagination(pagination) {

		for (let i = 1; i <= pagination.count; i++) {
			let $paginationItem = document.createElement('div');
			$paginationItem.classList.add('page');
			$paginationItem.innerHTML = i;
			$paginationItem.dataset.page = i;

			if (i === pagination.active) {
				$paginationItem.classList.add('active');
			}

			this.$pagination.append($paginationItem);

			$paginationItem.addEventListener('click', (e) => {
				// Получили элемент, по которому кликнули
				const target = e.target;
				// Удаляем класс active у всех элементов
				this.$pagination.querySelectorAll('.page').forEach(item => {
					item.classList.remove('active');
				});
				// Добовляем класс active
				target.classList.add('active');
				// Вызываем загрузку каталога
				this.load(target.dataset.page);
			});
		}
	}


	render() {
		// Отрисовывает карточку товара

		this.products.forEach((item) => {
			this.$catalogList.append(item.getElement());
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