var cnv;
var midsvg, sadsvg, happysvg;
function preload() {
    midsvg = loadImage('Js/midIcon.svg');
    sadsvg = loadImage('Js/sadIcon.svg');
    happysvg = loadImage('Js/happyIcon.svg');

    midsvgColored = loadImage('Js/midIconColored.svg');
    sadsvgColored = loadImage('Js/sadIconColored.svg');
    happysvgColored = loadImage('Js/happyIconColored.svg');
}

function setup() {
    if (document.getElementById('bgCanvas')) {
        cnv = createCanvas(windowWidth, windowHeight);

        cnv.parent('bgCanvas');
        pixelDensity(3.0);
    }
}

function draw() {
    noLoop()
    if (document.getElementById('bgCanvas')) {
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
                colored = false;
                if (Math.floor(Math.random() * 5) == 1) {
                    colored = true;
                }

                if (imgnum < 10) {
                    img = sadsvg;
                    if (colored) {
                        img = sadsvgColored;
                    }
                } else if (imgnum < 24) {
                    img = midsvg;
                    if (colored) {
                        img = midsvgColored;
                    }
                } else {
                    img = happysvg;
                    if (colored) {
                        img = happysvgColored;
                    }
                }

                image(img, vw(0 - 2.5 + (iw * 12) + hDecal), vh(0 - 4.9 + (ih * 11)), vw(5), vw(5));
            }

        }
    }

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
