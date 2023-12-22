import React from "react";
import style from './footer.module.css';
import { NavLink, useNavigate } from 'react-router-dom';

import phoneIcon from '../../images/phone50G.png';
import mailIcon from '../../images/mail50G.png';
import clockIcon from '../../images/clock50G.png';
import trackIcon from '../../images/tracking64G.png';

import faIcon from '../../images/facebook-grey.png';
import instaIcon from '../../images/instagram-grey.png';
import linkedIcon from '../../images/lindedin-grey.png';

const Footer = () => {
    const navigate = useNavigate();

    return (
        <div className={style.footer}>
            <div className={`${style.sbFooter} ${style.sectionPadding}`}>
                <div className={style.sbFooterLinks}>
                    <div className={`${style.sbFooterLinksDiv} ${style.info}`}>
                        <h3>SIGMA | CHAN</h3>
                        <br />
                        <h4><img src={phoneIcon} alt="phone" /> + (087) 055-53-53</h4>
                        <br />
                        <h5><img src={mailIcon} alt="mail" /> sigma_chan@gmail.com</h5>
                        <br />
                        <h5><img src={trackIcon} alt="tracking" /> <b>Одесса</b>, Сумська 10, <br /> тц Аве плаза, 3 поверх</h5>
                        <br />
                        <h5><img src={clockIcon} alt="clock" /> Пн - Нд: 10:00 - 19:00</h5>
                    </div>
                    <div className={style.sbFooterLinksDiv}>
                        <h3>Каталог</h3>
                        <span onClick={() => navigate("/catalog/2")}>
                            <p>Манга</p>
                        </span>
                        <span onClick={() => navigate("/catalog/3")}>
                            <p>Подарункові сертифікати</p>
                        </span>
                        <span onClick={() => navigate("/catalog/4")}>
                            <p>Товари для дому та офісу</p>
                        </span>
                        <span onClick={() => navigate("/catalog/5")}>
                            <p>Аніме фігурки</p>
                        </span>
                    </div>
                    <div className={style.sbFooterLinksDiv}>
                        <h3>Інформація</h3>
                        <NavLink to={'/delivery'} onClick={() => window.scrollTo(0, 0)}>
                            <p>Доставка і Оплата</p>
                        </NavLink>
                        <NavLink to={'/contacts'} onClick={() => window.scrollTo(0, 0)}>
                            <p>Контакти</p>
                        </NavLink>
                    </div>
                    <div className={style.socialMediaDiv}>
                        <h3>Ми у соц. мережах</h3>
                        <div className={style.socialMedia}>
                            <p><img src={faIcon} alt="facebook" /></p>
                            <p><img src={instaIcon} alt="linkedin" /></p>
                            <p><img src={linkedIcon} alt="instagram" /></p>
                        </div>
                    </div>
                </div>
                <hr></hr>
                <div className={style.sbFooterBelow}>
                    <div className={style.sbFooterCopyright}>
                        <p>
                            © {new Date().getFullYear()} MaRiOooo. All right reserved.
                        </p>
                    </div>
                    <div className={style.sbFooterBelowLinks}>
                        <NavLink to=""><div><p>Terms & Conditions</p></div></NavLink>
                        <NavLink to=""><div><p>Privacy</p></div></NavLink>
                        <NavLink to=""><div><p>Security</p></div></NavLink>
                        <NavLink to=""><div><p>Cookie Declaration</p></div></NavLink>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Footer;