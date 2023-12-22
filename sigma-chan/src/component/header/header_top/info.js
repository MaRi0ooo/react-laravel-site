import React from 'react';
import style from './style/info.module.css'
import phone from '../../../images/phone50G.png'

const Info = () => {
    return (
        <div className={style.infoContainer}>
            <div className={style.phoneContainer}>
                <img src={phone} alt='phone' className={style.phoneIcon} />
                <h3>(087) 055-53-53 / (095) 623-32-66</h3>
            </div>
            <h4 className={style.businessHours}>Пн - Нд: 10:00 - 19:00</h4>
        </div>
    );
};

export default Info;
