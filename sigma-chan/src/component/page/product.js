import React, { useState, useEffect } from 'react';
import Layout from '../layout/layout';
import { useParams } from 'react-router-dom';
import axios from 'axios';

import style from './style/product.module.css';
import cartIcon1 from '../../images/cart64.png';
import cartIcon2 from '../../images/cart64G.png';

const Product = () => {
    const [data, setSelectedProduct] = useState([]);
    const [quantity, setQuantity] = useState(1);
    const { id } = useParams();

    useEffect(() => {
        const fetchProduct = async () => {
            try {
                const response = await axios.get(
                    `http://127.0.0.1:8000/api/products/${id}`
                );
                setSelectedProduct(response.data);
            } catch (error) {
                console.error(["ERROR", "Invalid data received from API"], error);
            }
        };

        fetchProduct();
    }, [id]);

    const increaseQuantity = () => {
        if (quantity > 9) {
            setQuantity(10);
        } else {
            setQuantity(quantity + 1);
        }
    };

    const decreaseQuantity = () => {
        if (quantity > 1) {
            setQuantity(quantity - 1);
        }
    };

    const [isHovered, setIsHovered] = useState(false);
    const img1 = cartIcon1;
    const img2 = cartIcon2;

    const handleHover = () => {
        setIsHovered(!isHovered);
    };

    return (
        <Layout>
            <div className={style.productContainer}>
                <div className={style.productImage}>
                    {data.image_url && (
                        <img src={`http://127.0.0.1:8000/${data.image_url}`} alt={data.title} />
                    )}
                </div>
                <div className={style.productInfo}>
                    <h4>Статус: {data.status}</h4>
                    <h1>{data.name}</h1>
                    <h2>{data.tome}</h2>
                    <div className={style.productPrice}>
                        <h1>{data.price} ГРН.</h1>
                        <div className={style.productCounter}>
                            <span className={style.down} onClick={decreaseQuantity}>-</span>
                            <input type="text" readOnly value={quantity}></input>
                            <span className={style.up} onClick={increaseQuantity}>+</span>
                        </div>
                    </div>
                    <div className={style.productButtons}>
                        <button className={style.buyButton}>Придбати</button>
                        <button className={style.cartButton} onMouseEnter={handleHover} onMouseLeave={handleHover}>
                            <span>
                                <img src={isHovered ? img2 : img1} alt="cart" />
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </Layout>
    );
};

export default Product;
