function productAmmout(product, issIncrese, price){
    const productId = document.getElementById(product + '-number');
    var productValue = productId.value;
    if(issIncrese){
        productValue = parseInt(productValue) + 1;
    }
    else if(productValue > 0){
        productValue = parseInt(productValue) - 1;
    }
    productId.value = productValue;
    // Increse Ammount
    const productCurrentPrice = document.getElementById(product + '-price')
    productCurrentPrice.innerText = parseInt(productValue) * price;

    // subtotal ammount
    totalAmmount();
    
}
// Individual Products 
function getInput(product){
   const productAmmount =  document.getElementById(product +'-number');
   var productValue = parseInt(productAmmount.value);
   return productValue;
}
// Product Total Calculation 
 function totalAmmount(){
     var totalCase = getInput('case') * 58;
     var totalPhone = getInput('phone') * 1219;
     var subtotal = totalCase + totalPhone;
     var taxtAmmount = subtotal / 10;
     var total = subtotal + taxtAmmount;
     console.log(total)
     var updateSubtotal = document.getElementById('product-subtotal').innerText = subtotal;
     var taxtUpdateAmmount = document.getElementById('tax-total').innerText = taxtAmmount;
     var allProductTotalPrice = document.getElementById('all-product-price').innerText = total;
 }
// Product Increse
document.getElementById('case-pluse').addEventListener('click', function(){
    productAmmout('case', true, 58);
})
document.getElementById('phone-pluse').addEventListener('click', function(){
    productAmmout('phone', true, 1219);
})
// Product Decrese
document.getElementById('phone-minus').addEventListener('click', function(){
    productAmmout('phone', false, 1219);
})
document.getElementById('case-minus').addEventListener('click', function(){
    productAmmout('case', false, 58);
})
