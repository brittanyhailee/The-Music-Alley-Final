let x = document.cookie;

function readCookie() {
   let cartCookie = getCookie('cart');
   if (cartCookie) {
    let parsedCookie = JSON.stringify(cartCookie);
    console.log("cartCookie is " +cartCookie);
   }


    return cartCookie;
}

readCookie();

class Model {
    constructor() {
    }
}

class View {
    constructor() {
        this.toCartBtn = document.getElementById('add-to-cart');

    }
}

class Controller {
    constructor(model, view) {
        this.model = model;
        this.view = view;
    }
}

const cartObj = new Controller(new Model(), new View());




 function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  
 }

 function setCookie(name, value, days) {
    // Convert the object to a JSON string
    const jsonValue = JSON.stringify(value);
    console.log("the jsonvalue of the cookie is is " + jsonValue);
    
    // Set the cookie
    let expires = "";
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + encodeURIComponent(jsonValue) + expires + "; path=/";
}


 function addToCart(pId, img, pName, pQuant, pPrice) {
    readCookie();
    
    console.log("id is " + pId);
    console.log("quantity is " + pQuant);

    const calcPrice = pQuant*pPrice;
    const rounded = calcPrice.toFixed(2);

    console.log("the price is $" + rounded);
    //console.log("ARE YOU ACTUALLYT WORKING????@@?");

    let loadedCart = loadCart() || [];

    if (searchLocalStorage(pId, pQuant)) {//This means the item is already in the cart
        //console.log("There are currently " + searchLocalStorage(pId) + " in the cart");
        let getCart = localStorage.getItem('inCart');
        let currentCart = getCart ? JSON.parse(getCart) : [];
        console.log("current cart is " + JSON.stringify(currentCart));
        //we need to update the quantity with the new quantity.

    } else { //If product is not yet in the cart

        if (loadedCart) {console.log("LOADED CART IS NOT EMPTY")};

        let getCart = localStorage.getItem('inCart');
        let currentCart = getCart ? JSON.parse(getCart) : [];
        console.log("current cart is " + JSON.stringify(currentCart));

        const product = [{
            id: pId,
            name: pName,
            image: img,
            quantity: pQuant,
            price: pPrice
        }];

        currentCart.push(product);

        localStorage.setItem('inCart', JSON.stringify(currentCart));
        setCookie('cart', product, 1); 
    }

    console.log("Now cart is " + getCookie('cart'));
 }



 
 function loadCart() {
    return JSON.parse(localStorage.getItem('inCart'));
 }



 function searchLocalStorage(pId, newQuantity) {
    console.log("searching local storage...");
    let data = JSON.parse(localStorage.getItem('inCart'));

    let duplicates = 0;
    let found = null;
    if(data != null) {

        data.forEach(array => {
            array.forEach(item=> {
                if (item.id === pId) {
                    // newQuantity = item.quantity;
                    item.quantity = newQuantity;
                    console.log("the new quantity of product " + item.id + " is " + item.quantity);
                    //console.log("The item quantity of id " + pId + " is "+ item.quantity);
                    // console.log(item.id);
                    found = true;
                    duplicates++;
                    
                }
            });
        });

        // let innerArray = data[0];
        // let test = innerArray.find(product=>product.id ===pId);
        // console.log(typeof(data));
        // if (test) {
        //     console.log("item is found");
        // } else {
        //     console.log("not found");
        // }
        //let test = data.find(item=>item.id===pId);

        //MIGHT MESS THINGS UP
        //JSON.stringify(localStorage.setItem('inCart'));
        localStorage.setItem('inCart', JSON.stringify(data));
    }
    console.log("there are " +duplicates+" duplicates");
    //return newQuantity;
    return found;
 }