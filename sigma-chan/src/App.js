import './App.css';
import React, { useEffect, useState } from 'react';
import { BrowserRouter, Routes, Route, useParams } from 'react-router-dom';

import Home from "./component/page/home";
import Product from './component/page/product';
import Cart from './component/page/cart'
import Catalog from './component/page/catalog';
import DeliveryPayment from './component/page/deliveryPayment';
import Contacts from './component/page/contacts';
import axios from 'axios';

const App = () => {
  const [data, setData] = useState([]);
  const params = useParams();

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await axios.get("http://127.0.0.1:8000/api/products");
        setData(response.data);
      } catch (error) {
        console.error(["ERROR", "Invalid data received from API"], error);
      }
    };

    fetchData();
  }, []);

  return (
    <BrowserRouter>
      <Routes>
        <Route path='/catalog/:type' element={<Catalog data={data} />} />
        <Route path='/' element={<Home data={data} />} />
        <Route path='/product/:id' element={<Product data={data.find(product => product.id === parseInt(params.id))} />} />
        <Route path='/delivery' element={<DeliveryPayment />} />
        <Route path='/contacts' element={<Contacts />} />
        <Route path='/cart' element={<Cart />} />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
