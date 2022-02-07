var width = document.getElementById("slide").clientWidth;

var move = document.getElementsByClassName('move-slide')[0];
var img = move.getElementsByTagName('img');
var size = width * img.length;
size -= width;

var range = 0;
function next() {
    if (range < size) range += width;
    else range = 0;
    move.style.marginLeft = '-' + range + 'px';
}
function back() {
    if (range == 0) range = size;
    else range -= width;
    move.style.marginLeft = '-' + range + 'px';
}
setInterval(function() {
    next();
}, 5000);