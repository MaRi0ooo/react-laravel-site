import React, { Component } from 'react';
import Slider from 'react-slick';
import style from './style/slider.module.css';

import slider1 from '../../images/sliderImg1.jpg';
import slider2 from '../../images/sliderImg2.jpg';
import slider3 from '../../images/sliderImg3.jpg';
import slider4 from '../../images/sliderImg4.png';

export default class SimpleSlider extends Component {
    render() {
        const settings = {
            dots: false,
            infinite: true,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 10000,
        };
        return (
            <div className={style.sliderWrapper}>
                <Slider {...settings}>
                    <div>
                        <div className={style.sliderContainer}>
                            <img className={style.imgSlider} src={slider1} alt="slider1" />
                        </div>
                    </div>
                    <div>
                        <div className={style.sliderContainer}>
                            <img className={style.imgSlider} src={slider2} alt="slider2" />
                        </div>
                    </div>
                    <div>
                        <div className={style.sliderContainer}>
                            <img className={style.imgSlider} src={slider3} alt="slider3" />
                        </div>
                    </div>
                    <div>
                        <div className={style.sliderContainer}>
                            <img className={style.imgSlider} src={slider4} alt="slider4" />
                        </div>
                    </div>
                </Slider>
            </div>
        );
    }
}