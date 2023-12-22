import React from "react";
import style from './style/contacts.module.css';
import Layout from "../layout/layout";

import phoneIcon from '../../images/phone50G.png';
import mailIcon from '../../images/mail50G.png';
import trackIcon from '../../images/tracking64G.png';

import faIcon from '../../images/facebook-grey.png';
import instaIcon from '../../images/instagram-grey.png';
import linkedIcon from '../../images/lindedin-grey.png';

const Contacts = () => {
    return (
        <Layout>
            <div className={style.container}>
                <div className={style.form}>
                    <div className={style.contactInfo}>
                        <h3 className={style.title}>Let's get in touch</h3>
                        <p className={style.text}>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
                            dolorum adipisci recusandae praesentium dicta!
                        </p>
                        <div className={style.info}>
                            <div className={style.information}>
                                <img src={trackIcon} className={style.icon} alt="" />
                                <p>92 Cherry Drive Uniondale, NY 11553</p>
                            </div>
                            <div className={style.information}>
                                <img src={mailIcon} className={style.icon} alt="" />
                                <p>sigma_chan@gmail.com</p>
                            </div>
                            <div className={style.information}>
                                <img src={phoneIcon} className={style.icon} alt="" />
                                <p>+ (087) 055-53-53</p>
                            </div>
                        </div>
                        <div className={style.socialMedia}>
                            <p>Connect with us:</p>
                            <div className={style.socialIcons}>
                                <a href="#"><img src={faIcon} alt="facebook" /></a>
                                <a href="#"><img src={instaIcon} alt="linkedin" /></a>
                                <a href="#"><img src={linkedIcon} alt="instagram" /></a>
                            </div>
                        </div>
                    </div>
                    <div className={style.contactForm}>
                        <form className={style.inputForm} action="" autocomplete="off">
                            <h3 class={style.title}>Contact us</h3>
                            <div class={style.inputContainer}>
                                <input type="text" name="name" class={style.input} placeholder="Username" />
                            </div>
                            <div class={style.inputContainer}>
                                <input type="email" name="email" class={style.input} placeholder="Email" />
                            </div>
                            <div class={style.inputContainer}>
                                <input type="tel" name="phone" class={style.input} placeholder="Phone" />
                            </div>
                            <div class={`${style.inputContainer} ${style.textarea}`}>
                                <textarea name="message" placeholder="Message" class={style.input}></textarea>
                            </div>
                            <input type="submit" value="Send" class={style.btn} />
                        </form>
                    </div>
                </div>
            </div>
        </Layout>
    );
};

export default Contacts;