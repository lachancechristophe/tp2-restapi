document.getElementById("customer-options").addEventListener("click", function(event){
    event.preventDefault()
    options_request('customer');
});

document.getElementById("movie-options").addEventListener("click", function(event){
    event.preventDefault()
    options_request('movie');
});

document.getElementById("statement-options").addEventListener("click", function(event){
    event.preventDefault()
    options_request('statement');
});

document.getElementById("customer-get").addEventListener("click", function(event){
    event.preventDefault()
    customer_get_request();
});

document.getElementById("movie-get").addEventListener("click", function(event){
    event.preventDefault()
    movie_get_request();
});

document.getElementById("statement-get").addEventListener("click", function(event){
    event.preventDefault()
    statement_get_request();
});

document.getElementById("customer-put").addEventListener("click", function(event){
    event.preventDefault()
    customer_put_request();
});

document.getElementById("movie-put").addEventListener("click", function(event){
    event.preventDefault()
    movie_put_request();
});