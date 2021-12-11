import React from "react";
import Header from "./components/header/Header";
import Hero from "./components/hero/Hero";
import Clients from "./clients/Clients";
import About from "./about/About";
import Counts from "./counts/Counts";
import Services from "./services/Services";
import Cta from "./components/cta/Cta";
import Testimonials from "./testimonials/Testimonials";
import Portfolio from "./portfolio/Portfolio";
import Pricing from "./pricing/Pricing";
import Contact from "./contact/Contact";
import Footer from "./footer/Footers";

import Team from "./team/Team";
import Questions from "./questions/Questions";

const App = () => {
  return (
    <div>
      <Header />
      <Hero />
      <main id="main">
        <Clients />
        <About />
        <Counts />
        <Services />
          <Cta/>
          <Testimonials/>
          <Portfolio/>
          <Team/>
          <Pricing/>
          <Questions/>
          <Contact/>
      </main>
     <Footer/>
    </div>
  );
};

export default App;
