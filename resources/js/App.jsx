import React from 'react';
import Navbar   from './components/Navbar.jsx';
import Hero     from './components/Hero.jsx';
import Services from './components/Services.jsx';
import Promo    from './components/Promo.jsx';
import Builds   from './components/Builds.jsx';
import Contact  from './components/Contact.jsx';
import Footer   from './components/Footer.jsx';

export default function App() {
  return (
    <div style={{ background: '#0A0A0C', minHeight: '100vh' }}>
      <Navbar />
      <Hero />
      <Services />
      <Promo />
      <Builds />
      <Contact />
      <Footer />
    </div>
  );
}
