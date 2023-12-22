import React from 'react';
import style from './style/cart.module.css';
import cartIcon from '../../../images/cart64G.png'
import { NavLink } from 'react-router-dom';

const Cart = () => {
    return (
        <NavLink to='/cart'>
            <div className={style.circle}>
                <img src={cartIcon} alt='cart' />
            </div>
        </NavLink>
    );
};

export default Cart;