function pemberitahuan() {
    // Swal.fire({
    //           icon: "error",
    //           title: "Whoops.. .!!!!<br>I apologize, URL doesn't exist!?",
    //           width: 500,
    //           showConfirmButton: false,
    //           timer: 1500
    //         });
    // Swal.fire({
    //     title: "Whoops!!",
    //     text: "I apologize, URL doesn't exist",
    //     imageUrl: "<?=base_url()?>penyimpanan_file/meow.gif",
    //     imageWidth: 300,
    //     imageHeight: 150,
    //     imageAlt: "Custom image",
    //     background: "url(<?=base_url()?>penyimpanan_file/trees.png)",
    //     showConfirmButton: false,
    //     timer: 1500
    //     })
    Swal.fire({
        icon: "error",
        title: "Whoops!!",
        text: "I apologize, this website is not hosted",
        width: 363,
        // background: "url(<?=base_url()?>penyimpanan_file/trees.png)",
        showConfirmButton: false,
        timer: 1300
        })
}

$( "#dummyButton" ).click(function() {
        Swal.fire({
        icon: "error",
        title: "Whoops!!",
        text: "I apologize, file doesn't exist",
        width: 363,
        showConfirmButton: false,
        timer: 1300
        })
});

function sayMyName( nama ) {
    var nama = nama.split(" ");
    if('speechSynthesis' in window) { // Chrome only !!
    var speech = new SpeechSynthesisUtterance( nama );
    speech.lang = 'id';
    window.speechSynthesis.speak(speech);
    }
}

// document.onkeydown = function(e) {
//     if(event.keyCode == 123) {
//         return false;
//         }
//     if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
//         return false;
//         }
//     if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
//         return false;
//         }
//     if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
//         return false;
//         }
//     if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
//         return false;
//         }
//     if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
//         return false;
//         }
//     if(e.ctrlKey && e.keyCode == 'H'.charCodeAt(0)){
//         return false;
//         }
//     if(e.ctrlKey && e.keyCode == 'A'.charCodeAt(0)){
//         return false;
//         }
//     if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
//         return false;
//         }
// }