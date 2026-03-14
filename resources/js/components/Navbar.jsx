import React, { useState } from 'react';

export default function Navbar() {
  const [open, setOpen] = useState(false);

  const scrollTo = (id) => {
    const el = document.getElementById(id);
    if (el) el.scrollIntoView({ behavior: 'smooth' });
    setOpen(false);
  };

  return (
    <nav className="navbar">
      <div className="container navbar-inner">

        {/* Logo */}
        <a className="navbar-logo" href="#" onClick={(e) => { e.preventDefault(); window.scrollTo({ top: 0, behavior: 'smooth' }); }}>
          <span className="navbar-logo-text">1625 <em>AUTOLAB</em></span>
          <span className="navbar-version">v2.0</span>
        </a>

        {/* Desktop nav */}
        <ul className="navbar-links">
          <li><a href="#services" onClick={(e) => { e.preventDefault(); scrollTo('services'); }}>Services</a></li>
          <li><a href="#work"     onClick={(e) => { e.preventDefault(); scrollTo('work');     }}>Archive</a></li>
          <li><a href="#promo"    onClick={(e) => { e.preventDefault(); scrollTo('promo');    }}>Promos</a></li>
        </ul>

        {/* CTA */}
        <div style={{ display: 'flex', alignItems: 'center', gap: 12 }}>
          <button
            className="btn-book"
            onClick={() => scrollTo('contact')}
          >
            Book A Bay
          </button>
          <button
            className="navbar-mobile-toggle"
            onClick={() => setOpen(o => !o)}
            aria-label="Toggle menu"
          >
            {open ? '✕' : '☰'}
          </button>
        </div>
      </div>

      {/* Mobile menu */}
      {open && (
        <div style={{
          position: 'absolute',
          top: 64,
          left: 0,
          right: 0,
          background: 'rgba(10,10,12,0.97)',
          borderBottom: '1px solid rgba(255,255,255,0.08)',
          padding: '16px 24px 24px',
          display: 'flex',
          flexDirection: 'column',
          gap: 16,
        }}>
          {['services', 'work', 'promo', 'contact'].map(id => (
            <button key={id}
              onClick={() => scrollTo(id)}
              style={{
                background: 'none',
                border: 'none',
                color: 'rgba(255,255,255,0.7)',
                fontFamily: 'IBM Plex Mono, monospace',
                fontSize: '0.75rem',
                letterSpacing: '0.18em',
                textTransform: 'uppercase',
                textAlign: 'left',
                cursor: 'pointer',
                padding: '4px 0',
              }}
            >
              {id === 'contact' ? 'Book A Bay' : id}
            </button>
          ))}
        </div>
      )}
    </nav>
  );
}
