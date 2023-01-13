document.querySelector('.mailing').addEventListener('submit', function (e) {
	e.preventDefault();

	let value = document.querySelector('input[type="text"]').value;
	let name = document.querySelector('input[type="text"]').name;
	let param = `${name}=${value}`;


	let reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	let address = document.querySelector('input[type="text"]').value;
	if (reg.test(address) == false) {
		document.querySelector('.mailing-error').style.display = 'block';
		return false
	} else {
		document.querySelector('.mailing-error').style.display = 'none';
	}

	// let param = '';

	// for (let i = 0; this.elements.length > i; i++) {
	// 	param += `${this.elements[i].name}=${this.elements[i].value}&`
	// }

	console.log(param);

	const xhr = new XMLHttpRequest();
	xhr.open('GET', `/handlers/handler_mailing.php?${param}`);
	xhr.send();

	xhr.addEventListener('load', function () {
		console.log(xhr.responseText);
		let validate = document.querySelector('.mailing-validate');
		validate.style.display = 'block';
		validate.textContent = xhr.responseText;
		console.log(validate);
	});
});

