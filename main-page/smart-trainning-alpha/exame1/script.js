var elements = document.querySelectorAll(".elements");

anime({
    targets: ".elements",
    keyframes: [
        {scale: 0, duration: 0},
        {scale: 1, delay: 50}
    ],
    duration: 500,
    easing: 'easeOutElastic(2.2, 1)',
});

//hover_choices = anime({
//    targets: ".choices",
//    scaleX: 1,
//});