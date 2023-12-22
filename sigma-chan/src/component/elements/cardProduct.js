import React from 'react';
import { useNavigate } from 'react-router-dom';
import style from './style/card-product.module.css';
import Button from './Button';

const CardProduct = (props) => {
    const link = `/product/${props.id}`;
    const navigate = useNavigate();

    const handleAddToCart = () => {
        const productData = {
            id: props.id,
            cardImg: props.cardImg,
            cardTitle: props.cardTitle,
            cardText: props.cardText,
            cardStatus: props.cardStatus,
            cardPrice: props.cardPrice,
        };

        const currentCart = JSON.parse(localStorage.getItem('cart')) || [];

        const existingProductIndex = currentCart.findIndex(item => item.id === props.id);

        if (existingProductIndex !== -1) {
            currentCart[existingProductIndex].quantity += 1;
        } else {
            productData.quantity = 1;
            currentCart.push(productData);
        }

        localStorage.setItem('cart', JSON.stringify(currentCart));

        // navigate('/cart');
    };

    return (
        <div className={style.container}>
            <ul>
                <li className={style.cardsItem}>
                    <div className={style.card}>
                        <div onClick={() => navigate(link)} className={style.cardImage}>
                            <img style={{ height: "292px" }} src={`http://127.0.0.1:8000/${props.cardImg}`} alt='product' />
                        </div>
                        <div style={{ width: "100%" }}>
                            <h1 className={style.cardTitle}>{props.cardTitle}</h1>
                            <br />
                            <h2 className={style.cardText} style={{ textAlign: "center" }}>{props.cardText}</h2>
                            <br />
                            <h3 className={style.cardStatus}>Статус: {props.cardStatus}</h3>
                        </div>
                        <div style={{ display: "flex", flexDirection: "row", width: "100%", height: "100%" }}>
                            <div className={style.cardPrice}>
                                <h2 style={{ marginLeft: "0.5rem" }}>{props.cardPrice} грн.</h2>
                                <Button product={handleAddToCart} btnText={"У Корзину"} />
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    );
};

export default CardProduct;
