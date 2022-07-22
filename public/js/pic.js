$(document).ready(function() {
    setTimeout(function(){ 
        $('.alert-success').hide()
    }, 5000)
})

$('#picName').keydown(function(e) {
    var firstText = e.target.value
    firstText = firstText.toLowerCase().replace(/\b[a-z]/g, function(letter) {
        return letter.toUpperCase()
    })
    $('#picName').val(firstText)
})

$('#akronim').keydown(function(e){
    var upperText = e.target.value.toUpperCase()
    $('#akronim').val(upperText)
})