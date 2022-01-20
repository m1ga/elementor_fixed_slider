var intervalTime = document.querySelector('.image__slider').attributes["data-interval"].value || 4000;

function fadeIn(el, display) {
	if (el.style.opacity != 1) el.style.opacity = 0;
	el.style.display = display || "block";
	(function fade() {
		var val = parseFloat(el.style.opacity);
		if (!((val += .1) > 1)) {
			el.style.opacity = val;
			requestAnimationFrame(fade);
		}
	})();
};

function slide() {
	var currentObj = document.querySelectorAll(".image__slider__item")[1];
	fadeIn(currentObj);

	var oldObj = document.querySelectorAll(".image__slider__item")[0];
	setTimeout(function() {
		oldObj.style.opacity = 0;
		document.querySelector('.image__slider').appendChild(oldObj);
	}, 500);
}

setInterval(function() {
	slide();
}, intervalTime)
