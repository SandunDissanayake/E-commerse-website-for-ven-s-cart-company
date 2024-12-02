const product = [
    {
        id: 0,
        image: 'images/product-1.jpg',
        title: 'Vivo Pro',
        price: 45000.00,
    },
    {
        id: 1,
        image: 'images/product-2.jpg',
        title: 'Apple Watch',
        price: 35000.00,
    },
    {
        id: 2,
        image: 'images/product-3.jpg',
        title: 'Nikon Camera',
        price: 100000.00,
    },
    {
        id: 3,
        image: 'images/product-5.jpg',
        title: 'Wireless Headset',
        price: 15000.00,
    },
    {
        id: 4,
        image: 'images/product-6.jpg',
        title: 'Smart TV',
        price: 85000.00,
    },
    {
        id: 5,
        image: 'images/khiu_j1he_190804.jpg',
        title: 'T shirt',
        price: 1500.00,
    },
 
    {
        id: 8,
        image: 'images/Cargo pants for men with a plain -5.jpg',
        title: 'Trouser',
        price: 2500.00,
    }
    
];
const categories = [...new Set(product.map((item)=>
    {return item}))];
    let i=0;

    document.getElementById('root').innerHTML = categories.map((item)=>{
        var {image, title, price} = item;
        return(
            `<div class='box'>
            <div class='img-box'>
            <img class='images' src=${image}>
            </div>
            <div class='bottom'>
            <p>${title}</p>
            <h2>$ ${price}.00</h2>`+
            "<button onclick='addtocart("+(i++)+")'>Add to Cart</button>"+
            `</div>
            </div>`
        
        )
    }).join('')

    var Cart =[];
    
    function addtocart(a){
        Cart.push({...categories[a]});
        displaycart();
    }
    function delElement(a){
        Cart.splice(a, 1);
        displaycart();
    }

    function displaycart(a){
        let j = 0, total=0;
        document.getElementById("count").innerHTML=Cart.length;
        document.getElementById("total").innerHTML="$"+0+".00";
        if(Cart.length==0){
            document.getElementById('cartitem').innerHTML = "Your Cart is Empty";

        }
        else{
            document.getElementById("cartitem").innerHTML = Cart.map((items)=>
            {
                var {image, title, price} = items;
                total=total+price;
                document.getElementById("total").innerHTML= "$"+total+".00";
                return(
                    `<div class='cart-item'>
                    <div class='row-img'>
                    <img class='rowimg' src=${image}>
                    </div>
                    <p style='font-size:12px;'>${title}</p>
                    <h2 style='font-size: 15px;'>$ ${price}.00</h2>`+
                    "<i class='fa-solid fa-trash' onclick='delElement("+(j++) +")'>&#128722<i></div>"
                )
            }).join('');
        }
    }