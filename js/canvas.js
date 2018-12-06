// JavaScript Document
//console.log('r/place');

var canvas = document.querySelector('canvas');
console.log(canvas);
canvas.width = window.innerWidth; //setting canvas height to whole screen
canvas.height = window.innerHeight; //setting canvas height to whole screen
var c = canvas.getContext('2d');
//c.fillStyle = "rgba(255,0,0,0.5)"; //fills next rectange to specific color
//c.fillRect(100, 100, 100, 100); //creating rectangle
//c.fillStyle = "rgba(0,255,0,0.5)";
//c.fillRect(400, 100, 100, 100);
//c.fillStyle = "rgba(0,0,255,0.5)";
//c.fillRect(300, 300, 100, 100);
//
////line drawings
//c.beginPath();
//c.moveTo(50, 300);
//c.lineTo(300, 100);
//c.lineTo(400, 300);
//c.strokeStyle = "#fa2133";
//c.stroke();
//
//
////arc/circle
//c.beginPath(); //seperates from previous drawings
//c.arc(300, 300, 30, 0, Math.PI * 2, false);
//c.strokeStyle = "green";
//c.stroke();
//
//for (var i = 1; i < 4000; i++) {
//	var x = Math.random() * window.innerWidth;
//	var y = Math.random() * window.innerHeight;
//	c.beginPath(); //seperates from previous drawings
//	c.arc(x, y, 30, 0, Math.PI * 2, false);
//	c.strokeStyle = "green";
//	c.stroke();
//}

var mouse = {
	x: undefined,
	y: undefined
}

var maxRadius = Math.floor(Math.random() * 80) + 40;
var minRadius = Math.floor(Math.random() * 5) + 2;

var colorArray = [
	'#2b5865',
	'#8fbdc2',
	'#f0ede8',
	'#ffa700',
	'#e57601'
];

window.addEventListener('mousemove', function (event) {
	mouse.x = event.x;
	mouse.y = event.y;
})

window.addEventListener('resize', function () {
	canvas.width = window.innerWidth; //setting canvas height to whole screen
	canvas.height = window.innerHeight; //setting canvas height to whole screen
	init();
})

function Circles(x, y, dx, dy, r, color, strokeColor) {
	this.x = x;
	this.y = y;
	this.dx = dx;
	this.dy = dy;
	this.radius = r;
	this.color = colorArray[Math.floor(Math.random() * colorArray.length)];
	this.strokeColor = strokeColor;


	this.draw = function () {
		//console.log('Circles');
		c.beginPath(); //seperates from previous drawings
		c.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
		c.fillStyle = this.color;
		c.strokeStyle = strokeColor;
		c.fill();
	}
	this.update = function () {
		if (this.x + this.radius > innerWidth || this.x - this.radius < 0) {
			this.dx = -this.dx;
		}

		if (this.y + this.radius > innerHeight || this.y - this.radius < 0) {
			this.dy = -this.dy;
		}
		this.x += this.dx;
		this.y += this.dy;

		if ((mouse.x - this.x < 50 && mouse.x - this.x > -50) && (
				mouse.y - this.y < 50 && mouse.y - this.y > -50
			)) {
			if (this.radius < maxRadius) {
				this.radius += 1;
			}
		} else if (this.radius > minRadius) {
			this.radius -= 1;
		}

		this.draw();
	}
}

//circle.draw();



function getRandomColor() {
	var letters = '0123456789ABCDEF';
	var color = '#';
	for (var i = 0; i < 6; i++) {
		color += letters[Math.floor(Math.random() * 16)];
	}
	return color;
}

var circleArray = [];

function init() {
	circleArray = [];
	for (var i = 0; i < 1000; i++) {
		var radius = Math.floor(Math.random() * maxRadius) + minRadius;
		var x = Math.random() * (innerWidth - radius * 2) + radius;
		var y = Math.random() * (innerHeight - radius * 2) + radius;
		var dx = (Math.random() - 0.5) * 8;
		var dy = (Math.random() - 0.5) * 8;
		var a = Math.floor(Math.random() * 9) + 1;
		circleArray.push(new Circles(x, y, dx, dx, radius, getRandomColor(), getRandomColor()));
	}
}

function animate() {
	requestAnimationFrame(animate);
	c.clearRect(0, 0, innerWidth, innerHeight);
	for (var i = 0; i < circleArray.length; i++) {
		circleArray[i].update();
	}
}

init();
animate();

//document.body.style.background = 'url('+canvas.toDataURL()+')';
