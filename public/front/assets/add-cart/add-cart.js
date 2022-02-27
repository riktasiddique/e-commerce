// Product Increse and Decrese
function productIncreseDecrese(issIncrese){
   var inputFeild = document.getElementById('cartFeild');
   var inputFeildValue = parseInt(inputFeild.value);
   if(issIncrese == true){
    inputFeildValue = inputFeildValue + 1;
   }
   else if(issIncrese == false && inputFeildValue > 1 ){
        inputFeildValue = inputFeildValue - 1;
    }
    inputFeild.value = inputFeildValue;
    var totalPrice = 100 * inputFeildValue;
    // var totalPrice = document.getElementById('productPrice').innerText * inputFeildValue;
    document.getElementById('productPrice').innerText = totalPrice;
    payAble();
}
// Cart Input Feild
function cartFeild(){
    var cartFeild = document.getElementById('cartFeild');
    var cartFeildValue = cartFeild.value;
    return cartFeildValue;
}
// Product Total Calculation
function payAble(){
    // subtotal
   var subTotal = 100 * cartFeild();
    document.getElementById('subTotal').innerText = subTotal;
    // total
    document.getElementById('total').innerText = subTotal;
    // shipping
    var shippingCharge = 50 * cartFeild();
    document.getElementById('shippingCharge').innerText = shippingCharge;
    // payable
    var totalPayable = subTotal + shippingCharge;
    document.getElementById('payable').innerText = totalPayable;

}
