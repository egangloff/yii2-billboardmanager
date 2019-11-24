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