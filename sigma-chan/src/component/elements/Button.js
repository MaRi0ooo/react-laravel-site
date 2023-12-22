import React from 'react';
import style from './style/button.module.css';

const Button = ({ btnStyle = style.btn, btnText, product }) => {
    return (
        <div className={style.cardBtn}>
            <button className={btnStyle} onClick={product}>{btnText}</button>
        </div>
    );
};

export default Button;