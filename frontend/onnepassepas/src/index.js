import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Routes, Route } from "react-router-dom";
import './index.css';
import Introduction from './Routes/Introduction/Introduction';
import Accueil from './Routes/Accueil/Accueil';
import Slides from './Routes/Slides/Slides';

ReactDOM.render(
  <BrowserRouter>
    <Routes>
      <Route path="/" element={<Accueil />} />
      <Route path="/Introduction" element={<Introduction />} />
      <Route path="/Slides" element={<Slides />} />
    </Routes>
  </BrowserRouter >,
  document.getElementById('root')
);
