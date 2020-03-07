var service_statement = "statement.php";
var service_movie = "movie.php";
var service_customer = "customer.php";

function options_request(service) {
    var xhttp = new XMLHttpRequest();
    var div_resultat = document.getElementById("resultat-ajax");
    var request_value = document.getElementById("requete").value;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var json_array = JSON.parse(this.responseText);
            div_resultat.innerHTML += this.responseText;
        } else {
            if(this.readyState == 4){
                console.log("Erreur: " + ajaxRequest.status);}
            else{
                console.log("State: " + this.readyState)}
        }
    };

    xhttp.open('OPTIONS', "http://localhost/refact4-REST/" + service + ".php", true);
    xhttp.send();
}

function customer_get_request() {
    var xhttp = new XMLHttpRequest();
    var div_resultat = document.getElementById("resultat-ajax");
    var request_value = document.getElementById("requete").value;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var json_array = JSON.parse(this.responseText);
            div_resultat.innerHTML += this.responseText;
        } else {
            if(this.readyState == 4){
                console.log("Erreur: " + ajaxRequest.status);}
            else{
                console.log("State: " + this.readyState)}
        }
    };

    xhttp.open('GET', "http://localhost/refact4-REST/" + service_customer + "?customer_name=" + request_value, true);
    xhttp.send();
}

function movie_get_request() {
    var xhttp = new XMLHttpRequest();
    var div_resultat = document.getElementById("resultat-ajax");
    var request_value = document.getElementById("requete").value;

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var json_array = JSON.parse(this.responseText);
            div_resultat.innerHTML += this.responseText;
        } else {
            if(this.readyState == 4){
                console.log("Erreur: " + ajaxRequest.status);}
            else{
                console.log("State: " + this.readyState)}
        }
    };

    xhttp.open('GET', "http://localhost/refact4-REST/" + service_movie + "?title=" + request_value, true);
    xhttp.send();
}

function movie_put_request() {
    var xhttp = new XMLHttpRequest();
    var div_resultat = document.getElementById("resultat-ajax");
    var request_value = document.getElementById("requete").value;
    var request_2_value = document.getElementById("requete-2").value;

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            
            div_resultat.innerHTML += this.responseText;
        } else {
            if(this.readyState == 4){
                console.log("Erreur: " + ajaxRequest.status);}
            else{
                console.log("State: " + this.readyState)}
        }
    };

    xhttp.open('PUT', "http://localhost/refact4-REST/" + service_movie, true);
    xhttp.setRequestHeader("Content-type", "text/json");
    xhttp.send('{"title": "'+request_value+'", "category": "'+request_2_value+'"}');
}

function customer_put_request() {
    var xhttp = new XMLHttpRequest();
    var div_resultat = document.getElementById("resultat-ajax");
    var request_value = document.getElementById("requete").value;

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            
            div_resultat.innerHTML += this.responseText;
        } else {
            if(this.readyState == 4){
                console.log("Erreur: " + ajaxRequest.status);}
            else{
                console.log("State: " + this.readyState)}
        }
    };
    
    xhttp.open('PUT', "http://localhost/refact4-REST/" + service_customer, true);
    xhttp.setRequestHeader("Content-type", "text/json");
    xhttp.send('{"customer_name": "'+request_value+'"}');
}

function statement_get_request() {
    var xhttp = new XMLHttpRequest();
    var div_resultat = document.getElementById("resultat-ajax");
    var request_value = document.getElementById("requete").value;

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var json_array = JSON.parse(this.responseText);
            div_resultat.innerHTML += json_array.response_text;
            console.log(json_array);
            if(json_array.customer_name){
                process_statement(json_array);
            }
        } else {
            if(this.readyState == 4){
                console.log("Erreur: " + ajaxRequest.status);}
            else{
                console.log("State: " + this.readyState)}
        }
    };

    xhttp.open('GET', "http://localhost/refact4-REST/" + service_statement + "?customer_name=" + request_value, true);
    xhttp.send();
}

function process_statement(statement_data){
    var div_resultat = document.getElementById("resultat-statement");

    div_resultat.innerHTML += "Statement for customer " + statement_data.customer_name + ". <br>";
    for(var i = 0; i < statement_data.rentals.length; i++){
        div_resultat.innerHTML += "Rented movie: " + statement_data.rentals[i][0] + ". Total charge for movie: " + statement_data.rentals[i][1]+ ".<br>";
    }
    div_resultat.innerHTML += "Frequent renter points: " + statement_data.renter_points + ".<br>";
    div_resultat.innerHTML += "Total charge for statement: " + statement_data.total_amount + ".<br>";
}