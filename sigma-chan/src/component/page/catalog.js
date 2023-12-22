import React, { useEffect, useState } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import Layout from '../layout/layout';
import style from '../page/style/catalog.module.css';

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

const Catalog = () => {
    let { type } = useParams();
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
        let data = products.filter((product) => {
            // eslint-disable-next-line eqeqeq
            return product.category_id == type
        }).map(product => (
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

    const navigate = useNavigate();

    return (
        <div>
            <Layout>
                <div className={style.container}>
                    <div className={style.row}>
                        <div className={style.sidebar}>
                            <div className={style.sidebarBlock}>
                                <div className={style.sidebarTitle}>
                                    Каталог
                                </div>
                                <hr />
                                <div className={style.sidebarContent}>
                                    <nav className={style.navSidebar}>
                                        <ul>
                                            <li onClick={() => navigate("/catalog/2")}>Манга</li>
                                            <li onClick={() => navigate("/catalog/3")}>Подарункові Сертифікати</li>
                                            <li onClick={() => navigate("/catalog/4")}>Товари для дому та офісу</li>
                                            <li onClick={() => navigate("/catalog/5")}>Аніме фігурки</li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div className={style.catalog}>
                            <div className={style.content}>
                                <div className={style.textContent}>
                                    <h2 className={style.sectionTitle}>Каталог</h2>
                                </div>
                                <div className={style.collection}>
                                    <div className={style.row}>
                                        {showProducts()}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </Layout>
        </div>
    );
};

export default Catalog;