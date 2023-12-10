const radioAll = document.querySelectorAll('.main__radio');

radioAll.forEach(radio => {
	radio.addEventListener('change', () => {
		// Очистка звездочек
		for(let i = 0; i < radioAll.length; i++) {
			document.querySelector(`.star-icon${i+1}`).style.fill = "white";
		}

		// Заполнение звездочек
		for(let i = 0; i < radio.value; i++) {
			document.querySelector(`.star-icon${i+1}`).style.fill = "yellow";
		}
	});
})