import React from 'react';
import style from './style/logo.module.css';
import logo from '../../../images/logoL.png'

const Logo = () => {
    return (
        <div className={style.logoContainer}>
            <img className={style.logoImageL} src={logo} alt='logo' />
            <h1>SIGMA | CHAN</h1>
        </div>
    );
};

export default Logo;