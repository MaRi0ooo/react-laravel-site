import React from 'react';
import HeaderTop from '../header/header_top/headerTop';
import HeaderBottom from '../header/header_bottom/headerBottom';
import Footer from '../footer/footer';

const Layout = (props) => {
    return (
        <div>
            <div>
                <HeaderTop />
                <HeaderBottom />
                <div style={{ minHeight: "100vh" }}>
                    {props.children}
                </div>
                <Footer />
            </div>
        </div>
    );
};

export default Layout;