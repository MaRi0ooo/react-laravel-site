import React from 'react';
import Layout from '../layout/layout';
import style from './style/delivery-payment.module.css';

const DeliveryPayment = () => {
    return (
        <Layout>
            <h1 className={style.sectionTitle}>Доставка і Оплата</h1>
            <div className={style.deliveryPaymentContainer}>
                <hr className={style.rowSeparator} />
                <div className={style.row}>
                    <div className={style.subSection}>
                        <h3>Доставка</h3>
                        <ul className={style.topInfo}>
                            <li>
                                Нова Пошта
                                <ul className={style.subInfo}>
                                    <li>Срок доставки: 2 робочих дні</li>
                                    <li>Вартість: згідно тарифів Нової Пошти</li>
                                    <li>Безплатно при сумі замовлення від 1990 грн.</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div className={style.subSection}>
                        <h3>Оплата</h3>
                        <ul className={style.topInfo}>
                            <li>
                                При отриманні замовлення на пошті
                                <ul className={style.subInfo}>
                                    <li>Комісія: за відправку грошей згідно тарифів Нової пошти</li>
                                </ul>
                            </li>
                            <li>
                                Банківською карткою
                                <ul className={style.subInfo}>
                                    <li>Комісія: 0 грн.</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr className={style.rowSeparator} />
                <div className={style.row}>
                    <div className={style.subSection}>
                        <h3>Як зробити замовлення?</h3>
                        <ul className={style.topInfo}>
                            <li>Додайте товари до корзини</li>
                            <li>Перейдіть до корзини та натисніть кнопку "Оформити"</li>
                            <li>Заповніть необхідні поля</li>
                            <li>Натисніть кнопку "Підтвердити замовлення"</li>
                            <li>Вітаємо, заказ готовий!</li>
                        </ul>
                    </div>
                    <div className={style.subSection}>
                        <h3>Після оформлення замовлення</h3>
                        <ul className={style.topInfo}>
                            <li>Ми зв‘яжемося з Вами та запитаємо про зручну для Вас адресу доставки.</li>
                            <li>Після цього замовлення буде надіслано та Вам прийде СМС з номером посилки. Ви зможете відстежити його на сайті Нової Пошти.</li>
                            <li>Як тільки замовлення прибуде до Вас у місто – Вам прийде SMS від Нової Пошти.</li>
                            <li>Ви можете забрати замовлення та, оглянувши його, сплатити. Термін зберігання замовлення на пошті – 5 днів.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </Layout>
    );
};

export default DeliveryPayment;