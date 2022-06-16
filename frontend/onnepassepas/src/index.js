import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Routes, Route } from "react-router-dom";
import './index.css';
import Introduction from './Routes/Introduction/Introduction';
import Home from './Routes/Home/Home';
import Slides from './Routes/Slides/Slides';
import Ending from './Routes/Ending/Ending';

ReactDOM.render(
  <BrowserRouter>
    <Routes>
      <Route path="/" element={<Home />} />
      <Route path="/Introduction" element={<Introduction />} />
      <Route path="/Slides" element={<Slides />} />
      <Route path="/Ending" element={<Ending />} />
    </Routes>
  </BrowserRouter >,
  document.getElementById('root')
);
