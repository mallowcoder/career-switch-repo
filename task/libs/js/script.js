// $('#btnRun').click(function() {

// 	$.ajax({
// 		url: "libs/php/getCountryInfo.php",
// 		type: 'POST',
// 		dataType: 'json',
// 		data: {
// 			country: $('#selCountry').val(),
// 			lang: $('#selLanguage').val()
// 		},
// 		success: function(result) {

// 			console.log(JSON.stringify(result));

// 			if (result.status.name == "ok") {

// 				$('#txtContinent').html(result['data'][0]['continent']);
// 				$('#txtCapital').html(result['data'][0]['capital']);
// 				$('#txtLanguages').html(result['data'][0]['languages']);
// 				$('#txtPopulation').html(result['data'][0]['population']);
// 				$('#txtArea').html(result['data'][0]['areaInSqKm']);

// 			}
		
// 		},
// 		error: function(jqXHR, textStatus, errorThrown) {
// 			// your error code
// 		}
// 	}); 

// });

$(document).ready( function ()  {
$('#neighbourRun').click(() => {
	$.ajax({
		url: "libs/php/getNeighbours.php",
		type: 'POST',
		dataType: 'json',
		data: {
			country: $('#neighbourCountryCode').val()
		},
		success: function (result) {
			console.log(JSON.stringify(result));
			if (result.status.name == "ok") {
				let nbl = document.querySelector('#neighbourOutput')
				nbl.replaceChildren();
				for (res of result['data']) {
					let nb = document.createElement("li")
					nb.textContent = res['countryName']
					nbl.appendChild(nb)
				}
			}
		}
	})
})

$('#timezoneRun').click(function() {
	console.log("clicked timezone");
	$.ajax({
		url: "libs/php/timezone.php",
		type: 'POST',
		dataType: 'json',
		data: {
			lat: $('#timezoneLat').val(),
			lng:  $('#timezoneLng').val()
		},
		success: function(result) {
			console.log(JSON.stringify(result));
			$('#timezoneID').html(result['data']['timezoneID'])
			$('#gmtOffset').html(result['data']['gmtOffset'])
			$('#timezoneCountry').html(result['data']['countryName'])
		}
	})
})

$('#postalCodeRun').click(function() {
	console.log("run post code");
	console.log("country: "+ $('#postalCountryCode').val())
	console.log("code: "+ $('#postalCode').val())
	$.ajax({
		url: "libs/php/postalCodeLookup.php",
		type: 'POST',
		dataType: 'json',
		data: {
			country: $('#postalCountryCode').val(),
			postalCode: $('#postalCode').val()
		},
		success: function(result) {
			console.log(JSON.stringify(result));
			if (result.status.name == "ok") {
				let nbl = document.querySelector('#places')
				for (res of (result['data'])) {
					let nb = document.createElement("li")
					nb.textContent = res['placeName']
					nbl.appendChild(nb)
				}
			}
		}
	})
})
});


