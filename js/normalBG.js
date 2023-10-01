var cnv;
var midsvg, sadsvg, happysvg;
function preload() {
    midsvg = loadImage('images/midIcon.svg');
    sadsvg = loadImage('images/sadIcon.svg');
    happysvg = loadImage('images/happyIcon.svg');

    midsvgColored = loadImage('images/midIconColored.svg');
    sadsvgColored = loadImage('images/sadIconColored.svg');
    happysvgColored = loadImage('images/happyIconColored.svg');
}

function setup() {
    cnv = createCanvas(windowWidth, windowHeight);

    cnv.parent('body');
    cnv.style("z-index: -1");
    pixelDensity(3.0);
}

function draw() {


    background(255);
    for (ih = 0; ih < 10; ih++) {
        hDecal = 0;
        var imgnum = null;
        var colored = false;
        var img = null;
        if (ih % 2 == 1) {
            hDecal = 6;
        }
        for (iw = 0; iw < 10; iw++) {
            fill(234);
            imgnum = Math.floor(Math.random() * 43);
            if (imgnum < 10) {
                img = sadsvg;

            } else if (imgnum < 24) {
                img = midsvg;

            } else {
                img = happysvg;

            }

            image(img, vw(0 - 2.5 + (iw * 12) + hDecal), vh(0 - 4.9 + (ih * 11)), vw(5), vw(5));
        }

    }
    noLoop()
}



function windowResized() {
    resizeCanvas(windowWidth, windowHeight);
    cnv.position(0, 0);
}


function vw(val) {
    return windowWidth * (val / 100);
}

function vh(val) {
    return windowHeight * (val / 100);
}
