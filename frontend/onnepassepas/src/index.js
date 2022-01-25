import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Routes, Route } from "react-router-dom";
import './index.css';
import App from './App';
import IntroOne from './Routes/IntroOne/IntroOne';
import Accueil from './Routes/Accueil/Accueil';

ReactDOM.render(
  <BrowserRouter>
    <Routes>
      <Route path="/" element={<Accueil />} />
      <Route path="/IntroOne" element={<IntroOne />} />
    </Routes>
  </BrowserRouter >,
  document.getElementById('root')
);
