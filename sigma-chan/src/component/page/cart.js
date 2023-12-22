import React, { useEffect, useState } from 'react';
import Layout from '../layout/layout';

import style from './style/cart.module.css';
import Button from '../elements/Button';

import useHover from '../elements/changeImage';
import trashIcon1 from '../../images/trash32.png';
import trashIcon2 from '../../images/trash32G.png';

async function createOrder(cartItems) {
    let orderId;
    let resp = await fetch('http://127.0.0.1:8000/api/orders', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            "charset": "utf-8"
        },
    }).then(response => response.json()
    ).then(data => orderId = data.id);
    cartItems.map(item => {
        fetch(`http://127.0.0.1:8000/api/order-products`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                order_id: orderId,
                product_id: item.id,
                quantity: item.quantity
            })
        }).then(response => {
            response.json();
        }).then(() => {
            localStorage.removeItem('cart');
            document.location.reload();
        });
    })
}

const Cart = () => {
    const [isHovered, handleHover] = useHover();
    const img1 = trashIcon1;
    const img2 = trashIcon2;
    const [cartItems, setCartItems] = useState([]);

    useEffect(() => {
        const savedCart = JSON.parse(localStorage.getItem('cart')) || [];
        setCartItems(savedCart);
    }, []);

    const calculateTotalPrice = () => {
        return cartItems.reduce((total, item) => total + item.cardPrice, 0);
    };

    const handleRemoveItem = (index) => {
        const updatedCart = [...cartItems];
        updatedCart.splice(index, 1);
        setCartItems(updatedCart);
        localStorage.setItem('cart', JSON.stringify(updatedCart));
    };

    const handleClearCart = () => {
        setCartItems([]);
        localStorage.removeItem('cart');
    };


    const handleOrder = () => {
        createOrder(cartItems);
    }

    return (
        <div>
            <Layout>
                <div className={style.cartContainer}>
                    <div className={style.cartHeader}>
                        <h1>КОРЗИНА</h1>
                        <button className={style.trashButton} onMouseEnter={handleHover} onMouseLeave={handleHover} onClick={handleClearCart}>
                            <img src={isHovered ? img2 : img1} alt="trashIcon" />
                            <span>Видалити все</span>
                        </button>
                    </div>
                    {cartItems.map((item, index) => (
                        <div key={index} className={style.cartProduct}>
                            <img src={`http://127.0.0.1:8000/${item.cardImg}`} alt={item.cardTitle} />
                            <h2 style={{ width: "190px", textAlign: "center" }}>{item.cardTitle}</h2>
                            <h2>{item.cardText}</h2>
                            <h2>{item.cardStatus}</h2>
                            <h2>Кількість: {item.quantity}</h2>
                            <div className={style.cartProductPrice}>
                                <h1>{item.cardPrice} грн.</h1>
                                <button className={style.trashButton} onMouseEnter={handleHover} onMouseLeave={handleHover} onClick={() => handleRemoveItem(index)}>
                                    <img src={isHovered ? img2 : img1} alt="trashIcon" />
                                    <span>Видалити</span>
                                </button>
                            </div>
                        </div>
                    ))}
                    <div className={style.cartFooter}>
                        <div className={style.cartSubTotal}>
                            <h1>Усього: {calculateTotalPrice()} ГРН.</h1>
                            <h2>Товарів: {cartItems.length}</h2>
                        </div>
                        <Button product={handleOrder} btnStyle={style.orderButton} btnText={"Замовити"} />
                    </div>
                </div>
            </Layout>
        </div>
    );
};

export default Cart;