$(document).ready(function() {
    $(".quantity-button").on("click", function(){
        let multiplier = $(this).val();
        //Obtain new values for ingredients depending on the multiplier
        document.getElementById("starter").innerHTML = 1 * multiplier;
        document.getElementById("water").innerHTML = decToFrac(3 * multiplier, 4);
        document.getElementById("yeast").innerHTML = decToFrac(1 * multiplier, 2);
        document.getElementById("flour").innerHTML = decToFrac(5 * multiplier, 2);
        document.getElementById("salt").innerHTML = 1 * multiplier;
    })
})

//Changes decimal to fraction
function decToFrac(num, denom) {
    let base = 0;
    
    //increment whole number while numerator is greater or equal to the denominator
    while (num >= denom) {
        base += 1;
        num = num - denom;
    }

    //convert fraction in the form 'numerator/denominator' to the appropriate html special character
    total = num + '/' + denom;
    switch (total) {
        case '1/4':
            total = '&frac14;';
        break;
        case ('1/2'):
        case ('2/4'):
            total = '&frac12;';
        break;
        case '3/4':
            total = '&frac34;';
        break;
        default:
            total = total;
        break;
    }

    if (base) {
        //if base and fraction have non-zero value then the string should return base + '' + total
        if (num) {
            total = base + ' ' + total;
        }
        //if only the base is non-zero then only return the base
        else {
            total = base;
        }
    } 

    //else just return the fraction
    return total;
}
