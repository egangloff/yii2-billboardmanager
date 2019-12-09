/*
$(document).ready(function() {
    images = JSON.parse(images);
    $("body").vegas({
        delay: 5000,
        timer: false,
        shuffle: true,
        firstTransition: 'blur',
        firstTransitionDuration: 2000,
        transition: 'blur',
        transitionDuration: 2000,
        slides: images
    });
});
*/
contents = JSON.parse(contents);
var galleryarray = [];
var curimg = -1;
let time = 5000;


$.each(contents, function(i, item) {
    if(item.type == 'image'){
        var img = new Image();
        img.src = item.src;
        galleryarray.push(img);
    }
    else if(item.type ==  'video'){
        var movie = {
            src: item.src,
            type: "video",
            duration: item.duration
        };
        galleryarray.push(movie);
    }
});

function rotateimages(end) {
    curimg = (curimg < galleryarray.length - 1) ? curimg + 1 : 0
    if(end==1 && curimg == 0){
        window.location.reload()
    }
    if (galleryarray[curimg].type == "video") {
        $("#slideshow_vid").fadeOut("slow", function () {
            nextSlideshowElement()
        });
        $("#slideshow").fadeOut("slow", function () {
            nextSlideshowElement()
        });
        $("#slideshow").fadeOut("slow");
        $("#slideshow_vid").delay(600).fadeIn("slow");
        $("#slideshow_src").attr("src", galleryarray[curimg].src);
        $("#slideshow_vid")[0].load();
        $("#slideshow_vid").delay(600).get(0).play();
        time = galleryarray[curimg].duration;
    } else {
        $("#slideshow_vid").fadeOut("slow", function () {
            nextSlideshowElement()
        });
        $("#slideshow").fadeOut("slow", function () {
            nextSlideshowElement()
        });
        $("#slideshow").delay(600).fadeIn("slow");
        $("#slideshow_vid").fadeOut("slow");
        $("#slideshow_vid").get(0).pause();
        time = 5000;
    }
    setTimeout(function() { rotateimages(1); }, time);
}

function nextSlideshowElement() {
    if (galleryarray[curimg].type != "video")
        document.getElementById("slideshow").setAttribute("src", galleryarray[curimg].src)
}

window.onload = function () {
    //setTimeout("rotateimages()", 3000)
    rotateimages(0);
}