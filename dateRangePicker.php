$(function() {
				
		var date = new Date(), y = date.getFullYear(), m = date.getMonth();
		var firstDayOfCurrentMonth = new Date(y, m, 1);
		var lastDayOfCurrentMonth = new Date(y, m + 1, 0);
		firstDayOfCurrentMonth = moment(firstDayOfCurrentMonth).format('YYYY-MM-DD');
		lastDayOfCurrentMonth = moment(lastDayOfCurrentMonth).format('YYYY-MM-DD');
		
		$('input[name="daterange"]').daterangepicker({
			"ranges": {
				"Hoy": [
					new Date(),
					new Date(),
				],
				"Mes actual": [
					firstDayOfCurrentMonth,
					lastDayOfCurrentMonth
				],
				"Últimos 7 días": [
					moment().subtract('days', 7), moment(),
					new Date(),
				],
				"Últimos 30 días": [
					moment().subtract('months', 1), moment(),
					new Date(),
				],
				"Último año": [
					moment().subtract('years', 1), moment(),
					new Date(),
				],
			},
			"alwaysShowCalendars": false,
			"startDate": firstDayOfCurrentMonth,
			"endDate": lastDayOfCurrentMonth,
			"opens": "left",

			locale: {
				format: 'YYYY-MM-DD'
			},
		});
	});