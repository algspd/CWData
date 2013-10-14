$(document).ready(function(){
// show popup when you click on the link
$('.show-popup').click(function(event){
event.preventDefault(); // disable normal link function so that it doesn't refresh the page
$('.overlay-bg').show(); //display your popup
});
 
// hide popup when user clicks on close button
$('.close-btn').click(function(){
$('.overlay-bg').hide(); // hide the overlay
});
 
// hides the popup if user clicks anywhere outside the container
$('.overlay-bg').click(function(){
    $('.overlay-bg').hide();
})
// prevents the overlay from closing if user clicks inside the popup overlay
$('.overlay-content').click(function(){
    return false;
});
 
});
