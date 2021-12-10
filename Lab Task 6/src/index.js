
import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import Nav from "./nav/Nav";
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min'
import StudentList from "./students/StudentList";
import StudentData from "./students/StudentData";
import contactInfo from "./contact/ContactInfo";

import reportWebVitals from './reportWebVitals';
import {BrowserRouter, Routes, Route} from "react-router-dom";
import Home from "./home/Home";
import studentList from "./students/StudentList";
import ContactInfo from "./contact/ContactInfo";


ReactDOM.render(
  <React.StrictMode>
      <BrowserRouter>
            <Nav/>
          <Routes>
              <Route path="/" element={<Home/>}/>
              <Route path="/contact" element={<ContactInfo/>}/>
              <Route path="/students" element={<StudentList/>}/>
              <Route path="/students/:id" element={<StudentData/>}/>

          </Routes>
      </BrowserRouter>


  </React.StrictMode>,
  document.getElementById('root')
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
