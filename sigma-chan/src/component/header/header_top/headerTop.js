import React from 'react';
import Cart from './cart';
import Logo from './logo';
import Search from './search';
import Info from './info';
import style from './style/header-top.module.css';
import logoR from '../../../images/logoR.png';
import gazaIcon from '../../../images/gaza.png';

const HeaderTop = () => {
    return (
        <div className={style.headerTop}>
            <Logo />
            <nav>
                <ul className={style.navList}>
                    <li><Search /></li>
                    <li><Info /></li>
                    <li><Cart /></li>
                    <li><a href='http://127.0.0.1:8000/product'><img className={style.gazaIcon} src={gazaIcon} alt="klu4" /></a></li>
                </ul>
            </nav>
            <img className={style.logoImageR} src={logoR} alt="logo" />
        </div>
    );
};

export default HeaderTop;