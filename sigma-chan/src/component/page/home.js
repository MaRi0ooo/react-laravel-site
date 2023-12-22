import React, { useEffect, useState } from 'react';
import Layout from '../layout/layout';
import Slider from '../elements/slider';
import style from './style/home.module.css';

// REACT ----

// import CardProduct from '../elements/cardProduct';
// import { ProductsData } from './productsData';

// let PRODUCTS = ProductsData();

// const showProducts = () => {
//     let data = PRODUCTS.map(
//         product => <CardProduct
//             id={product.id}
//             cardImg={product.previewImage}
//             cardTitle={product.title}
//             cardText={product.text}
//             cardPrice={product.price} />
//     )
//     return (
//         <div className={style.cards}>
//             {data}
//         </div>
//     );
// };

// LARAVEL ----

import CardProduct from '../elements/cardProduct';
import axios from 'axios';

const Home = () => {
    const [products, setProducts] = useState([]);

    useEffect(() => {
        const fetchData = async () => {
            try {
                const response = await axios.get("http://127.0.0.1:8000/api/products");
                setProducts(response.data);
            } catch (error) {
                console.error(["ERROR", "Invalid data received from API"], error);
            }
        };

        fetchData();
    }, [])

    const showProducts = () => {
        let data = products.map(product => (
            <CardProduct
                key={product.id}
                id={product.id}
                cardImg={product.image_url}
                cardTitle={product.name}
                cardText={product.tome}
                cardStatus={product.status}
                cardPrice={product.price}
            />
        ));
        return (
            <div className={style.cards}>
                {data}
            </div>
        );
    };

    return (
        <Layout>
            <Slider />
            <h1 style={{ padding: "15px", display: "flex", justifyContent: "center" }}>Гаряча манга</h1>
            <div>
                {showProducts()}
            </div>
        </Layout>
    );
};

export default Home;