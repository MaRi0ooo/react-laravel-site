import React from 'react';
import { NavLink, useNavigate } from 'react-router-dom';
import style from './header-bottom.module.css'

const HeaderBottom = () => {
    const navigate = useNavigate();

    return (
        <div className={style.headerBottom}>
            <nav>
                <ul className={style.topMenu}>
                    <li>
                        <NavLink>Каталог</NavLink>
                        <ul className={style.subMenu}>
                            <li><span onClick={() => navigate("/catalog/2")}>Манга</span></li>
                            <li><span onClick={() => navigate("/catalog/3")}>Подарункові сертифікати</span></li>
                            <li><span onClick={() => navigate("/catalog/4")}>Товари для дому та офісу</span></li>
                            <li><span onClick={() => navigate("/catalog/5")}>Аніме фігурки</span></li>
                        </ul>
                    </li>
                    <li><NavLink to='/'>Головна</NavLink></li>
                    <li><NavLink to='/delivery'>Доставка і Оплата</NavLink></li>
                    <li><NavLink to='/contacts'>Контакти</NavLink></li>
                </ul>
            </nav>
        </div>
    );
};

export default HeaderBottom;