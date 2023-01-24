// const root = new Vue({
// 	el: '#root',
// 	data: {
// 		message: 'Привет, Vue!',
// 		user: 'Я Макеев Илья'
// 	}
// });

const game = new Vue({
	el: '#game',
	data: {
		result: 'Давай начинай',
		count: 0,
		seconds: 10,
		isStart: false,
		win: 0,
		intervalId: null

	},
	methods: {
		onClick() {
			this.count++;
		},
		startGame() {
			this.isStart = true;
			this.result = 'Игра началась';
			this.win = this.seconds * 3;

			this.intervalId = setInterval(() => {
				if (this.seconds === 0) {
					if (this.count >= this.win) {
						this.result = `Ураааа! Вы выиграли!!!  Вы кликнули больше чем ${this.win} раз`;
					} else {
						this.result = `Вы проиграли! Вам не удалось кликнусть хотя бы ${this.win} раз`;
					}

					// очищаем интервал
					clearInterval(this.intervalId);
				} else {
					this.seconds--;
				}
			}, 1000);
		},
		restartGame() {
			this.result = 'Давай начинай',
				this.count = 0,
				this.seconds = 10,
				this.isStart = false,

				// очищаем интервал
				clearInterval(this.intervalId);
		}
	}


});